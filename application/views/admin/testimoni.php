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
                            <th>Paket Perjalanan</th>
    						<th>Pengirim</th>
    						<th>Testimoni</th>
    						<th>Aksi</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $i=0; foreach ($testimoni as $data): ?>
    					<tr>
    						<td><?= ++$i ?></td>
                            <td>
                                <?php 
                                    $order = $this->Order_m->getDataJoinRow(['paket'] , ['id_paket'] , ['order_id' => $data->id_order]);
                                    echo $order->nama_paket;
                                ?>
                            </td>
    						<td><?= $data->id_customer ?></td>
    						<td><?= $data->testimonial ?></td>
    						<td>
                                <a class="btn btn-xs btn-circle btn-danger" href="<?= base_url('admin/data-testimonial?action=hapus&id='. $data->id_testimonial) ?>">Hapus</a>
    						</td>
    					</tr>
    						
    					<?php endforeach ?>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>