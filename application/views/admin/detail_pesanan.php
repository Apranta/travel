<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				Detail Pemesanan - 
			</div>
			<div class="portlet-body">
				<?php if ($data->payment_status == 'paid') : ?>
					<button class="btn btn-primary">Pembayaran Sukses</button>
				<?php elseif($data->payment_status == 'pending') : ?>
					<button class="btn btn-success" onclick="konfirm(<?= $data->order_id ?>);">Konfirmasi Pembayaran</button>
				<?php else : ?>
					<button class="btn btn-danger">Pembayaran Dibatalkan</button>
				<?php endif; ?>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<table class="table table-bordered"> 
							
							<tbody>
								<tr>
									<td>Nama Pemesan</td>
									<td><?= $this->User_m->get_row(['id_user' => $data->customer_id])->nama ?></td>
								</tr>
								<tr>
									<td>Nama Perjalanan</td>
									<td><?= $this->Produk_m->get_row(['id_produk' => $this->Paket_m->get_row(['id_paket' => $data->id_paket])->id_produk])->nama_produk ?></td>
								</tr>
								<tr>
									<td>Tanggal Keberangkatan</td>
									<td><?= $data->order_date ?></td>
								</tr>
								<tr>
									<td>Jumlah Pesanan</td>
									<td><?= $data->qty ?></td>
								</tr>

								<tr>
									<td>Total</td>
									<td>Rp.<?= $data->total ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal Pembayaran</th>
									<th>Bukti Pembayaran</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($this->Pembayaran_m->get(['id_order' => $data->order_id]) as $value): ?>
								<tr>
									<td><?= $value->pembayaran_date ?></td>
									<td><?= $value->pembayaran_date ?></td>
									<td><button class="btn btn-success btn-circle">View</button></td>
								</tr>
									
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function konfirm(id){
		$.ajax({
	        url: "<?= base_url('admin/pemesanan_detail') ?>",
	        type: 'POST',
	        data: {
	            id: id,
	            konfirm: true
	        },
	        success: function() {
	            // swal("Dihapus!", "Data Telah Dihapus.", "success");
	            location.reload();
	        }
	    });
	}
</script>