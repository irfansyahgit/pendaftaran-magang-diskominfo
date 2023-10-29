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
          @if(session()->has('filter'))
          <div class="alert alert-success small-alert m-0 p-2 text-center" role="alert">{{session('filter')}}
          </div>
          @endif
          @if(session()->has('gagal'))
          <div class="alert alert-warning small-alert mb-3 p-2 text-center text-white" role="alert">{{session('gagal')}}
          </div>
          @endif
          <p><strong><a href="/data">&laquo; Kembali</a></strong></p>

         
          <!-- informasi filter -->
          <label for="mulai_filter">Tanggal Mulai:</label>
<input disabled value="{{$mulai_filter}}" type="text" style="background-color: #eee; border: 1px solid #ced4da;">
<label for="selesai_filter" class="ml-3">Tanggal Selesai:</label>
<input disabled value="{{$selesai_filter}}" type="text" style="background-color: #eee; border: 1px solid #ced4da;">
<div>
  <label for="stat_filter" class="mt-3">Status:</label>
</div>
<select disabled class="form-select mb-3 select2" placeholder="Default select example" name="stat_filter">
    <option value="{{$stat_filter}}" selected>{{$stat_filter}}</option>
</select>
<div>
  <label for="institution_filter" class="mt-3">Institusi:</label>
</div>
<select disabled class="form-select mb-3 select2" placeholder="Default select example" name="institution_filter" >
    <option value="{{$institution_filter}}" selected>{{$institution_filter}}</option>
</select>


          <div class="list-group mt-3">
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
                      <form id="deleteForm{{$lamaran->id}}" action="/data/{{$lamaran->id}}" method="POST" class="d-inline-block mr-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{$lamaran->id}})"><i class="fas fa-trash"></i></button>
                      </form>
                      <a href="/data/{{$lamaran->id}}/edit" class="btn btn-primary d-inline-block mr-2"><i class="fas fa-edit"></i></a>
                      <a href="/lamaran/{{$lamaran->id}}" class="btn btn-success d-inline-block mr-2"><i class="fas fa-eye"></i></a>

                    </div>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
<!-- @endif -->