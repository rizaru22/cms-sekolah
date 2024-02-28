@extends('layouts.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center mb-3">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Olahraga
                </div>
                <h2 class="page-title">
                    Create New Olahraga
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.olahraga.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Upload Image Olahraga</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-label">image Olahraga</div>
                                        <input type="file" class="form-control" name="image_olahraga" />
                                        @error('image_olahraga')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Nama Olahraga</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Nama Olahraga<span class="text-danger">*</span></label>
                                        <input type="text" id="title" class="form-control" name="title" autocomplete="olahraga-title" value="">
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('dashboard.prestasi2be.olahraga') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Olahraga</button>
                            </div>
                        </div>
            </div>
        </form>
    </div>
</div>

@endsection