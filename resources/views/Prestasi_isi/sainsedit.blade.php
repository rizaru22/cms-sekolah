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

        <form action="{{ route('dashboard.PrestasisainsISI.update', ['PrestasisainsISI' => $PrestasisainsISI->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="row">
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
                                        <input type="hidden" name="old-image_lomba" value="{{ $PrestasisainsISI->image_lomba }}">
                                        @if($PrestasisainsISI->image_lomba)
                                        <img class="w-100 block rounded overflow-hidden mb-2" id="img-preview" src="{{ asset('storage/' . $PrestasisainsISI->image_lomba) }}" alt="">
                                        @endif

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
                                        <input type="text" id="nama_lomba" class="form-control" name="nama_lomba" autocomplete="sains-nama_lomba" value="{{ old('nama_lomba', $PrestasisainsISI->nama_lomba) }}">
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
                                        <input type="text" id="tingkat" class="form-control" name="tingkat" autocomplete="sains-tingkat" value="{{ old('tingkat', $PrestasisainsISI->tingkat) }}">
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
                                        <input type="text" id="datepicker"  class="form-control" name="tanggal_pelaksanaan" autocomplete="sains-tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan', $PrestasisainsISI->tanggal_pelaksanaan) }}">
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
                                            <option value="Juara 1" {{ old('peringkat', $PrestasisainsISI->peringkat) == 'Juara 1' ? 'selected' : '' }}>Juara 1</option>
                                            <option value="Juara 2" {{ old('peringkat', $PrestasisainsISI->peringkat) == 'Juara 2' ? 'selected' : '' }}>Juara 2</option>
                                            <option value="Juara 3" {{ old('peringkat', $PrestasisainsISI->peringkat) == 'Juara 3' ? 'selected' : '' }}>Juara 3</option>
                                            <option value="Harapan 1" {{ old('peringkat', $PrestasisainsISI->peringkat) == 'Harapan 1' ? 'selected' : '' }}>Harapan 1</option>
                                            <option value="Harapan 2" {{ old('peringkat', $PrestasisainsISI->peringkat) == 'Harapan 2' ? 'selected' : '' }}>Harapan 2</option>
                                            <option value="Harapan 3" {{ old('peringkat', $PrestasisainsISI->peringkat) == 'Harapan 3' ? 'selected' : '' }}>Harapan 3</option>
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
                                        <input type="text" id="nama_peserta" class="form-control" name="nama_peserta" autocomplete="olahraga-nama_peserta" value="{{ old('nama_peserta', $PrestasisainsISI->nama_peserta) }}">
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
                                        <input type="text" id="nama_pembimbing" class="form-control" name="nama_pembimbing" autocomplete="olahraga-nama_pembimbing" value="{{ old('nama_pembimbing', $PrestasisainsISI->nama_pembimbing) }}">
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
                    <button type="submit" class="btn btn-primary">Update Prestasi</button>
                </div>
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
    $('#datepicker').datepicker("setDate", new Date());
</script>


@endsection