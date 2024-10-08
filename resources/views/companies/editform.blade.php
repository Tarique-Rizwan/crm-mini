@extends('dashboard.layouts.main')

@section('title', 'Edit Companies')
@section('content')
<br>
<h2 class="text-center mt-4 mb-5">Edit Company's Data</h2>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="namaperusahaan" name="name" 
                        required autofocus value="{{$data->name}}">
                        
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Company Logo</label>
                        <input type="hidden" name="oldLogo" value="{{$data->logo}}">
                        @if ($data->logo)
                        <img src="{{ asset('storage/'.$data ->logo)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else                    
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo" onchange="previewImage()">
                        @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{$data->website}}">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        const img = document.querySelector('#logo');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(logo.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection