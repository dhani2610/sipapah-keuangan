@extends('layouts.user_type.auth')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<div class="row mb-5">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sampah Organik</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $DataSampahOrganik }} KG
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sampah Anorganik</p>
                <h5 class="font-weight-bolder mb-0">
                    {{ $DataSampahAnorganik }} KG
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sampah Residu</p>
                <h5 class="font-weight-bolder mb-0">
                    {{ $DataSampahResidu }} KG
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
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
                                <form role="form text-left" method="POST" action="{{ route('tambah-data-sampah') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Jenis Sampah</label>
                                            <select name="tipe" class="form-control" id="" required>
                                                <option value="Organik">Organik</option>
                                                <option value="Anorganik">Anorganik</option>
                                                <option value="Residu">Residu</option>
                                            </select>
                                          @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Jumlah (Kg)</label>
                                          <input type="number" class="form-control" placeholder="Jumlah (Kg)" name="jumlah_kg" id="jumlah_kg" value="{{ old('jumlah_kg') }}" required>
                                          @error('jumlah_kg')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Tanggal Input</label>
                                          <input type="date" class="form-control" placeholder="Tanggal Kegiatan" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                                          @error('tanggal')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                         <label for="">Foto Sampah</label>
                                          <input type="file" class="form-control" placeholder="Foto Sampah" name="foto" id="foto" required>
                                          @error('foto')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                          <input type="hidden" value="on" name="agreement">
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required> {{ old('deskripsi') }}</textarea>
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
                                        Jenis Sampah
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah (Kg)
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Foto Sampah
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataSampah as $item)
                                <tr>
                                        
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->tipe }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->jumlah_kg.' Kg'}}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->tanggal}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
                                            <p class="text-xs font-weight-bold mb-0">Deskripsi</p>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ asset('assets/img/foto_sampah/'.$item->foto) }}" target="_blank">
                                            <img src="{{ asset('assets/img/foto_sampah/'.$item->foto) }}" alt="" style="max-width: 100px">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="{{ route('delete-data-sampah',$item->id) }}" type="button" >
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

@foreach ($DataSampah as $item2)
<div class="modal fade" id="modaledit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $page_title ?? '' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form role="form text-left" method="POST" action="{{ route('update-data-sampah',$item2->id) }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="">Jenis Sampah</label>
                    <select name="tipe" class="form-control" id="" required>
                        <option value="Organik" {{ $item2->tipe == 'Organik' ? 'selected' : '' }}>Organik</option>
                        <option value="Anorganik" {{ $item2->tipe == 'Anorganik' ? 'selected' : '' }}>Anorganik</option>
                        <option value="Residu" {{ $item2->tipe == 'Residu' ? 'selected' : '' }}>Residu</option>
                    </select>
                  @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="">Jumlah (Kg)</label>
                  <input type="number" class="form-control" placeholder="Jumlah (Kg)" name="jumlah_kg" id="jumlah_kg" value="{{ old('jumlah_kg') ?? $item2->jumlah_kg }}" required>
                  @error('jumlah_kg')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                
                <div class="mb-3">
                    <label for="">Tanggal Input</label>
                  <input type="date" class="form-control" placeholder="Tanggal Kegiatan" name="tanggal" id="tanggal" value="{{ old('tanggal') ?? $item2->tanggal }}" required>
                  @error('tanggal')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                
                <div class="mb-3">
                 <label for="">Foto Sampah</label> <br>
                 <a href="{{ asset('assets/img/foto_sampah/'.$item2->foto) }}" target="_blank">
                    <img src="{{ asset('assets/img/foto_sampah/'.$item2->foto) }}" alt="" style="max-width: 100px">
                </a>
                  <input type="file" class="form-control" placeholder="Foto Sampah" name="foto" id="foto" >
                  @error('foto')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                  <input type="hidden" value="on" name="agreement">
                </div>

                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required> {{ old('deskripsi') ?? $item2->deskripsi }}</textarea>
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

@foreach ($DataSampah as $item3)
<div class="modal fade" id="modalDeskripsi{{ $item3->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deskripsi {{ $page_title ?? '' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{ $item3->deskripsi }}
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