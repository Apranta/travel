<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<?= form_open('admin/norek'); ?>
				<div class="form-group">
					<label for="">No rekening</label>
					<input type="hidden" name="id_norek" value="<?= isset($data->id_norek) ? $data->id_norek : '' ?>">
					<textarea name="norek" rows="8" id="norek"><?= isset($data->isi) ? $data->isi : '' ?></textarea>
				</div>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
        CKEDITOR.replace( 'norek' );
</script>