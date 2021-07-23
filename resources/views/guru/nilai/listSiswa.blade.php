@extends('sbadmin/guru_master')
@section('title', 'List Absensi')

@section('content')

    {{-- <h1 class="h3 mb-4 text-gray-800">Input Nilai {{ $mapel->namaMapel }} Kelas {{ $kelas->namaKelas }}</h1> --}}
    @if (session('alert'))
        <div class="alert alert-success" role="alert">
            {{ session('alert') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>

            </button>
        </div>
    @endif
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>


                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <input type="hidden" name="idSiswa[]" value="{{ $item->idSiswa }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->namaSiswa }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary" id="editCompany" data-toggle="modal"
                                            data-target='#practice_modal' data-id="{{ $item->idSiswa }}">Input
                                            Nilai</a>
                                    </td>

                                    {{-- Modal input nilai --}}
                                    <div class="modal fade" id="practice_modal">
                                        <div class="modal-dialog">
                                            <form action="{{ url('/inputNilai') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="idMapel" value="{{ $mapel->idMapel }}">
                                                <input type="hidden" name="idSiswa" value="{{ $item->idSiswa }}">
                                                <input type="hidden" name="idJadwal" value="{{ $mapel->idJadwal }}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Input Nilai {{ $item->namaSiswa }}</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="kkm">KKM</label>
                                                            <input type="text" class="form-control" id="kkm" name="kkm"
                                                                required>
                                                            @error('kkm')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nilaiTugas">Nilai Tugas</label>
                                                            <input type="text" class="form-control" id="nilaiTugas"
                                                                name="nilaiTugas" required>
                                                            @error('nilaiTugas')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nilaiUH">Nilai UH</label>
                                                            <input type="text" class="form-control" id="nilaiUH"
                                                                name="nilaiUH" required>
                                                            @error('nilaiUH')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nilaiUTS">Nilai UTS</label>
                                                            <input type="text" class="form-control" id="nilaiUTS"
                                                                name="nilaiUTS" required>
                                                            @error('nilaiUTS')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nilaiUAS">Nilai UAS</label>
                                                            <input type="text" class="form-control" id="nilaiUAS"
                                                                name="nilaiUAS" required>
                                                            @error('nilaiUAS')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right border-top 2 pt-3 mb-2">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>

                                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>

@endsection
