@extends('sbadmin/guru_master')
@section('title', 'List Absensi')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{url('/absen/save')}}" method="post">
                    @csrf
                    <input type="hidden" name="idJadwal" value="{{$idJadwal}}">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Hadir</th>
                                    <th>Sakit</th>
                                    <th>Ijin</th>
                                    <th>Alpha</th>
                                </tr>
                            </thead>
                            <tbody>


                                @php $i = 1 @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <input type="hidden" name="idSiswa[]" value="{{ $item->idSiswa }}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ date('d, M Y') }}</td>
                                        <td>{{ $item->namaSiswa }}</td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-check">
                                                    <input name="keterangan{{$item->idSiswa}}[]" id="keterangan{{$item->idSiswa}}" value="1" class="form-check-input"
                                                        type="radio">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-check">
                                                    <input name="keterangan{{$item->idSiswa}}[]" id="keterangan{{$item->idSiswa}}" value="2" class="form-check-input"
                                                        type="radio">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-check">
                                                    <input name="keterangan{{$item->idSiswa}}[]" id="keterangan{{$item->idSiswa}}" value="3" class="form-check-input"
                                                        type="radio">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-check">
                                                    <input name="keterangan{{$item->idSiswa}}[]" id="keterangan{{$item->idSiswa}}" value="4" class="form-check-input"
                                                        type="radio">
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-12 text-right border-top mt-2 pt-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
