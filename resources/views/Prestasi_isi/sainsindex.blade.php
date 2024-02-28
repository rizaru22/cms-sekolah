@extends('layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center mb-3">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Prestasi sains
                </div>
                <h2 class="page-title">
                    Create New Prestasi 
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.PrestasisainsISI.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Upload Image Prestasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-label">image Prestasi</div>
                                        <input type="file" class="form-control" name="image_lomba" />
                                        @error('image_lomba')
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
                            <h4 class="card-title">Nama Lomba</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_lomba">Nama Lomba<span class="text-danger">*</span></label>
                                        <input type="text" id="nama_lomba" class="form-control" name="nama_lomba" autocomplete="sains-nama_lomba" value="">
                                        @error('nama_lomba')
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
                            <h4 class="card-title">tingkat</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tingkat">tingkat<span class="text-danger">*</span></label>
                                        <input type="text" id="tingkat" class="form-control" name="tingkat" autocomplete="sains-tingkat" value="">
                                        @error('tingkat')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <div class="row">
                <div class="col-4">
                <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Tanggal Pelaksanaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tanggal_pelaksanaan">Tanggal Pelaksanaan<span class="text-danger">*</span></label>
                                        <input type="text" id="datepicker"  class="form-control" name="tanggal_pelaksanaan" autocomplete="off">
                                        @error('tanggal_pelaksanaan')
                                        <small class="date-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card mb-2">
                        <div class="card mb-2">
    <div class="card-header">
        <h4 class="card-title">Peringkat</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label" for="peringkat">Peringkat<span class="text-danger">*</span></label>
                    <select id="peringkat" class="form-control" name="peringkat" autocomplete="olahraga-peringkat">
                        <option value="">Pilih Peringkat</option>
                        <option value="Juara 1">Juara 1</option>
                        <option value="Juara 2">Juara 2</option>
                        <option value="Juara 3">Juara 3</option>
                        <option value="Harapan 1">Harapan 1</option>
                        <option value="Harapan 2">Harapan 2</option>
                        <option value="Harapan 3">Harapan 3</option>
                    </select>
                    @error('peringkat')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
                <div class="col-4">
                <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Nama Peserta</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_peserta">Nama Peserta<span class="text-danger">*</span></label>
                                        <input type="text" id="nama_peserta" class="form-control" name="nama_peserta" autocomplete="olahraga-nama_peserta" value="">
                                        @error('nama_peserta')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-8 mx-auto">
                <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Nama Pembimbing</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_pembimbing">Nama pembimbing<span class="text-danger">*</span></label>
                                        <input type="text" id="nama_pembimbing" class="form-control" name="nama_pembimbing" autocomplete="olahraga-nama_pembimbing" value="">
                                        @error('nama_pembimbing')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
                <div class="card-footer flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('dashboard.prestasi_tampilan.sains') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Prestasi</button>
                            </div>
                        </div>
            
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('#datepicker').datepicker({
        format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
        
        // Set tanggal ke tahun saat ini (opsional)
        $('#yearpicker').datepicker("setDate", new Date());
</script>

@endsection