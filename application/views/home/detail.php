<div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="<?= base_url('assets/img/'. $data->id_produk .'.jpg') ?>" onerror="this.src='http://placehold.it/900x400';" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light"><?= $data->nama_produk ?></h1>
        <p><?= $data->deskripsi ?></p>
        <a class="btn btn-default disabled" href="#"><?= $data->jenis ?></a>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <h5>Jadwal</h5>
        <p class="text-white m-0">
          <?= $data->jadwal ?>
        </p>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">
      <?php foreach ($paket as $value): ?>
        
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title"><?= $value->nama_paket ?></h2>
            <p class="card-text"><?= $value->deskripsi ?></p>
          </div>
          <div class="card-footer">
            <label class="label label-default"><i class="fa fa-money"></i> Rp. <?= $value->harga ?></label>
            <div class="btn-group" style="float:right !important;">
               
              <a href="#" class="btn btn-primary btn-sm pull-right"  >detail</a>
              <a href="<?= base_url('home/pemesanan?id_produk='. $value->id_produk .'&id_paket='.$value->id_paket ) ?>" class="btn btn-success btn-sm">Pesan</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      <!-- /.col-md-4 -->

    </div>