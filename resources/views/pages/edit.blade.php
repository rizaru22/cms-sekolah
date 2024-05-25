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
                    Edit Page
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.pages.update', ['page' => $page->slug ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Page</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title of page <span class="text-danger">*</span></label>
                                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $page->title) }}">
                                        <input type="hidden" id="old-title" class="form-control" name="old-title" value="{{ old('title', $page->title) }}">
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <div class="form-control-plaintext">{{ $page->slug }}</div>
                                        <input type="hidden" name="slug" value="{{ $page->slug }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="menu">Menu <span class="text-danger">*</span></label>
                                        <select class="form-select" name="menu_id" id="menu">
                                            @foreach($menus as $menu)
                                            @if( old('menu_id', $page->menu_id) == $menu->id)
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

                                        <input type="hidden" name="old-page-image" value="{{ $page->image }}">

                                        @php
                                        $oldImage = explode(',', $page->image);
                                        @endphp

                                        @foreach ($oldImage as $index => $oldImage)
                                        <div class="mb-22">
                                            <img class="w-100 block rounded overflow-hidden mb-2" src="{{ asset('storage/' . trim($oldImage)) }}" alt="Image ">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeImage(this, {{ $page->id }}, {{ $index }})">Remove</button>
                                        </div>
                                        @endforeach

                                        <div id="new-image">
                                            <!-- Input file untuk image_ baru akan ditambahkan di sini -->
                                        </div>

                                        <button type="button" class="btn btn-primary btn-sm" onclick="addNewImage()">Add More</button>

                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <small class="text-muted d-block">Choose files if you want to add to the previous image  or click "Add More" to add new ones.</small>
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
                                        {{ old('body', $page->body) }}
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
                                <button type="submit" class="btn btn-primary">Update Page</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('partials.ckeditor-script')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    let newImageIndex = 0;

function removeImage(element, pageId, index) {
// Buat permintaan AJAX untuk menghapus gambar dari database
var xhr = new XMLHttpRequest();
xhr.open('DELETE', '/remove-image/' + pageId, true);
xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

xhr.onload = function() {
    if (xhr.status === 200) {
        // Gambar berhasil dihapus dari database, sekarang hapus elemen gambar dari tampilan
        element.parentNode.remove();
    } else {
        console.error(xhr.responseText);
    }
};

xhr.send(JSON.stringify({ index: index }));
}



function addNewImage() {
    const newInput = document.createElement('input');
    newInput.type = 'file';
    newInput.name = `new_image[${newImageIndex}]`;
    newInput.accept = 'image/*';
    newInput.className = 'form-control mb-2';
    newInput.setAttribute('multiple', true);

    const newDiv = document.createElement('div');
    newDiv.className = 'mb-2';
    newDiv.appendChild(newInput);

    document.getElementById('new-image').appendChild(newDiv);

    newImageIndex++;
}

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
@endsection