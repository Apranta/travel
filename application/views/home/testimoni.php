<br>
<h4>Testimoni Perjalanan</h4><hr>
<?php foreach ($data as $value): ?>
<div class="card card-outline-secondary my-4">
	<div class="card-header">
		<h4><?php
			$order = $this->Order_m->getDataJoinRow(['paket'] , ['id_paket'] , ['order_id' => $value->id_order]);
			echo $order->nama_paket;
		?></h4>
	</div>
	<div class="card-body">
		<?= $value->testimonial ?>
		<small class="text-muted">Posted by <?= $this->User_m->get_row(['id_user' => $value->id_customer])->nama ?> on <?= $value->date ?></small>
	</div>
</div>
<?php endforeach ?>