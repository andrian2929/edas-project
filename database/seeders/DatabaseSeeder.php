<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alternative;
use App\Models\Lecturer;
use App\Models\Topic;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Dian Rachmawati, S.Si., M.Kom.
         */
        $lecturer = Lecturer::create([
            'name' => 'Dian Rachmawati, S.Si., M.Kom.',
            'bio' => 'Dian Rachmawati, S.Si., M.Kom. is a lecturer at the Faculty of Computer Science and Information Technology (Fasilkom-TI) Universitas Sumatera Utara since 2008. She has a Bachelor of Mathematics from Universitas Sumatera Utara and a Master Degree from Universitas Gajah Mada. She has joined several courses, workshops, and trainings related to computer and technology. She has a research interest in computer and data security, genetic algorithms, optimization, expert system, and graph theory. She has published several papers in proceedings and journals. She has also been a coach for programming competitions and a coordinator for various programs and groups in Fasilkom-TI. She is a member of several organizations such as IEEE, APTIKOM, IPKIN, and KAGAMA. She has received an award for being the best presenter at Annual Applied Science and Engineering Conference (AASEC 2018).',
            'image' => 'https://fasilkom-ti.usu.ac.id/images/Dosen/dosen_Update/Dosen-Dian.png',
        ]);

        Alternative::create([
            'lecturer_id' => $lecturer->id,
            'criteria_1' => 5,
            'criteria_3' => 4.5,
            'criteria_4' => 5,
        ]);

        Topic::create([
            'lecturer_id' => $lecturer->id,
            'cryptography' => 9,
            'dss' => 2,
            'game_dev' => 10,
            'ai' => 8,
            'expert_system' => 1,
            'nlp' => 6,
            'image_processing' => 7,
            'iot' => 5,
            'cyber_security' => 3,
            'cloud_computing' => 4,
        ]);

        /**
         * Dr. Amalia, ST., M.T.
         */
        $lecturer = Lecturer::create([
            'name' => 'Dr. Amalia, ST., M.T.',
            'bio' => 'Dr. Amalia is a computer science lecturer and researcher at Universitas Sumatera Utara in Indonesia. She was born in Banda Aceh in 1978 and has a bachelor degree in electrical engineering from Universitas Syiah Kuala. She is currently pursuing her doctorate in computer science at Universitas Sumatera Utara, where she also serves as the head of the computer science study program. Her research interests are natural language processing and multimedia, and she has published several papers in reputable journals. She believes in lifelong learning as her life motto.',
            'image' => 'https://fasilkom-ti.usu.ac.id/images/Dosen/dosen_Update/Dosen-Amel.png',
        ]);

        Alternative::create([
            'lecturer_id' => $lecturer->id,
            'criteria_1' => 4.5,
            'criteria_3' => 4.5,
            'criteria_4' => 4.5,
        ]);

        Topic::create([
            'lecturer_id' => $lecturer->id,
            'cryptography' => 10,
            'dss' => 7,
            'game_dev' => 9,
            'ai' => 1,
            'expert_system' => 8,
            'nlp' => 2,
            'image_processing' => 3,
            'iot' => 4,
            'cyber_security' => 6,
            'cloud_computing' => 5,
        ]);

        /**
         * Dr. Mohammad Andri Budiman, S.T., M.Comp.Sc., M.E.M.
         */
        $lecturer = Lecturer::create([
            'name' => 'Dr. Mohammad Andri Budiman, S.T., M.Comp.Sc., M.E.M.',
            'bio' => 'Dr. Mohammad Andri Budiman is a vice dean and lecturer at Fasilkom-TI, a faculty of computer science and information technology at Universitas Sumatera Utara in Indonesia. He was born in Medan in 1975 and has degrees in engineering and computer science from ITB, UNSW, UTS, and USU. He has various achievements and certifications in his field, such as being a Java programmer, a member of high IQ societies, and a presenter and lecturer award winner. He also has experience in academic administration and strategic planning at USU. He published a paper in Journal of Physics: Conference Series in 2021.',
            'image' => 'https://fasilkom-ti.usu.ac.id/images/Dosen/dosen_Update/WD1-Andri.png',
        ]);

        Alternative::create([
            'lecturer_id' => $lecturer->id,
            'criteria_1' => 4.6,
            'criteria_3' => 5,
            'criteria_4' => 4.6,
        ]);

        Topic::create([
            'lecturer_id' => $lecturer->id,
            'cryptography' => 1,
            'dss' => 10,
            'game_dev' => 2,
            'ai' => 6,
            'expert_system' => 9,
            'nlp' => 8,
            'image_processing' => 7,
            'iot' => 5,
            'cyber_security' => 3,
            'cloud_computing' => 4,
        ]);

        /**
         * Handrizal, S.Si, M.Comp.Sc
         */
        $lecturer = Lecturer::create([
            'name' => 'Handrizal, S.Si, M.Comp.Sc',
            'bio' => 'Handrizal, S.Si, M.Comp.Sc is a lecturer in Computer Science at Universitas Sumatera Utara (USU) Medan, Indonesia. He was born in Pariaman on June 13, 1977 and completed his bachelor degree in mathematics at USU in 2003 and his master degree in Computer Science at Universiti Malaysia Pahang (UMP) Malaysia in 2011. He is currently finishing his doctorate in Computer Science at USU. He also served as an internal auditor at the Quality Management Unit of USU from 2017 to 2021.',
            'image' => 'https://fasilkom-ti.usu.ac.id/images/Dosen/dosen_Update/Dosen-Handrizal.png',
        ]);

        Alternative::create([
            'lecturer_id' => $lecturer->id,
            'criteria_1' => 5,
            'criteria_3' => 5,
            'criteria_4' => 5,
        ]);

        Topic::create([
            'lecturer_id' => $lecturer->id,
            'cryptography' => 2,
            'dss' => 4,
            'game_dev' => 10,
            'ai' => 1,
            'expert_system' => 3,
            'nlp' => 7,
            'image_processing' => 8,
            'iot' => 9,
            'cyber_security' => 5,
            'cloud_computing' => 6,
        ]);

        /**
         * Sri Melvani Hardi, S.Kom., M.Kom.
         */
        $lecturer = Lecturer::create([
            'name' => 'Sri Melvani Hardi, S.Kom., M.Kom.',
            'bio' => 'Sri Melvani Hardi, S.Kom., M.Kom. is a lecturer and the secretary of the undergraduate program in computer science at the Faculty of Computer Science and Information Technology, Universitas Sumatera Utara, Indonesia. She has a bachelor’s and a master’s degree in computer science from the same university. Her research areas are expert system, human computer interaction, and information & decision support system. She has published several papers in journals and conferences related to these topics. She is also involved in some community service projects that use computer-based technology to improve education and health.',
            'image' => 'https://fasilkom-ti.usu.ac.id/images/Dosen/dosen_Update/Dosen-Vani.png',
        ]);

        Alternative::create([
            'lecturer_id' => $lecturer->id,
            'criteria_1' => 4,
            'criteria_3' => 5,
            'criteria_4' => 5,
        ]);

        Topic::create([
            'lecturer_id' => $lecturer->id,
            'cryptography' => 8,
            'dss' => 2,
            'game_dev' => 10,
            'ai' => 4,
            'expert_system' => 1,
            'nlp' => 3,
            'image_processing' => 6,
            'iot' => 5,
            'cyber_security' => 9,
            'cloud_computing' => 7,
        ]);

        /**
         * T. Henny Febriana Harumy, S.Kom, M.Kom
         */
        $lecturer = Lecturer::create([
            'name' => 'T. Henny Febriana Harumy, S.Kom, M.Kom',
            'bio' => 'T. Henny Febriana Harumy, S.Kom, M.Kom is a lecturer at Universitas Sumatera Utara in the Computer Science Undergraduate Study Program and a member of Aptikom. She was born in Banda Aceh on February 19, 1988 and has a passion for learning. She obtained her master degree from two universities, Universitas Sumatera Utara and UPI YTPK Padang, in Information Technology and Development Economics respectively. She has attended many training programs and won several awards in scientific writing and innovation competitions. She aspires to pursue her doctoral study in the future.',
            'image' => 'https://fasilkom-ti.usu.ac.id/images/Dosen/dosen_Update/Dosen-Henny.png',
        ]);

        Alternative::create([
            'lecturer_id' => $lecturer->id,
            'criteria_1' => 4,
            'criteria_3' => 4.5,
            'criteria_4' => 4.5,
        ]);

        Topic::create([
            'lecturer_id' => $lecturer->id,
            'cryptography' => 4,
            'dss' => 2,
            'game_dev' => 6,
            'ai' => 1,
            'expert_system' => 7,
            'nlp' => 8,
            'image_processing' => 10,
            'iot' => 9,
            'cyber_security' => 5,
            'cloud_computing' => 3,
        ]);
    }
}
