@extends('layouts.user_type.auth')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div>
 
    @if($errors->any())
        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-text text-white">
            {{$errors->first()}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    @if(session('success'))
        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
            <span class="alert-text text-white">
            {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    @if(session('failed'))
        <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
            <span class="alert-text text-white">
            {{ session('failed') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0 mb-2">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ $page_title ?? '' }}</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+&nbsp; New {{ $page_title ?? '' }}</a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New {{ $page_title ?? '' }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form role="form text-left" method="POST" action="{{ route('tambah-kegiatan') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Nama Kegiatan</label>
                                          <input type="text" class="form-control" placeholder="Nama Kegiatan" name="nama_kegiatan" id="name" aria-label="Name" aria-describedby="name" value="{{ old('nama_kegiatan') }}" required>
                                          @error('nama_kegiatan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Tanggal Kegiatan</label>
                                          <input type="date" class="form-control" placeholder="Tanggal Kegiatan" name="tanggal_kegiatan" id="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" required>
                                          @error('tanggal_kegiatan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                         <label for="">Foto Kegiatan</label>
                                          <input type="file" class="form-control" placeholder="Foto Kegiatan" name="foto_kegiatan" id="foto_kegiatan" required>
                                          @error('foto_kegiatan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                          <input type="hidden" value="on" name="agreement">
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Deskripsi Kegiatan</label>
                                            <textarea name="deskripsi_kegiatan" class="form-control" id="" cols="30" rows="10" required> {{ old('deskripsi_kegiatan') }}</textarea>
                                          @error('tanggal_kegiatan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        
                                </div>
                                
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </form>
                                </div>
                            </div>
                            </div>
                        </div>
  
                    </div>
                </div>
                <div class="card-body px-3 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="myDataTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Kegiatan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Kegiatan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi Kegiatan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Foto Kegiatan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created By
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatan as $item)
                                <tr>
                                        
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->nama_kegiatan }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->tanggal_kegiatan}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
                                            <p class="text-xs font-weight-bold mb-0">Deskripsi</p>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ asset('assets/img/foto_kegiatan/'.$item->foto_kegiatan) }}" target="_blank">
                                            <img src="{{ asset('assets/img/foto_kegiatan/'.$item->foto_kegiatan) }}" alt="" style="max-width: 100px">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $user = \App\Models\User::where('id',$item->created_by)->first();
                                        @endphp
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name ?? '-' }}</p>
                                    </td>
                                    <td class="text-center">
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="{{ route('delete-kegiatan',$item->id) }}" type="button" >
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach

                           

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($kegiatan as $item2)
<div class="modal fade" id="modaledit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $page_title ?? '' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form role="form text-left" method="POST" action="{{ route('update-kegiatan',$item2->id) }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="">Nama Kegiatan</label>
                  <input type="text" class="form-control" placeholder="Nama Kegiatan" name="nama_kegiatan" id="nama_kegiatan" aria-label="Name" aria-describedby="name" value="{{ old('nama_kegiatan') ?? $item2->nama_kegiatan }}" required>
                  @error('nama_kegiatan')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="">Tanggal Kegiatan</label>
                  <input type="date" class="form-control" placeholder="Tanggal Kegiatan" name="tanggal_kegiatan" id="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') ?? $item2->tanggal_kegiatan }}" required>
                  @error('tanggal_kegiatan')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                
                <div class="mb-3">
                 <label for="">Foto Kegiatan</label> <br>
                    <img src="{{ asset('assets/img/foto_kegiatan/'.$item2->foto_kegiatan) }}" alt="" style="max-width: 100px"> <br>
                  <input type="file" class="form-control" placeholder="Foto Kegiatan" name="foto_kegiatan" id="foto_kegiatan">
                  @error('foto_kegiatan')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                  <input type="hidden" value="on" name="agreement">
                </div>

                <div class="mb-3">
                    <label for="">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_kegiatan" class="form-control" id="" cols="30" rows="10" required> {{ old('deskripsi_kegiatan') ?? $item2->deskripsi_kegiatan }}</textarea>
                  @error('tanggal_kegiatan')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
        </div>
    </div>
    </div>
</div>
@endforeach

@foreach ($kegiatan as $item3)
<div class="modal fade" id="modalDeskripsi{{ $item3->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deskripsi {{ $page_title ?? '' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{ $item3->deskripsi_kegiatan }}
            {{-- <p class="text-xs font-weight-bold mb-0">{{ $item2->deskripsi_kegiatan }}</p> --}}
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
@endforeach

 

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myDataTable').DataTable();
    });
</script>

@endsection