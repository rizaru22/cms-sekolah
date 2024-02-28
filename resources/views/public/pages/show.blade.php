@extends('layouts.public')

@section('content')
<div class="container-xl px-0 px-md-3">
    <div class="p-2">
        <div class="row justify-content-center py-4"> <!-- Menggunakan justify-content-center untuk menengahkan row -->
            <div class="col-lg-8">
            <div class="card mb-3">
    <div class="carousel-page">
        @php
        $titleToDisplay = $page->title; // Ganti dengan nama yang Anda inginkan
        @endphp

        @if ($page->title === $titleToDisplay && is_array(explode(',', $page->image)))
        <div class="carousel">
            @foreach (explode(',', $page->image) as $index => $image)
                <div class="item @if($index === 0) active @endif" data-index="{{ $index }}">
                    <img src="{{ asset('storage/' . trim($image)) }}" alt="img-{{ $index + 1 }}">
                </div>
            @endforeach
        </div>
        @endif

        <div class="controls">
    <button class="prev-btn"><i class="fa"></i> Previous</button>
    <button class="next-btn">Next <i class="fa"></i></button>
</div>

    </div>
</div>



                <div class="card-body py-3 px-2 px-md-3">
                <div style="font-size: 1rem;" class="markdown">
                            {!! $page->body !!}
                        </div>
                    <h1 class="card-title mb-3 fw-bold" style="font-size: 1.5rem !important;">{{ $page->title }}</h1>

                    <div class="dropdown-divider"></div>

                    <div>
                        @include('partials.page-detail-info')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection