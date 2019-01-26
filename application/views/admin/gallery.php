<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Gallery
    		</div>
    		<div class="portlet-body">
    			<table class="table table-striped"> 
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
                                    <img src="<?= base_url('assets/gallery/' . $img) ?>" class="img img-thumbnail img-responsive" style="max-width: 25%;">
                            </td>
    						<td>
								<button class="btn btn-xs btn-circle btn-primary">Detail</button>
    						</td>
    					</tr>
    						
    					<?php endforeach ?>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>