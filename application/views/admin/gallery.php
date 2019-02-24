<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <h3>Tambah Data Gallery</h3>
            </div>
            <div class="portlet-body">
                <?= form_open_multipart('admin/data-gallery'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto <small>*bisa pilih banyak foto</small></label>
                                <input type="file" name="foto[]" multiple class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Foto</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jenis Perjalanan</label>
                                <select name="jenis" class="form-control">
                                    <option value="">---</option>
                                    <option value="domestic">Domestic</option>
                                    <option value="internasional">Internasional</option>
                                </select>
                            </div>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-circle btn-success">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deskripsi Foto</label>
                                <textarea name="deskripsi" class="form-control" rows="5" id="editor2"></textarea>
                            </div>
                        </div>
                    </div>

                <?= form_close(); ?>
            </div>
        </div>
    	<div class="portlet light">
    		<div class="portlet-body">
    			<table class="table table-striped table-responsive"> 
    				<thead>
    					<tr>
    						<th>#</th>
    						<th>Nama</th>
    						<th>Jenis</th>
                            <th>Foto</th>
    						<th>Aksi</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $i=0; foreach ($gallery as $data): ?>
    					<tr>
    						<td><?= ++$i ?></td>
    						<td><?= $data->nama ?></td>
    						<td><?= $data->jenis ?></td>
                            <td>
                                <?php $image = json_decode($data->image); 
                                    foreach ($image as $img) : ?>
                                    <img src="<?= base_url('assets/gallery/' . $img . '.jpg') ?>" class="img img-thumbnail img-responsive" style="max-width: 25%;">
                                <?php endforeach; ?>
                            </td>
    						<td>
								<a class="btn btn-xs btn-circle btn-danger" href="<?= base_url('admin/data-gallery?action=hapus&id='. $data->id_gallery) ?>">Hapus</a>
                                <a class="btn btn-xs btn-circle btn-primary" href="<?= base_url('admin/edit-gallery/'. $data->id_gallery) ?>">Edit</a>
    						</td>
    					</tr>
    						
    					<?php endforeach ?>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>

<script>
        CKEDITOR.replace( 'editor2' );
</script>