<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Edit Jenis Paket
    		</div>
    		<div class="portlet-body">
                <?=form_open_multipart('admin/edit_jenis_paket');  ?>
    			<div class="row">
                    <div class="col-md-6">
                        <input type="hidden" value="<?= $id_jenis?>" name="id_paket">
                        <input type="hidden" value="<?= $data->id_produk?>" name="id_produk">
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama" class="form-control" value="<?= $data->nama_paket ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga Paket</label>
                            <input type="number" name="harga" class="form-control" value="<?= $data->harga ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Deskripsi Paket</label>
                            <textarea name="deskripsi" rows="5" class="form-control" id="editor2"><?= $data->deskripsi ?></textarea>
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