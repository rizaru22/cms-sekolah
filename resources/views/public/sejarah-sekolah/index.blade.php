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
                    Sejarah Sekolah
                </h2>
            </div>
        </div>
    </div>

    <div class="row public-1">
        <div class="col-md-12">
            <div class="card p-3">
            <div class="row">
    <div class="col">
        <div class="mb-3 d-flex align-items-center">
            <p class="d-block sj-3" style="margin-right: 10px;">{{ $sejarah->name }}</p>
            <img style="margin-bottom: 2%;" src="{{ asset('storage/' . $schoolProfile->logo) }}" class="bg-transparent avatar me-2" alt="">
        </div>
    </div>
</div>

                <div class="row">
                    <div class="col-md-12">
                        <p class="d-block sejarah">
                            {{ $sejarah->sejarah }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection