<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Tambah Testimoni
    		</div>
    		<div class="portlet-body">
                <?=form_open_multipart('user/testimoni');  ?>
    			<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Testimoni</label>
                            <textarea name="testimoni" rows="5" class="form-control" id="editor1"></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                <?= form_close(); ?> <hr>
                 <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Id Order</th>
                                                <th> Testimonial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($data as $value): ?>
                                            <tr class="odd gradeX">
                                                <td><?= ++$i ?></td>
                                                <td> <?= ++$i ?> </td>
                                                <td><?= $value->testimonial ?></td>
                                            </tr>    
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
    		</div>

    	</div>
    </div>
</div>

<script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
</script>