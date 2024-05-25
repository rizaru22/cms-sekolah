@extends('layouts.public')

@section('content')
<h2 class="text-dark mx-auto" style="margin-top: 3%;">Olahraga Smk Negeri 1 Karang Baru</h2>

<div class="row guru_pemandu">
<div class="row">
@foreach($OlahragaISI as $Olahraga)
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div>
                <!-- Ganti $item->image_olahraga sesuai dengan kolom yang menyimpan path gambar di database -->
                <img src="{{ asset('storage/' . $Olahraga->image_olahraga) }}" alt="Deskripsi Gambar" style="height: 200px; width:500px">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12 border-right mx-auto text-center">
                        <div class="description-block">
                            <!-- Ganti $Olahraga->title sesuai dengan kolom yang menyimpan judul di database -->
                            <h1 class="text-dark">{{ $Olahraga->title }}</h1>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
@endforeach
</div>
</div>
@endsection