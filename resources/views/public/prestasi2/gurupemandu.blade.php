@extends('layouts.public')

@section('content')
<h2 class="text-dark mx-auto" style="margin-top: 3%;">Guru Pemandu Smk Negeri 1 Karang Baru</h2>
<div class="row guru_pemandu">

    @foreach($GurupemanduISI as $guru)
    <div class="col-12 col-sm-6 col-lg-3">
        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">

            <div class="advisor_thumb"><img src="{{ asset('storage/' . $guru->image) }}" alt style="height: 240px;">

            </div>

            <div class="single_advisor_details_info" style="margin-top: -50px;">
                <h6 style="font-size: 1.5em; position: relative; z-index: 2;">{{ $guru->name }}</h6>
                <div class="row">
                    <div class="col-6">
                        <img style="margin-bottom: 2%; margin-right:110px;" src="{{ asset('storage/' . $schoolProfile->logo) }}" class="bg-transparent avatar" alt="">
                    </div>
                    <div class="col-6">
                        <p class="designation" style="font-size: 1.2em; margin-top:10px;">{{ $guru->pemandu }}</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
    @endforeach
</div>

@endsection