
  <footer style="background-color: #0C356A;" class="text-center text-lg-start text-white">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/c8e5b3df48.js" crossorigin="anonymous"></script>
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row my-4">
        <!--Grid column-->
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">

          <div class="rounded-circle bg-white-2 shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
            <img src="{{ asset('storage/' . $schoolProfile->logo) }}" height="160" width="360" alt=""
                 loading="lazy" />
          </div>

          <p class="text-center">SMKN1 KARANG BARU</p>

          <ul class="list-unstyled d-flex flex-row justify-content-center">
            <li>
              <a class="text-white px-2" href="#!">
                <i class="fab fa-facebook-square"></i>
              </a>
            </li>
            <li>
              <a class="text-white px-2" href="#!">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a class="text-white ps-2" href="#!">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Link Terkait</h5>
          <ul class="list-unstyled">
            <li>
            <p><a href="https://www.kemdikbud.go.id/" class="text-light">Kemendikbud</a></p>
            </li>
            <li>
            <p><a href="https://www.youtube.com/channel/UCyDq0FGYcZrmlgFNUHZm_Hg" class="text-light">GLS SMKN 1 Karang Baru</a></p>
            </li>
            <li>
            <p><a href="https://www.youtube.com/channel/UCKUgjqbq2dKEKqdtkWN1RdA" class="text-light">Jurnalistik SMKN 1 Karang Baru</a></p>
            </li>
            <li>
            <p><a href="https://www.instagram.com/smknegeri1karangbaru/?utm_medium=copy_link" class="text-light">Instagram SMKN 1 Karang Baru</a></p>
            </li>
            <li>
            <p><a href="https://www.youtube.com/@smknegeri1karangbaru483" class="text-light">youtube SMKN 1 Karang Baru</a></p>
            </li>
            </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">hubungi kami</h5>

          <ul class="list-unstyled">
            <li>
              <p><i class="fas fa-map-marker-alt pe-2"></i>{{ $schoolProfile->address }}</p>
            </li>
            <li>
              <p><i class="fas fa-phone pe-2"></i>{{ $schoolProfile->phone_number }}</p>
            </li>
            <li>
              <p><i class="fas fa-envelope pe-2 mb-0"></i>{{ $schoolProfile->email }}</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
    <h5 class="text-uppercase mb-4">Peta</h5>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.596373916206!2d98.03758007363824!3d4.298302845017341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30377421d9e7e359%3A0xdb391ef824e6077!2sSMK%20Negeri%201%20Karang%20Baru!5e0!3m2!1sid!2sid!4v1698205931559!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
  </footer>

<!-- End of .container -->