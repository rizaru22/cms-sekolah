@extends('layouts.public')

@section('content')
<div class="container-xl px-0 px-md-3">
    <div class="p-2">
        <div class="row py-4">
            <div class="col-lg-8 mx-auto">
                <div class="card mb-3">
                    <div class="card-img-top img-responsive img-responsive-21x9" style="background-image: url({{ asset('storage/' . $article->image) }})"></div>

                    <div class="card-body py-3 px-2 px-md-3">
                        <div class="d-none d-md-block">
                            @include('partials.article-detail-info')
                        </div>

                        <h1 class="card-title mb-3 fw-bold" style="font-size: 1.5rem !important;">{{ $article->title }}</h1>
                        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/140dAiIMk8o?si=ocMx3cvs1UdjyOUt" frameborder="0" allowfullscreen></iframe> -->


                        <div class="dropdown-divider"></div>

                        <div style="font-size: 1rem; " class="markdown">
                            {!! $article->body !!}
                        </div>

                        <div class="d-block d-md-none">
                            @include('partials.article-detail-info')
                        </div>

                        <div class="container mt-4">
                            <h2 class="mb-5 text-center">share</h2>
                            {!! $articleshare !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="module" src="{{ asset('tabler/dist/js/main.js') }}"></script> -->

@endsection