@extends('layouts.app')

@section('content')

<h2 class="text-dark mx-auto" style="margin-top: 3%;">Olahraga Smk Negeri 1 Karang Baru</h2>

<div class="row guru_pemandu">
    <div class="me-auto">
    <a href="{{ route('dashboard.olahraga_isi.olahragaindex') }}">
        <button class="w3-button">+</button>
    </a>
    </div>
    <div class="row">
        @foreach($OlahragaISI as $Olahraga)
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div>
                    <!-- Ganti $item->image_olahraga sesuai dengan kolom yang menyimpan path gambar di database -->
                    <img src="{{ asset('storage/' . $Olahraga->image_olahraga) }}" alt="Deskripsi Gambar" style="height: 200px; width:500px">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 border-right mx-auto text-center">
                            <div class="description-block">
                                <!-- Ganti $Olahraga->title sesuai dengan kolom yang menyimpan judul di database -->
                                <h1 class="text-dark">{{ $Olahraga->title }}</h1>
                            </div>
                            <!-- /.description-block -->
                            <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-info" title="Edit data" href="{{ route('dashboard.OlahragaISI.edit', $Olahraga->id) }}">

                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('dashboard.OlahragaISI.destroy',$Olahraga->id) }}" method="post">
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        @endforeach
    </div>

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