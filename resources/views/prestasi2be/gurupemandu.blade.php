@extends('layouts.app')

@section('content')

<h2 class="text-dark mx-auto" style="margin-top: 3%;">Guru Pemandu Smk Negeri 1 Karang Baru</h2>
<div class="row guru_pemandu">
  <div class="me-auto">
<a href="{{ route('dashboard.guru_pemandu_isi.gurupemanduindex') }}">
    <button class="w3-button w3-xlarge w3-circle w3-black">+</button>
  </a>
  </div>
  @foreach($GurupemanduISI as $guru)
    <div class="col-12 col-sm-6 col-lg-3">
        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">

            <div class="advisor_thumb"><img src="{{ asset('storage/' . $guru->image) }}" alt style="height: 240px;">

            </div>

            <div class="single_advisor_details_info" style="margin-top: -50px;">
                <h6 style="font-size: 1.5em; position: relative; z-index: 2;">{{ $guru->name }}</h6>
                <div class="row">
                    <div class="col-6">
                        <img style="margin-bottom: 2%; margin-right:110px;" src="{{ asset('storage/' . $schoolProfile->logo) }}" class="bg-transparent avatar" alt="">
                    </div>
                    <div class="col-6">
                        <p class="designation" style="font-size: 1.2em; margin-top:10px;">{{ $guru->pemandu }}</p>
                    </div>
                    <div class="d-flex justify-content-center">
          <a class="btn btn-sm btn-info" title="Edit data" href="{{ route('dashboard.GurupemanduISI.edit', $guru->id) }}">

            <i class="fas fa-edit"></i> Edit
          </a>
          <form action="{{ route('dashboard.GurupemanduISI.destroy',$guru->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn-danger" type="submit" onclick="konfirmasiHapus()">
              Hapus
            </button>
          </form>

          <!-- Modal -->
          <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <!-- Konten modal Anda letakkan di sini -->
          </div>

        </div>
                </div>

            </div>

        </div>
    </div>
    @endforeach
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  function konfirmasiHapus() {
    Swal.fire({
      title: "Apakah Anda yakin?",
      text: "Anda tidak akan dapat mengembalikannya!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus saja!"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Terhapus!",
          text: "Berkas Anda telah dihapus.",
          icon: "success"
        });
        // Tambahkan logika untuk melakukan penghapusan sebenarnya di sini jika diperlukan
      }
    });
  }
</script>

@endsection