@extends('layouts.app')

@section('content')

<div class="container-fluid prestasi p-0">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 col_prestasi_1">
            <a href="{{ route('dashboard.prestasi_tampilan.penelitian') }}">
            <div class="content">
                <div class="text-center">
                <h2 class="text-dark mx-auto h2_prestasi">Penelitian</h2>
            <span class="text-dark mx-auto span_prestasi">{{ $countPrestasiPenelitian}}</span>
            </div>
                <div class="img_prestasi">
                    <img src="/tabler/dist/img/penelitian.png" alt="gambar">
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 col-12" style="background: linear-gradient(blue, white);">
        <a href="{{ route('dashboard.prestasi_tampilan.olahraga') }}">
            <div class="content">
                <div class="text-center">
                <h2 class="text-dark mx-auto h2_prestasi">Olahraga</h2>
            <span class="text-dark mx-auto span_prestasi">{{ $countPrestasiOlahraga }}</span>
            </div>
                <div class="img_prestasi_2">
                    <img src="/tabler/dist/img/olahraga.png" alt="gambar">
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 col-12" style="background: linear-gradient(green, white);">
        <a href="{{ route('dashboard.prestasi_tampilan.sains') }}">
            <div class="content">
                <div class="text-center">
                <h2 class="text-dark mx-auto h2_prestasi">Sains</h2>
            <span class="text-dark mx-auto span_prestasi">{{ $countPrestasiSains }}</span>
            </div>
                <div class="img_prestasi_3">
                    <img src="/tabler/dist/img/sains.png" alt="gambar">
                </div>
            </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 col-12" style="background: linear-gradient(red, white);">
        <a href="{{ route('dashboard.prestasi_tampilan.seni') }}">
            <div class="content">
                <div class="text-center">
                <h2 class="text-dark mx-auto h2_prestasi">Seni</h2>
            <span class="text-dark mx-auto span_prestasi">{{ $countPrestasiSeni }}</span>
            </div>
                <div class="img_prestasi_4">
                    <img src="/tabler/dist/img/seni.png" alt="gambar">
                </div>
            </div>
            </a>
        </div>
    </div>
</div>


@endsection