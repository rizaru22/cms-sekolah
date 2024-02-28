@extends('layouts.public')

@section('content')

<div class="container-fluid">
  <div class="row">
      @foreach($PrestasisainsISI as $psai)
      <div class="col-md-3">
        <div class="profile-card-4 text-center bg-white">
          <div>
            <img src="{{ asset('storage/' . $psai->image_lomba) }}" alt="Deskripsi Gambar" style="height: 200px; width:500px">
          </div>
          <div class="profile-content">
            <h2 class="text-dark">{{ $psai->nama_peserta }}</h2>

            <!-- <div class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</div> -->
            <div class="row">
              <!-- <div class="col-xs-4">
                    <div class="profile-overview">
                        <p>jnska</p>
                        <h4>sajsa</h4>
                    </div>
                </div> -->
              <div class="col-xs-4">
                <h4 style="margin-top: 3px; margin-bottom: 10px;">{{ $psai->nama_lomba }}</h4>
                <h2 style="margin-top: 0px; margin-bottom: 10px;">{{ $psai->peringkat }}</h2>
                <h4 style="margin-top: 0px; margin-bottom: 10px;">{{ $psai->tingkat }}</h4>
              </div>
              <div class="col-xs-4">
                <p style="margin-bottom: 5px; margin-top:10px;">Guru Pembimbing</p>
                <h4 style="margin-top: 0; margin-bottom: 10px;">{{ $psai->nama_pembimbing }}</h4>
              </div>

              <div class="col-xs-4">
                <p style="margin-bottom: 5px;">Tahun</p>
                <h4 style="margin-top: 0; margin-bottom: 10px;">{{ $psai->tanggal_pelaksanaan }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>

@endsection