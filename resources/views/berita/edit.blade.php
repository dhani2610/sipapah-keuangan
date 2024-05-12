@extends('layouts.user_type.auth')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
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
                <div class="card-body px-3 pt-0 pb-2">
                <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', $page_title != null ? $page_title : Request::path()) }}</h6>

                    <form action="{{ route('update-data-berita',$berita->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Cover</label> <br>
                            <img src="{{ asset('assets/img/cover/'.$berita->cover) }}" alt="" style="max-width: 200px"> <br>
                            <input type="file" class="form-control" placeholder="Foto Dokumentasi" name="cover" id="cover">
                            @error('cover')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                            <input type="hidden" value="on" name="agreement">
                        </div>
        
                        <div class="mb-3">
                            <label for="">Judul Berita</label>
                        <input type="text" class="form-control" placeholder="Judul Berita" name="judul_berita" id="judul_berita" aria-label="Name" aria-describedby="name" value="{{ old('judul_berita') ?? $berita->judul_berita }}" required>
                        @error('judul_berita')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal Berita</label>
                        <input type="date" class="form-control" placeholder="Tanggal Berita" name="tanggal_berita" id="tanggal_berita" value="{{ old('tanggal_berita') ?? $berita->tanggal_berita }}" required>
                        @error('tanggal_berita')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea id="summernote" name="content"></textarea>
                        @error('tanggal_berita')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                        </div>

                        <a href="{{ route('data-berita') }}" type="submit" class="btn btn-info mr-2" style="float: right">Back</a>
                        <button type="submit" class="btn btn-primary" style="float: right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


 

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myDataTable').DataTable();

      

        $('textarea#summernote').summernote({
                placeholder: 'Content Berita',
                tabsize: 2,
                height: 100,
        toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                //['fontname', ['fontname']],
            // ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                //['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
            });

            $('#summernote').summernote('code', {!! json_encode($berita->content) !!});

    });
  

</script>



@endsection