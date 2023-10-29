<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <p><strong><a href="{{ url()->previous() }}">&laquo; Kembali</a></strong></p>
                    <form action="/data/{{$lamaran->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="mb-4">Identitas : </h6>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->nama}}" type="text" class="form-control" id="nama" name="nama">
                                @error('nama')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->nik}}" type="number" class="form-control" id="nik" name="nik">
                                @error('nik')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->alamat}}" type="text" class="form-control" id="alamat" name="alamat">
                                @error('alamat')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->telepon}}" type="number" class="form-control" id="telepon" name="telepon">
                                @error('telepon')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->email}}" type="email" class="form-control" id="email" name="email">
                                @error('email')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="univ" class="col-sm-2 col-form-label">Asal Universitas</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->universitas}}" type="text" class="form-control" id="univ" name="univ">
                                @error('univ')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lokasi" class="col-sm-2 col-form-label">Instansi Tujuan</label>
                            <div class="col-sm-10">
                            <select class="form-select mb-3" name="institution_id" id="test">
                                <option value="">-- Pilih Instansi --</option>
                                @foreach($institutions as $institution)
                                    <option value="{{$institution->id}}" {{ $lamaran->institution_id == $institution->id ? 'selected' : '' }}>
                                        {{$institution->nama}}
                                    </option>
                                @endforeach
                            </select>

                                @error('institution_id')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mulai" class="col-sm-2 col-form-label">Tanggal Mulai Magang</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->mulai}}" type="text" class="form-control" name="mulai" id="mulai" style="background-color: white;">
                                @error('mulai')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="selesai" class="col-sm-2 col-form-label">Tanggal Selesai Magang</label>
                            <div class="col-sm-10">
                                <input value="{{$lamaran->selesai}}" type="text" class="form-control" name="selesai" id="selesai" style="background-color: white;">
                                @error('selesai')
                                <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="keterangan" name="keterangan" style="height: 150px;" placeholder="Silakan masukkan catatan di sini...">{{$lamaran->keterangan}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mb-3" style="width: 200px;">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>