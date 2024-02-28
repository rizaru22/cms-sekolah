@extends('layouts.app')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center mb-3">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    Sejarah Sekolah
                </h2>
            </div>
            @can('update', $sejarah)
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('dashboard.sejarah-sekolah.edit') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                            <line x1="16" y1="5" x2="19" y2="8" />
                        </svg>
                        Edit Sejarah Sekolah
                    </a>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <p class="d-block sj-2" style="margin-left: 20%;">
                                {{ $sejarah->name }}
                            </p>
                            <img src="{{ asset('storage/' . $sejarah->image) }}" alt="" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="d-block">
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