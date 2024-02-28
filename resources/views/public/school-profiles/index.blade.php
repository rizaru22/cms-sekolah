@extends('layouts.public')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center mb-3">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    <!-- Overview -->
                </div>
                <h2 class="page-title">
                    Profil Sekolah
                </h2>
            </div>
            <!-- Page title actions -->
        </div>
    </div>

    <div class="row public-1">
        <div class="col-md-8 mb-2 mb-sm-0" style="background-color: #fff;">
            <div class="card p-3">
                <h2 class="d-block mb-3">Kepala Sekolah</h2>
                <img class="rounded block mb-3 centered-image" style="height: 300px; width:450px;" src="{{ asset('storage/' . $profile->kepala_sekolah_image) }}"></img>

                <h2 class="d-block mb-3" style="font-size:x-large;">Kata Sambutan</h2>
                <div style="max-width: clamp(526px, 80%, 100%); font-size:medium;">
                    {!! $profile->kata_sambutan !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2">
                                Nama sekolah
                            </small>
                            <p class="d-block">{{ $profile->name }}</p>
                        </div>

                        <div class="dropdown-divider mb-3"></div>

                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2">
                                Alamat Sekolah
                            </small>
                            <p class="d-block">{{ $profile->address }}</p>
                        </div>

                        <div class="dropdown-divider mb-3"></div>

                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2">
                                Phone Number
                            </small>
                            <a class="d-block" href="tel:{{ $profile->phone_number }}">{{ $profile->phone_number }}</a>
                        </div>

                        <div class="dropdown-divider mb-3"></div>

                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2">
                                Postal Number
                            </small>
                            <p class="d-block">{{ $profile->phone_number }}</p>
                        </div>

                        <div class="dropdown-divider mb-3"></div>

                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2">
                                Email
                            </small>
                            <a class="d-block" href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                        </div>

                        <div class="dropdown-divider mb-3"></div>

                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2">
                                Kepala Sekolah
                            </small>
                            <p class="d-block">{{ $profile->kepala_sekolah }}</p>
                        </div>

                        <div class="dropdown-divider mb-3"></div>

                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-2">
                                Updated at
                            </small>
                            <p class="d-block">{{ $profile->updated_at == $profile->created_at ? 'Not updated yet' : $profile->updated_at->format('d M Y H:i') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection