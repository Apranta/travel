<link href="<?= base_url('assets/home') ?>/css/heroic-features.css" rel="stylesheet">
<h2 class="title" style="padding-top: 30px; ">Gallery </h2>
<hr>
<div class="row text-center" >
	<?php foreach ($data as $value): 
		$image = json_decode($value->image);
	?>
	<div class="col-lg-3 col-md-6 mb-4">
		<div class="card h-100">
			<img class="card-img-top" src="<?= base_url('assets/gallery/' . $image[0] . '.jpg') ?>" onerror='this.src="http://placehold.it/500x325";'>
			<div class="card-body">
				<h4 class="card-title"><?= $value->nama ?></h4>
				<h6><small><?= $value->jenis ?></small></h6>
				<p class="card-text"><?= $value->deskripsi ?></p>
			</div>
			<div class="card-footer">
				<a href="<?= base_url('home/detail_gallery/' . $value->id_gallery) ?>" class="btn btn-primary">Detail</a>
			</div>
		</div>
	</div>
	<?php endforeach ?>
	
</div>