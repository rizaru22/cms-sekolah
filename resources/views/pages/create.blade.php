@extends('layouts.app')

@include('partials.ckeditor-style')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center mb-3">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Page
                </div>
                <h2 class="page-title">
                    Create New Page
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.pages.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Form Create Page</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title of page <span class="text-danger">*</span></label>
                                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="menu">Menu <span class="text-danger">*</span></label>
                                        <select class="form-select" name="menu_id" id="menu">
                                            @foreach($menus as $menu)
                                            @if( old('menu_id') == $menu->id)
                                            <option selected value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @else
                                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('menu_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        @if( count($menus) <= 0 ) <small class="text-muted py-2 d-block">
                                            Menu does not exists. Please <a href="{{ route('dashboard.menus.create') }}" class="text-primary">create menu first.</a>
                                            </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Upload Page Image</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <!-- <div class="mb-3">
                                <img src="" alt="" class="image-placeholder">
                            </div> -->
                                    <div class="mb-3">
                                        <div class="form-label">Page Image</div>
                                        <input type="file" class="form-control" name="image[]" multiple/>
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Content of page <span class="text-danger">*</span></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Content</label>
                                        <textarea id="editor" name="body">
                                            @if( old('body') )
                                            {{ old('body') }}
                                            @else
                                            <h2>Bilingual Personality Disorder</h2>
                                            <figure class=" image image-style-side"><img src="https://c.cksource.com/a/1/img/docs/sample-image-bilingual-personality-disorder.jpg">
                                                <figcaption>One language, one person.</figcaption>
                                            </figure>
                                            <p>
                                                This may be the first time you hear about this made-up disorder but
                                                it actually isn’t so far from the truth. Even the studies that were conducted almost half a century show that
                                                <strong>the language you speak has more effects on you than you realise</strong>.
                                            </p>
                                            @endif
                                        </textarea>
                                        @error('body')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('dashboard.pages.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Page</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>

$('#editor').summernote({
    placeholder: 'Hello stand alone ui',
    tabsize: 2,
    height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ],
    callbacks: {
      onPaste: function (e) {
        var clipboardData = e.originalEvent.clipboardData;
        if (clipboardData && clipboardData.items) {
          for (var i = 0; i < clipboardData.items.length; i++) {
            var item = clipboardData.items[i];
            if (item.type.indexOf("image") !== -1) {
              // Handle image paste here
            } else if (item.type.indexOf("text/plain") !== -1) {
              // Handle text paste here
            } else if (item.type.indexOf("text/html") !== -1) {
              // Handle HTML paste here
            } else if (item.type.indexOf("text/uri-list") !== -1) {
              var reader = new FileReader();
              reader.onload = function (e) {
                var videoUrl = e.target.result;
                // Check if the URL is a video URL, and if so, insert it as a video
                if (isVideoURL(videoUrl)) {
                  $('#editor').summernote('createVideo', videoUrl);
                }
              };
              reader.readAsDataURL(item.getAsFile());
            }
          }
        }
      }
    }
  });

function isVideoURL(url) {
  // You can implement your own logic to determine if the URL is a video URL.
  // For a simple example, you can check if the URL contains certain video domain names like "youtube.com" or "vimeo.com".
  // If it's a video URL, return true, otherwise, return false.
  return url.includes("youtube.com") || url.includes("vimeo.com");
}


</script>
@include('partials.ckeditor-script')
@endsection