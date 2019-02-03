<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Titan Tour Travel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('home') ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php if ($this->session->userdata('username')): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>"><?= $this->session->userdata('username') ?> , Logout</a>
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
