<div class="row">
	<div class="col-md-12">
		<div class="card text-white bg-secondary my-5 py-4 text-center">
	      <div class="card-body">
	        <h5>Pemesanan Berhasil</h5>
	        <p class="text-white m-0">
	        	Id Order Anda <?= $data->order_id ?> <small>Harap Simpan Order Id untuk Melakukan Konfirmasi Pembayaran</small><br>
	          Silahkan Lakukan Pembayaran Sejumlah Rp. <?= $data->total ?> ke <br>
	          <?php $norek = $this->Norek_m->get_last_row();
	          echo $norek->isi; ?>
				Apabila telah Melakukan Pembayaran silahkan upload bukti pembayaran <a href="<?= base_url('home/bukti') ?>" > Disini </a>
	        </p>
	      </div>
	    </div>
	</div>
</div>