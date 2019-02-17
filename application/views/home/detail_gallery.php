<br><h4>Detail Gallery</h4><hr>
<div class="row" style="padding: 20px;">
    <div class="col-lg-3">
        <h4 class="my-4"><?= $data->nama ?></h4>
        <div class="list-group">
            <label class="list-group-item"><?= $data->jenis ?></label>
        </div>
        <p> <?= $data->deskripsi ?></p>
    </div>
    <!-- /.col-lg-3 -->
    <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i=0; $image = json_decode($data->image); foreach ($image as $value) : ?>
                    <?php if ($i==0): ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                    <?php else : ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                    <?php endif ?>
                <?php $i++; endforeach; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php $i=0; $image = json_decode($data->image); foreach ($image as $value) : ?>
                    <?php if ($i==0): ?>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="<?= base_url('assets/gallery/' . $value . '.jpg') ?>" alt="First slide">
                        </div>    
                    <?php else : ?>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="<?= base_url('assets/gallery/' . $value . '.jpg') ?>">
                        </div>  
                    <?php endif ?>
                <?php $i++; endforeach; ?>
                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row">
            <!-- <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="#">Item Six</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-lg-9 -->
</div>