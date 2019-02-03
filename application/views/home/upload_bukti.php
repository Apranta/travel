<div class="row">
	<div class="col-md-12">
		<h4>Upload bukti Pembayaran Anda</h4>
		<?= $this->session->flashdata('msg') ?>
		<?= form_open_multipart('home/bukti'); ?>
		<div class="form-group">
			<label>Order Id</label>
			<input type="text" name="order_id" class="form-control">
		</div>
		<div class="form-group">
			<label>Bukti Pembayaran</label>
			<input type="file" name="foto" class="form-control">
		</div>
		<input type="submit" name="submit" value="Upload" class="btn btn-success">
		<?= form_close(); ?>
		<br>
	</div>
</div>