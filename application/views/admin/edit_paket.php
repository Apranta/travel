<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Edit Paket
    		</div>
    		<div class="portlet-body">
                <?=form_open_multipart('admin/edit_paket');  ?>
    			<div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                        <div class="form-group">
                            <img src="<?= base_url('assets/img/' . $id_produk .'.jpg') ?>" class="img img-tumbnail" width= "25%">
                            <label>Gambar Paket</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama" class="form-control" value="<?= $data->nama_produk ?>">
                        </div>
                        

                        <div class="form-group">
                            <label>Jenis Paket</label>
                            <select name="jenis" class="form-control">
                                <option value="">== silahkan pilih ==</option>
                                <?php if ($data->jenis === 'domestic'): ?>
                                    <option value="domestic" selected>Domestik</option>
                                    <option value="internasional">Internasional</option>
                                <?php else : ?>
                                    <option value="domestic" >Domestik</option>
                                    <option value="internasional" selected>Internasional</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Paket</label>
                            <textarea name="deskripsi" rows="5" class="form-control" id="editor1"><?= $data->deskripsi ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label>Jadwal Paket</label>
                            <textarea name="jadwal" rows="5" class="form-control" id="editor2"><?= $data->jadwal ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berangkat</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $data->jadwal_berangkat ?>">
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
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
</script>