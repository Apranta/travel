<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Jenis Paket
    		</div>
    		<div class="portlet-body">
                <?=form_open_multipart('admin/tambah_jenis_paket');  ?>
    			<div class="row">
                    <div class="col-md-6">
                        <input type="hidden" value="<?= $id_produk ?>" name="id_produk">
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga Paket</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Deskripsi Paket</label>
                            <textarea name="deskripsi" rows="5" class="form-control" id="editor2"></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                <?= form_close(); ?>
    		</div>
    	</div>
    </div>
</div>

<script>
        CKEDITOR.replace( 'editor2' );
</script>