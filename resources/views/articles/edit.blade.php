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
                    Article
                </div>
                <h2 class="page-title">
                    Edit Article
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.articles.update', ['article' => $article->slug ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Article</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title of article <span class="text-danger">*</span></label>
                                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $article->title) }}">
                                        <input type="hidden" id="old-title" class="form-control" name="old-title" value="{{ old('title', $article->title) }}">
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <div class="form-control-plaintext">{{ $article->slug }}</div>
                                        <input type="hidden" name="slug" value="{{ $article->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                        <textarea id="description" class="form-control" name="description" rows="6" placeholder="Description of article..">{{ old('description', $article->description) }}</textarea>
                                        @error('description')
                                        <small class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Publish</label>
                                        <label class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" @if( old('is-published', $article->is_published) ) checked @endif name="is-published">
                                            <span class="form-check-label">
                                                Publish Article
                                            </span>
                                            <span class="form-check-description">
                                                Publish this article after it is made.
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Category of Article</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="category">Category <span class="text-danger">*</span></label>
                                        <select class="form-select" name="category_id" id="category">
                                            @foreach($categories as $category)
                                            @if( old('category_id', $article->category_id) == $category->id)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                            @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Edit Thumbnail Image</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <!-- <div class="mb-3">
                                    <img src="" alt="" class="image-placeholder">
                                </div> -->
                                    <div class="mb-3">
                                        <div class="form-label">Thumbnail Image</div>

                                        <input type="hidden" name="old-article-image" value="{{ $article->image }}">
                                        @if($article->image)
                                        <img class="w-100 block rounded overflow-hidden mb-2" id="img-preview" src="{{ asset('storage/' . $article->image) }}" alt="">
                                        @endif

                                        <input type="file" class="form-control mb-2" name="image" />
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <small class="text-muted block">Choose file if you want to replace the previous image.</small>
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
                            <h4 class="card-title">Content of article <span class="text-danger">*</span></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Content</label>
                                        <textarea id="editor" name="body">
                                        {{ old('body', $article->body) }}
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
                                <a href="{{ route('dashboard.articles.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Article</button>
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