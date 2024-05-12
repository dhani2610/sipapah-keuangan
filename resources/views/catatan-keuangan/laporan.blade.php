@extends('layouts.user_type.auth')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

 
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
            {{ session('success' ?? $item2->keterangan) }}</span>
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
    @php
        $start_date = Request::get('start_date') ?? '';
        $end_date = Request::get('end_date') ?? '';
        $tipe = Request::get('tipe') ?? '';
    @endphp
    <form action="" method="get">
        @csrf
        <div class="row mx-4">
            <div class="col-lg-4">  
                <div class="form-group">
                    <input type="date" class="form-control" value="{{ $start_date }}" name="start_date" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="date" class="form-control" value="{{ $end_date }}" name="end_date" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <select name="tipe" class="form-control" id="" required>
                        <option value="Piutang" {{ $tipe == 'Piutang' ? 'selected' : '' }}>Piutang</option>
                        <option value="Utang" {{ $tipe == 'Utang' ? 'selected' : '' }}>Utang</option>
                        <option value="Pemasukan" {{ $tipe == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="Pengeluaran" {{ $tipe == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="button-group">
                <button class="btn btn-primary" type="submit">Filter</button>
                <a class="btn btn-info" href="{{ url('download-excel?start_date='.$start_date.'&end_date='.$end_date.'&tipe='.$tipe) }}">Download</a>
                <a class="btn btn-info" target="_blank" href="{{ url('cetak?start_date='.$start_date.'&end_date='.$end_date.'&tipe='.$tipe) }}">Cetak</a>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0 mb-2">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ $page_title ?? '' }}</h5>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New {{ $page_title ?? '' }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form role="form text-left" method="POST" action="{{ route('tambah-catatan-keuangan') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Keterangan</label>
                                          <input type="text" class="form-control" placeholder="keterangan" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" required>
                                          @error('keterangan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Saldo</label>
                                          <input type="number" class="form-control" placeholder="Saldo" name="saldo" id="saldo" value="{{ old('saldo') }}" required>
                                          @error('saldo')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                      
                                    
                                        
                                        <div class="mb-3">
                                            <label for="">Tanggal</label>
                                          <input type="date" class="form-control" placeholder="Tanggal Kegiatan" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                                          @error('tanggal')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                          <label for="">Jenis</label>
                                          <select name="jenis" class="form-control" id="" required>
                                              <option value="Debet">Debet</option>
                                              <option value="Kredit">Kredit</option>
                                          </select>
                                        @error('jenis')
                                          <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                      </div>

                                        <div class="mb-3">
                                          <label for="">Tipe</label>
                                          <select name="tipe" class="form-control" id="" required>
                                              <option value="Piutang">Piutang</option>
                                              <option value="Utang">Utang</option>
                                              <option value="Pemasukan">Pemasukan</option>
                                              <option value="Pengeluaran">Pengeluaran</option>
                                          </select>
                                        @error('tipe')
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
                                        Keterangan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Saldo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jenis
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tipe
                                    </th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keuangan as $item)
                                <tr>
                                        
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0" style="text-align: left">{{ $item->keterangan }}</p>
                                    </td>
                                    
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">@currency($item->saldo)</p>
                                    </td>
                                    
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->tanggal}}</span>
                                    </td>
                                   
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->jenis}}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->tipe}}</span>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
    // $(document).ready(function () {
    //     $('#myDataTable').DataTable();
    // });

    $('#myDataTable').DataTable( {
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    } );
</script>

@endsection