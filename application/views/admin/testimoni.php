<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Data Testimonial
    		</div>
    		<div class="portlet-body">
    			<table class="table table-striped"> 
    				<thead>
    					<tr>
    						<th>#</th>
    						<th>Pengirim</th>
    						<th>Testimoni</th>
    						<th>Aksi</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $i=0; foreach ($testimoni as $data): ?>
    					<tr>
    						<td><?= ++$i ?></td>
    						<td><?= $data->id_customer ?></td>
    						<td><?= $data->testimonial ?></td>
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