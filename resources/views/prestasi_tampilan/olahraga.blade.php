@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="me-auto">
      <a href="{{ route('dashboard.prestasi_isi.olahragaindex') }}">
        <button class="w3-button">+</button>
      </a>
    </div>
    @foreach($PrestasiolahragaISI as $poi)
    <div class="col-md-3">
      <div class="profile-card-4 text-center bg-white">
        <div>
          <img src="{{ asset('storage/' . $poi->image_lomba) }}" alt="Deskripsi Gambar" style="height: 200px; width:500px">
        </div>
        <div class="profile-content">
          <h2 class="text-dark">{{ $poi->nama_peserta }}</h2>

          <!-- <div class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</div> -->
          <div class="row">
            <!-- <div class="col-xs-4">
                    <div class="profile-overview">
                        <p>jnska</p>
                        <h4>sajsa</h4>
                    </div>
                </div> -->
            <div class="col-xs-4">
              <h4 style="margin-top: 3px; margin-bottom: 10px;">{{ $poi->nama_lomba }}</h4>
              <h2 style="margin-top: 0px; margin-bottom: 10px;">{{ $poi->peringkat }}</h2>
              <h4 style="margin-top: 0px; margin-bottom: 10px;">{{ $poi->tingkat }}</h4>
            </div>
            <div class="col-xs-4">
              <p style="margin-bottom: 5px; margin-top:10px;">Guru Pembimbing</p>
              <h4 style="margin-top: 0; margin-bottom: 10px;">{{ $poi->nama_pembimbing }}</h4>
            </div>

            <div class="col-xs-4">
              <p style="margin-bottom: 5px;">Tahun</p>
              <h4 style="margin-top: 0; margin-bottom: 10px;">{{ $poi->tanggal_pelaksanaan }}</h4>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <a class="btn btn-sm btn-info" title="Edit data" href="{{ route('dashboard.PrestasiolahragaISI.edit', $poi->id)  }}">

            <i class="fas fa-edit"></i> Edit
          </a>
          <form id="deleteForm" action="{{ route('dashboard.PrestasiolahragaISI.destroy',$poi->id) }}" method="post">
            @csrf
            @method('DELETE')
           <button class="btn-danger" type="submit">
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
    @endforeach
  </div>
</div>

</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
document.getElementById('deleteForm').addEventListener('submit', function (event) {
  event.preventDefault(); // Mencegah pengiriman formulir langsung

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
      // Lanjutkan dengan pengiriman formulir jika dikonfirmasi
      event.target.submit();
    }
  });
});
</script>
@endsection