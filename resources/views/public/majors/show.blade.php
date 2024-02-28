@extends('layouts.public')

@section('content')
<div class="container-fluid px-0 px-md-3">
    <div class="p-2">
        <div class="row pt-4">
            <div class="col-lg-7">
                <div class="card mb-3">
                    <div class="mb-3">
                        <div class="text-uppercase fw-bold d-block fz-zz mb-2 mj-4">
                            Description
                        </div>
                        <div style="font-size: 1rem;" class="markdown mj-4">
                            {!! $major->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 ms-auto"> <!-- Menggunakan ms-auto untuk menempatkan ke sebelah kanan -->
                <div class="d-block mb-2">
                    <div class="card p-3">
                        <div class="row">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2 ms-4">
                                Kepala Jurusan
                            </small>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    @if( $major->image_major )
                                    <img src="{{ asset('storage/' . $major->image_major) }}" alt="" class="w-100 rounded mb-3 block p80">
                                    @else
                                    <div>
                                        <i class="fa-solid fa-user-tie" style="font-size: 48px; margin-left:10px;"></i>
                                    </div>

                                    @endif
                                    <a href="{{ route('dashboard.teachers.index', ['techer' => $major->head->name]) }}" class="d-block text-reset">{{ $major->head->name }}</a>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <p style="font-size: medium;">{{ $major->description }}</p>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="card-img-top img-responsive img-responsive-21x9" style="background-image: url({{ asset('storage/' . $major->image) }})"></div>

                            <div class="card-body py-3 px-2 px-md-3">
                                <h1 class="card-title mb-3 fw-bold" style="font-size: 1.5rem !important;">{{ $major->name }}</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- col-lg-4 karena ada gap di parent -->
    <div class="container-fluid px-0 px-md-3">
        <div class="row pb-4">
        </div>
        <div class="row major">
            <hr class="hr-garis-s2 s2">
            @php
            $nameToDisplay = $major->name; // Ganti dengan nama yang Anda inginkan
            @endphp

            <div class="owl-carousel product-carousel owl-loaded owl-drag" style="visibility: visible;">
                @foreach ($majors as $major)
                @if ($major->name === $nameToDisplay && is_array(explode(',', $major->image_carousel)))
                @foreach (explode(',', $major->image_carousel) as $image_carousel)
                @if (trim($image_carousel) !== '')
                <img src="{{ asset('storage/' . trim($image_carousel)) }}" alt="img-1" class="jurusan-img-2">
                @else
                <!-- Tampilkan gambar kosong atau pesan yang sesuai -->
                @endif
                @endforeach
                @endif
                @endforeach
            </div>
        </div>
        <hr class="hr-garis-s2">





    </div>
    @endsection