@if(auth()->user()->admin)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('berhasil'))
                    <div class="alert alert-success small-alert m-0 p-2 text-center" role="alert">
                        {{session('berhasil')}}
                    </div>
                    @endif
                    @if(session()->has('peringatan'))
                    <div class="alert alert-warning small-alert mb-3 p-2 text-center text-white" role="alert">
                        {{session('peringatan')}}
                    </div>
                    @endif
                    @if(session()->has('gagal'))
                    <div class="alert alert-danger small-alert mb-3 p-2 text-center text-white" role="alert">
                        {{session('gagal')}}
                    </div>
                    @endif
                    
                    <form method="POST" action="/data">
                        @csrf
                        <input type="hidden" name="isProses" value="true">
                        <label for="mulai_filter">Tanggal Mulai:</label>
                        <input type="text" name="mulai_filter" id="mulai_filter" value="{{$mulai_filter}}">
                        <label for="selesai_filter" class="ml-3 mt-5">Tanggal Selesai:</label>
                        <input type="text" name="selesai_filter" id="selesai_filter" value="{{$selesai_filter}}"> 
                        <div>
                            <label for="stat_filter" class="mt-3">Status:</label>
                        </div>
                        <select class="form-select mb-3 select2" placeholder="Default select example"
                        name="stat_filter">
                            <option value="%">-- Semua Status --</option>
                            @foreach($stats as $stat)
                            <option value="{{$stat->id}}"{{ $stat->id == $stat_filter ? ' selected' : '' }}>{{$stat->nama}}</option>
                            @endforeach
                        </select>
                        <div>
                            <label for="institution_filter" class="mt-3">Institusi:</label>
                        </div>
                        <select class="form-select mb-3 select2" placeholder="Default select example"
                                name="institution_filter">
                            <option value="%">-- Semua Instansi --</option>
                            @foreach($institutions as $institution)
                            <option value="{{$institution->id}}"{{ $institution->id == $institution_filter ? ' selected' : '' }}>{{$institution->nama}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary ml-1 mt-3">Filter</button>
                    </form>
                    
                    <div class="list-group">
                        @if(isset($isProses) && $isProses)
                            <table class="table table-head-fixed text-nowrap table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Instansi</th>
                                    <th>Tanggal Dikirim</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($lamarans) > 0)
                                        @foreach($lamarans as $lamaran)
                                            <tr>
                                                <td>{{$lamaran->nama}}</td>
                                                <td>{{$lamaran->stat->nama}}</td>
                                                <td>{{$lamaran->institution->nama}}</td>
                                                <td>{{$lamaran->created_at->format('j/n/Y')}}</td>
                                                <td>
                                                    <!-- sweetalert -->
                                                    <div>
                                                        <form id="deleteForm{{$lamaran->id}}" action="/data/{{$lamaran->id}}"
                                                            method="POST" class="d-inline-block mr-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                    onclick="confirmDelete({{$lamaran->id}})"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                        <a href="/data/{{$lamaran->id}}/edit"
                                                        class="btn btn-primary d-inline-block mr-2"><i class="fas fa-edit"></i></a>
                                                        <a href="/lamaran/{{$lamaran->id}}" class="btn btn-success d-inline-block mr-2"><i
                                                                class="fas fa-eye"></i></a>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        @else
                            <hr>
                            Silakan memilih kriteria di atas
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@else
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="list-group">
                        @if(count($lamarans) > 0)
                        @foreach($lamarans as $lamaran)
                        <a href="/lamaran/{{$lamaran->id}}" class="list-group-item list-group-item-action">Anda telah
                            melamar di
                            <strong>{{$lamaran->institution->nama}}</strong> pada
                            {{$lamaran->created_at->format('j/n/Y')}}. Status: <strong>{{$lamaran->stat->nama}}</strong>
                        </a>
                        @endforeach
                        @else
                        Anda belum mengirimkan lamaran
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endif
