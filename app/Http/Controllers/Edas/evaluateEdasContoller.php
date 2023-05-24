<?php

namespace App\Http\Controllers\Edas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecturer;


class evaluateEdasContoller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $decisionMatrix = $this->initializeDecisonMatrix($request);
        $normalizedWeight = $this->normalizeWeight($request);
        $averageSolution = $this->calculateAverageSolution($decisionMatrix);
        $pdas = $this->calculatePositiveDistance($decisionMatrix, $averageSolution);
        $ndas = $this->calculateNegativeDistance($decisionMatrix, $averageSolution);
        $weightedSumOfPositiveDistances = $this->calculateWeightedSumOfPositiveDistances($pdas, $normalizedWeight);
        $weightedSumOfNegativeDistances = $this->calculateWeightedSumOfNegativeDistances($ndas, $normalizedWeight);
        $normalizedSp = $this->normalizeSp($weightedSumOfPositiveDistances);
        $normalizedSn = $this->normalizeSn($weightedSumOfNegativeDistances);
        $score = $this->calculateScore($normalizedSp, $normalizedSn, $decisionMatrix);

        $lecturers = [];
        foreach ($score as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $lecturer = Lecturer::find($key2);
                $lecturer->score = $value2['score'];
                $lecturers[] = $lecturer->toArray();
            }
        }


        usort($lecturers, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });


        return view('layouts.app', compact('lecturers'));
    }

    private function normalizeWeight(Request $request)
    {
        $weight = [$request->lecture_chat, $request->topic_suitability, $request->lecture_availability, $request->lecture_care];
        $sum = array_sum($weight);

        $normalizedWeight = array_map(function ($value) use ($sum) {
            return $value / $sum;
        }, $weight);

        return $normalizedWeight;
    }

    private function initializeDecisonMatrix(Request $request)
    {
        $lecturers = Lecturer::with('alternative', 'topic')->get();
        $decisionMatrix = [];
        foreach ($lecturers as $lecturer) {
            $criteria_2 = $lecturer->topic->{$request->topic};
            $criteria_2 = ((1 / 10) * (10 / $criteria_2)) * 5;
            $decisionMatrix[] = [$lecturer->id => [
                $lecturer->alternative->criteria_1,
                $criteria_2,
                $lecturer->alternative->criteria_3,
                $lecturer->alternative->criteria_4,
            ]];
        }
        return $decisionMatrix;
    }

    private function calculateAverageSolution($decisionMatrix)
    {
        $averageSolution = array_map(function ($criteria) {
            return array_sum($criteria) / count($criteria);
        }, $this->array_transpose($decisionMatrix));

        return $averageSolution;
    }

    private function array_transpose($decisionMatrix)
    {
        $improvedDecisionMatrix = [];
        foreach ($decisionMatrix as $key => $value) {
            $improvedDecisionMatrix[] = current($value);
        }
        $improvedDecisionMatrix = call_user_func_array('array_map', array_merge([null], $improvedDecisionMatrix));
        return $improvedDecisionMatrix;
    }

    private function calculatePositiveDistance($decisionMatrix, $averageSolution)
    {
        $improvedDecisionMatrix = $this->array_transpose($decisionMatrix);
        $pdas = [];
        foreach ($improvedDecisionMatrix as $key => $value) {
            $pdas[] = array_map(function ($value) use ($key, $averageSolution) {
                return max(0, (($value - $averageSolution[$key]) / $averageSolution[$key]));
            }, $value);
        }
        return call_user_func_array('array_map', array_merge([null], $pdas));
    }

    private function calculateNegativeDistance($decisionMatrix, $averageSolution)
    {
        $improvedDecisionMatrix = $this->array_transpose($decisionMatrix);
        $ndas = [];
        foreach ($improvedDecisionMatrix as $key => $value) {
            $ndas[] = array_map(function ($value) use ($key, $averageSolution) {
                return max(0, (($averageSolution[$key] - $value) / $averageSolution[$key]));
            }, $value);
        }

        return call_user_func_array('array_map', array_merge([null], $ndas));
    }

    private function calculateWeightedSumOfPositiveDistances($pdas, $normalizedWeight)
    {
        $weightedSumOfPositiveDistances = [];
        foreach ($pdas as $key => $value) {
            $sumpda = 0;
            foreach ($value as $key2 => $value2) {
                $sumpda += $value2 * $normalizedWeight[$key2];
            }

            $weightedSumOfPositiveDistances[] = $sumpda;
        }
        return $weightedSumOfPositiveDistances;
    }

    private function calculateWeightedSumOfNegativeDistances($ndas, $normalizedWeight)
    {
        $weightedSumOfNegativeDistances = [];
        foreach ($ndas as $key => $value) {
            $sumnda = 0;
            foreach ($value as $key2 => $value2) {
                $sumnda += $value2 * $normalizedWeight[$key2];
            }

            $weightedSumOfNegativeDistances[] = $sumnda;
        }
        return $weightedSumOfNegativeDistances;
    }

    private function normalizeSp($weightedSumOfPositiveDistances)
    {
        $normalizedSp = [];

        $max = max($weightedSumOfPositiveDistances);

        foreach ($weightedSumOfPositiveDistances as $value) {
            $normalizedSp[] = $value / $max;
        }
        return $normalizedSp;
    }

    private function normalizeSn($weightedSumOfNegativeDistances)
    {
        $normalizedSn = [];

        $max = max($weightedSumOfNegativeDistances);

        foreach ($weightedSumOfNegativeDistances as $value) {
            $normalizedSn[] = 1 - ($value / $max);
        }
        return $normalizedSn;
    }

    private function calculateScore($normalizedSp, $normalizedSn, $decisionMatrix)
    {
        $score = [];
        foreach ($normalizedSp as $key => $value) {
            $score[] = ($value + $normalizedSn[$key]) / 2;
        }
        // adding some value to decision matrix
        foreach ($decisionMatrix as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $decisionMatrix[$key][$key2]['score'] = $score[$key];
            }
        }

        return $decisionMatrix;
    }
}
