<div class="row">
	<div class="col-md-6">
		<?= form_open('user/bukti'); ?>
			<div class="form-group">
				<label>No Order</label>
				<input type="text" name="id_order" class="form-control"/>
			</div>
			<div class="form-group">
				<label>Bukti Pembayaran</label>
				<input type="file" name="foto" class="form-control">
			</div>
		<input type="submit" name="submit" value="Upload" class="btn btn-success">
		<?= form_close(); ?>
	</div>
</div>