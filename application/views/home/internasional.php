        <h1 class="my-4">Titan Tour Travel
            <small>Internasional</small>
        </h1>

      <div class="row">
            <?php foreach ($data as $value): ?>
                <div class="col-lg-6 portfolio-item">
                  <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="<?= base_url('assets/img/' . $value->id_produk .'.jpg' ) ?>" onerror="this.src='http://placehold.it/700x400';" ></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="<?= base_url('home/detail/' . $value->id_produk) ?>"><?= $value->nama_produk ?></a>
                      </h4>
                      <p class="card-text"><?= $value->deskripsi ?></p>
                    </div>
                  </div>
                </div>
            <?php endforeach ?>
      </div>