@extends('layouts.app')

@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center mb-3">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Guru Pembimbing
                </div>
                <h2 class="page-title">
                    Create New Guru Pembimbing
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.GurupemanduISI.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Upload Image guru pembimbing</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-label">image guru pembimbing</div>
                                        <input type="file" class="form-control" name="image" />
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Nama guru pembimbing</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nama guru pembimbing<span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" autocomplete="olahraga-name" value="">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Nama ekstensi yang di bimbing</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="pemandu">Nama ekstensi yang di bimbing<span class="text-danger">*</span></label>
                                        <input type="text" id="pemandu" class="form-control" name="pemandu" autocomplete="olahraga-pemandu" value="">
                                        @error('pemandu')
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
                                <a href="{{ route('dashboard.prestasi2be.gurupemandu') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Guru pembimbing</button>
                            </div>
                        </div>
            </div>
        </form>
    </div>
</div>

@endsection