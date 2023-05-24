<div class="container mt-5">
    <h1 class="text-center"><strong>Solusi tepat</strong> memilih dosen pembimbing</h1>
    <div class="row justify-content-center">
        <div class="card mt-4" style="width: 30rem;">
            <div class="card-body">
                <form action="{{ route('edas.evaluate') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label class="form-label">Pilih topik skripsi anda</label>
                        <select class="form-select" name="topic">
                            <option value="cryptography">Kriptografi</option>
                            <option value="dss">Sistem Pendukung Keputusan</option>
                            <option value="game_dev">Pengembangan Game</option>
                            <option value="ai">Kecerdasan Buatan</option>
                            <option value="expert_system">Sistem Pakar</option>
                            <option value="nlp">Pemrosesan Bahasa Alami</option>
                            <option value="image_processing">Pengolahan Citra</option>
                            <option value="iot">Internet of Things</option>
                            <option value="cyber_security">Keamanan Siber</option>
                            <option value="cloud_computing">Komputasi Awan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Respons Chat Dosen</label>
                        <select name="lecture_chat" class="form-select">
                            <option value="3">Sangat Berpengaruh</option>
                            <option value="2">Berpengaruh</option>
                            <option value="1">Tidak Berpengaruh</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Ketersedian Waktu Dosen</label>
                        <select name="lecture_availability" class="form-select">
                            <option value="3">Sangat Berpengaruh</option>
                            <option value="2">Berpengaruh</option>
                            <option value="1">Tidak Berpengaruh</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kepedulian Dosen</label>
                        <select name="lecture_care" class="form-select">
                            <option value="3">Sangat Berpengaruh</option>
                            <option value="2">Berpengaruh</option>
                            <option value="1">Tidak Berpengaruh</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kesesuain Topik dengan Kompetensi Dosen</label>
                        <select name="topic_suitability" class="form-select">
                            <option value="3">Sangat Berpengaruh</option>
                            <option value="2">Berpengaruh</option>
                            <option value="1">Tidak Berpengaruh</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn default-button">Cari</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    @if (isset($lecturers))
        @php
            $lecturers = array_slice($lecturers, 0, 3);
        @endphp
        <h3 class="mt-5">Hasil Rekomendasi: </h3>
        <div class="alert alert-warning" role="alert">
            Aplikasi ini masih dalam tahap pengembangan, hasil rekomendasi belum tentu akurat. Data yang digunakan
            berasal dari survei dengan 11 responden.
        </div>
        <div class="mt-5">
            <div class="row">
                @foreach ($lecturers as $lecturer)
                    <div class="col-auto">
                        <div class="card mb-5" style="width: 18rem;">
                            <img width="50px" src="{{ $lecturer['image'] }}" class="card-img-top rounded-circle"
                                alt="Image">
                            <div class="card-body">
                                <h5 style="min-height: 80px" class="card-title">{{ $lecturer['name'] }}</h5>
                                <a href="#" class="btn default-button">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
