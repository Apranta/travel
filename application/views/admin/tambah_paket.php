<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Tambah Paket
    		</div>
    		<div class="portlet-body">
                <?=form_open_multipart('admin/tambah_paket');  ?>
    			<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gambar Paket</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        

                        <div class="form-group">
                            <label>Jenis Paket</label>
                            <select name="jenis" class="form-control">
                                <option value="">== silahkan pilih ==</option>
                                <option value="domestic">Domestik</option>
                                <option value="internasional">Internasional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Paket</label>
                            <textarea name="deskripsi" rows="5" class="form-control" id="editor1"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label>Jadwal Paket</label>
                            <textarea name="jadwal" rows="5" class="form-control" id="editor2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berangkat</label>
                            <input type="date" name="tanggal" class="form-control">
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