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
                    VISI MISI
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mx-auto mtt">
            <div class="row">
                <div class="col">
                    <div class="mb-3 d-flex align-items-center">
                        <p class="d-block sj-2 p-3" style="margin-right: 10px;">{{ $visimisi->name }}</p>
                        <img style="margin-bottom: 2%;" src="{{ asset('storage/' . $schoolProfile->logo) }}" class="bg-transparent avatar me-2" alt="">
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="row public-1">
        <div class="col-10 mx-auto">
            <div class="card p-3">
                <h1 class="mx-auto">VISI</h1>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <p class="d-block visi-misi" style="text-align: center;">{{ $visimisi->visi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row public-1">
        <div class="col-10 mx-auto">
            <div class="card p-3">
                <h1 class="mx-auto">MISI</h1>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <p class="d-block visi-misi">{!! str_replace('. ', '.&nbsp;', $visimisi->misi) !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection