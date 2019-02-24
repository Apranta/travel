<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<?= form_open('admin/about'); ?>
				<div class="form-group">
					<label for="">About</label>
					<input type="hidden" name="id_about" value="<?= isset($data->id_about) ? $data->id_about : '' ?>">
					<textarea name="about" rows="8" id="about"><?= isset($data->isi) ? $data->isi : '' ?></textarea>
				</div>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
        CKEDITOR.replace( 'about' );
</script>