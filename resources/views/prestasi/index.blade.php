@extends('layouts.app')

@section('content')

<div class="row" style="margin-top: 5%; margin-left:18%; margin-bottom:10%;">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="{{ route('dashboard.prestasi2be.gurupemandu') }}">
        <div class="card" style="background: linear-gradient(to right, #3498db, #FFFFFF); border-left: 5px solid #3498db; height: 100px; width: 270px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2 text-center">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Guru Pemandu
                        </div>
                        <h2 class="text-dark">{{ $countGurupemanduIsi }}</h2>
                    </div>
                    <div class="col-auto">
                        <img src="/tabler/dist/img/pemandu.png" alt="Deskripsi Gambar" style="height: 70px; width:70px;">
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>





    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="{{ route('dashboard.prestasi2be.prestasi') }}">
        <div class="card" style="background: linear-gradient(to right, #FFD700, #FFFFFF); border-left: 5px solid #FFD700; height: 100px; width: 270px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2 text-center">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Prestasi
                        </div>
                        <h2 class="text-dark">{{ $countPrestasiOlahraga + $countPrestasiPenelitian + $countPrestasiSains + $countPrestasiSeni }}</h2>
                    </div>
                    <div class="col-auto">
                        <img src="/tabler/dist/img/piala.png" alt="Gambar" style="height: 70px; width:70px;">
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="{{ route('dashboard.prestasi2be.olahraga') }}">
        <div class="card" style="background: linear-gradient(to right, #4CAF50, #FFFFFF); border-left: 5px solid #4CAF50; height: 100px; width: 270px;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2 text-center">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            olahraga
                        </div>
                        <h2 class="text-dark">{{ $countOlahragaIsi }}</h2>
                    </div>
                    <div class="col-auto">
                        <img src="/tabler/dist/img/bola.png" alt="Deskripsi Gambar" style="height: 70px; width:70px;">
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>

</div>

@endsection