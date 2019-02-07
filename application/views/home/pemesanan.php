
<div class="row">
	 <div class="col-md-12">
	 	<div class="panel panel-primary">
	 		<div class="panel-heading">
	 			<h4>Pemesanan Paket</h4>
	 		</div>
	 		<div class="panel-body">
	 			<?= form_open('home/pesan',['class' => 'form-horizontal']); ?>
	 			<input type="hidden" name="id_paket" value="<?= $data->id_paket ?>">
				<div class="form-group">
					<label class="control-label col-sm-2">Nama Perjalanan</label>
					<div class="col-sm-10">
						<input type="text" name="nama_produk" value="<?= $data->nama_produk ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Nama Paket</label>
					<div class="col-sm-10">
						<input type="text" name="nama_paket" value="<?= $data->nama_paket ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Jenis Perjalanan</label>
					<div class="col-sm-10">
						<input type="text" name="jenis_paket" value="<?= $data->jenis ?>" class="form-control" readonly>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label class="control-label col-sm-2">Jumlah Pemesanan</label>
					<div class="col-sm-10">
						<input type="number" name="jumlah" class="form-control" id="jumlah">
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label class="control-label col-sm-2">Tanggal keberangkatan</label>
					<div class="col-sm-10">
						<input type="date" name="date" class="form-control" id="date">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Total Pembayaran</label>
					<div class="col-sm-10">
						<input type="number" name="total" class="form-control" readonly id="total">
					</div>
				</div>
				<input type="submit" name="submit" value="Pesan" class="btn btn-success">
				<?= form_close(); ?>
				<br>
	 		</div>
	 	</div>
	 </div>
</div>
<script>
	$('#jumlah').change(function(){
		var jumlah = $('#jumlah').val();
		let harga = <?= $data->harga ?>;
		$('#total').val(jumlah*harga); 
	});
</script>