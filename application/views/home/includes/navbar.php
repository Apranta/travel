<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Titan Tour Travel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home') ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbar_main_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
              <div class="dropdown-menu" aria-labelledby="navbar_1_dropdown_1">
                <a class="dropdown-item" href="<?= base_url('home/domestik') ?>">Domestik</a>
                <a class="dropdown-item" href="<?= base_url('home/internasional') ?>">Internasional</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/gallery') ?>">Gallery
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/testimoni') ?>">Testimoni
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/about') ?>">About
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
            <?php if ($this->session->userdata('username')): ?>

              <li class="nav-item">
                <a class="nav-link" href="<?= ($this->session->userdata('id_role') == 1) ? base_url('admin') : base_url('user')  ?>">Profile
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>"> Logout</a>
              </li>
            <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
            </li>
          <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
