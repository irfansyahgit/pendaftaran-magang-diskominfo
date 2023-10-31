<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrasi') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <form action="/lamaran" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> -->

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-90">
                    @csrf
                    <h2 class="text-lg font-medium text-gray-900">Identitas </h2>
                    <p class="mt-1 text-sm text-gray-600">Pastikan mengisi semua data dengan benar.</p>

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input value="{{$user->name}}" type="text" class="form-control" id="nama" name="nama">
                            @error('nama')
                            <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nik" class="col-sm-2 col-form-label">NIK / Nomor KTP</label>
                        <div class="col-sm-10">
                            <input value="{{old('nik')}}" type="number" class="form-control" id="nik" name="nik">
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
                            <input value="{{old('alamat')}}" type="text" class="form-control" id="alamat" name="alamat">
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
                            <input value="{{old('telepon')}}" type="number" class="form-control" id="telepon" name="telepon">
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
                            <input value="{{$user->email}}" type="email" class="form-control" id="email" name="email">
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
                            <input value="{{old('univ')}}" type="text" class="form-control" id="univ" name="univ">
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
                            <select class="form-select mb-3 select2" placeholder="Default select example" name="institution_id">
                                <option value="" selected>-- Pilih Instansi --</option>
                                @foreach($institutions as $institution)
                                <option value="{{$institution->id}}">{{$institution->nama}}</option>
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
                            <input value="{{$tanggalSekarang}}" type="text" class="form-control" name="mulai" id="mulai" style="background-color: white;">
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
                            <input value="{{$tanggal3BulanLagi}}" type="text" class="form-control" name="selesai" id="selesai" style="background-color: white;">
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
                            <textarea class="form-control" id="keterangan" name="keterangan" style="height: 150px;" placeholder="Keterangan">{{old('keterangan')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">Berkas</h2>
                    <!-- <p class="mt-1 text-sm text-gray-600">Pastikan mengisi semua data dengan benar.</p> -->
                    <div class="px-6.5 pt-6.5">
                        <p class="bg-[#ffcccc] text-black opacity-80 p-3 rounded-md"><span class="font-semibold">Catatan</span>:
                            Semua berkas/file yang diunggah harus dalam format PDF.
                        </p>
                    </div>
                    <div class="row mb-3">
                        <label for="berkasktp" class="col-sm-2 col-form-label">KTP</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="berkasktp" name="berkasktp" style="background-color: white;">
                            @error('berkasktp')
                            <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="berkasktm" class="col-sm-2 col-form-label">KTM</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="berkasktm" name="berkasktm" style="background-color: white;">
                            @error('berkasktm')
                            <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 flex items-center">
                        <label for="berkaspermohonan" class="col-sm-2 col-form-label">Permohonan / Pengantar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="berkaspermohonan" name="berkaspermohonan" style="background-color: white;">
                            @error('berkaspermohonan')
                            <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="berkas-proposal" class="col-sm-2 col-form-label">Proposal</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="berkasproposal" name="berkasproposal" style="background-color: white;">
                            @error('berkasproposal')
                            <div class="alert alert-danger small-alert m-0 p-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <p class="text-center text-sm text-gray-600">Sebelum klik tombol Kirim, pastikan semua data Anda sudah benar.</p>
                    <div>
                        <x-primary-button class="flex w-full justify-center rounded p-3">
                            {{ __('Kirim Lamaran') }}
                        </x-primary-button>
                    </div>
                </div>

                <!-- <div class="flex flex-col gap-3.5">
                    <p class="text-center">Sebelum klik tombol Kirim, pastikan semua data Anda sudah benar.</p>
                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white hover:bg-opacity-90">
                        Kirim
                    </button>
                </div> -->


            </div>
        </form>
    </div>


</x-app-layout>