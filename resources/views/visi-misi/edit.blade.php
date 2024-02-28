@extends('layouts.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center mb-3">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Visi Misi sekolah
                </div>
                <h2 class="page-title">
                    Edit Visi Misi sekolah
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.visi-misi.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Visi Misi Sekolah</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama Sekolah<span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" autocomplete="school-name" value="{{ old('name', $visimisi->name) }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="visi">Visi<span class="text-danger">*</span></label>
                                        <textarea id="visi" class="form-control" name="visi" rows="6">{{ old('visi', $visimisi->getvisiWithNewLine()) }}</textarea>
                                        @error('visi')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="misi">Misi<span class="text-danger">*</span></label>
                                        <textarea id="misi" class="form-control" name="misi" rows="6">{{ old('misi', $visimisi->getmisiWithNewLine()) }}</textarea>
                                        @error('misi')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-label">image</div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="hidden" name="old-image" value="{{ $visimisi->image }}">
                                                @if($visimisi->image)
                                                <img class="w-100 block rounded overflow-hidden mb-2" id="img-preview" src="{{ asset('storage/' . $visimisi->image) }}" alt="">
                                                @endif
                                            </div>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control mb-2" name="image" />
                                                @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <small class="text-muted block">Choose file if you want to replace the previous image.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ms-auto">
                <div class="card-footer flex justify-content-end align-items-center">
                    <div>
                        <a href="{{ route('dashboard.visi-misi.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update visi misi Sekolah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function() {
        // Initialize Summernote editor on the 'misi' textarea
        $('#misi').summernote({
            height: 200, // Atur tinggi editor sesuai kebutuhan
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol']],
                ['insert', ['link']],
            ],
        });
    });
</script>

@endsection
