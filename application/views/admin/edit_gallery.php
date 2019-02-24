<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <h3>Tambah Data Gallery</h3>
            </div>
            <div class="portlet-body">
                <?= form_open_multipart('admin/edit-gallery'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id_gallery" value="<?= $id_gallery ?>">
                            <div class="form-group">
                                <?php $image = json_decode($data->image); 
                                    foreach ($image as $img) : ?>
                                    <img src="<?= base_url('assets/gallery/' . $img . '.jpg') ?>" class="img img-thumbnail img-responsive" style="max-width: 25%;">
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label>Foto <small>*bisa pilih banyak foto</small></label>
                                <input type="file" name="foto[]" multiple class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Foto</label>
                                <input type="text" name="nama" class="form-control" value="<?= $data->nama ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Perjalanan</label>
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
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-circle btn-success">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deskripsi Foto</label>
                                <textarea name="deskripsi" class="form-control" rows="5" id="editor2"><?= $data->deskripsi ?></textarea>
                            </div>
                        </div>
                    </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
        CKEDITOR.replace( 'editor2' );
</script>