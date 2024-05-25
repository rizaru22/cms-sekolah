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
                    Major
                </div>
                <h2 class="page-title">
                    Edit Major
                </h2>
            </div>
        </div>

        <form action="{{ route('dashboard.majors.update', ['major' => $major->slug]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Major</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name of major <span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $major->name) }}">
                                        <input type="hidden" id="old-name" class="form-control" name="old-name" value="{{ old('name', $major->name) }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                        <textarea id="description" class="form-control" name="description" rows="6" placeholder="Address of major..">{{ old('description', $major->description) }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">logo major</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-label">logo major</div>

                                        <input type="hidden" name="old-logo-major" value="{{ $major->logo_major }}">

                                        @if($major->image)
                                        <img class="w-100 block rounded overflow-hidden mb-2" id="img-preview" src="{{ asset('storage/' . $major->logo_major) }}" alt="">
                                        @endif

                                        <input type="file" class="form-control mb-2" name="logo_major" />
                                        @error('logo_major')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <small class="text-muted d-block">Choose file if you want to replace the previous logo_major.</small>
                                    </div>
                                    <!-- Copy code -->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Head of Major</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="head">Teacher Name <span class="text-danger">*</span></label>
                                <select type="text" class="form-select" placeholder="Select a teacher" name="head_of_major_id" id="select-head">
                                    @foreach($heads as $head)
                                    @if( old('head_of_major_id', $major->head_of_major_id) == $head->id)
                                    <option selected value="{{ $head->id }}">{{ $head->name }}</option>
                                    @else
                                    <option value="{{ $head->id }}">{{ $head->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('head_of_major_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <div class="form-control-plaintext">{{ $major->slug }}</div>
                                <input type="hidden" name="slug" value="{{ $major->slug }}">
                            </div>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">Image head major</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <!-- <div class="mb-3">
                                    <img src="" alt="" class="image-placeholder">
                                </div> -->
                                    <div class="mb-3">
                                        <div class="form-label">Image head major</div>

                                        <input type="hidden" name="old-image-major" value="{{ $major->image_major }}">

                                        @if($major->image)
                                        <img class="w-100 block rounded overflow-hidden mb-2" id="img-preview" src="{{ asset('storage/' . $major->image_major) }}" alt="">
                                        @endif

                                        <input type="file" class="form-control mb-2" name="image_major" />
                                        @error('image_major')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <small class="text-muted d-block">Choose file if you want to replace the previous image major.</small>
                                    </div>
                                    <!-- Copy code -->



                                </div>
                            </div>
                        </div>
                        
                    </div>
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

                                        <input type="hidden" name="old-major-image" value="{{ $major->image }}">

                                        @if($major->image)
                                        <img class="w-100 block rounded overflow-hidden mb-2" id="img-preview" src="{{ asset('storage/' . $major->image) }}" alt="">
                                        @endif

                                        <input type="file" class="form-control mb-2" name="image" />
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <small class="text-muted d-block">Choose file if you want to replace the previous image.</small>
                                    </div>
                                    <!-- Copy code -->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
    <div class="col-md-12">
        <div class="card md-2">
            <div class="mb-3">
                <div class="form-label">Image Carousel</div>

                <input type="hidden" name="old-images-carousel" value="{{ $major->image_carousel }}">

                @php
                $oldImageCarousels = explode(',', $major->image_carousel);
                @endphp

                <div class="image-carousel-container">
                    @foreach ($oldImageCarousels as $index => $oldImageCarousel)
                    <div class="image-carousel-item">
                        <img src="{{ asset('storage/' . trim($oldImageCarousel)) }}" alt="Image Carousel">
                        <div class="remove-button">
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeImageCarousel(this, {{ $major->id }}, {{ $index }})">Remove</button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div id="new-image-carousels">
                    <!-- Input file untuk image_carousels baru akan ditambahkan di sini -->
                </div>

                <button type="button" class="btn btn-primary btn-sm" onclick="addNewImageCarousel()">Add More</button>

                @error('image_carousel')
                <small class="text-danger">{{ $message }}</small>
                @enderror

                <small class="text-muted d-block">Choose files if you want to add to the previous image carousel or click "Add More" to add new ones.</small>
            </div>
        </div>
    </div>
</div>


            <div class="row">
                <div class="col">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="card-title">Content of major page <span class="text-danger">*</span></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Content</label>
                                        <textarea id="editor" name="body">
                                        {{ old('body', $major->body) }}
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
                                <a href="{{ route('dashboard.majors.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Major</button>
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
<script src="{{ asset('tabler/dist/libs/tom-select/dist/js/tom-select.base.min.js') }}"></script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('select-head'), {
            copyClassesToDropdown: false,
            dropdownClass: 'dropdown-menu',
            optionClass: 'dropdown-item',
            controlInput: '<input>',
            render: {
                item: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
    // @formatter:on

    let newImageCarouselIndex = 0;

    function removeImageCarousel(element, majorId, index) {
        // Buat permintaan AJAX untuk menghapus gambar dari database
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', '/remove-image-carousel/' + majorId, true);
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

        xhr.send(JSON.stringify({
            index: index
        }));
    }



    // function removeImageCarousel(button) {
    //     const index = button.getAttribute('data-index');

    //     // Membuat objek XMLHttpRequest
    //     const xhr = new XMLHttpRequest();

    //     // Mengatur jenis permintaan dan URL
    //     xhr.open('DELETE', `/removeImageCarousel/${index}`, true);

    //     // Menangani respons ketika permintaan selesai
    //     xhr.onload = function() {
    //         if (xhr.status >= 200 && xhr.status < 300) {
    //             // Permintaan berhasil, Anda dapat memperbarui tampilan jika diperlukan.
    //             console.log('Permintaan DELETE berhasil:', xhr.responseText);
    //         } else {
    //             // Penanganan kesalahan jika permintaan gagal.
    //             console.error('Kesalahan permintaan DELETE:', xhr.statusText);
    //         }
    //     };

    // Mengirim permintaan
    //     xhr.send();
    // }






    function addNewImageCarousel() {
        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = `new_image_carousel[${newImageCarouselIndex}]`;
        newInput.accept = 'image/*';
        newInput.className = 'form-control mb-2';
        newInput.setAttribute('multiple', true);

        const newDiv = document.createElement('div');
        newDiv.className = 'mb-2';
        newDiv.appendChild(newInput);

        document.getElementById('new-image-carousels').appendChild(newDiv);

        newImageCarouselIndex++;
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