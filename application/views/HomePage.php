<section class="slice slice-lg" data-delimiter="1">
 <div class="px-4">
            <div class="row justify-content-center cols-xs-space cols-sm-space cols-md-space">
              <div class="col-lg-7">
                <div class="text-center">
                 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner role="listbox" style=" width:100%; height: 300px !important;">
                         <div class="carousel-item active">
                              <img class="d-block w-100" style="height: 300px" src="<?= base_url('assets/images/backgrounds/Bali.jpg')?>" alt="First slide">
                              <div class="carousel-caption d-none d-md-block">  
                                  <h5 class="text-white" >Lihat apa yang tejadi</h5>
                                  <p>sangat mengejutkan</p>
                            </div>
                        </div>
                      <div class="carousel-item">
                          <img class="d-block w-100" style="height: 300px" src="<?= base_url('assets/images/backgrounds/Bali2.jpg')?>" alt="Second slide">
                          <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white">Lihat apa yang tejadi</h5>
                            <p>sangat mengejutkan</p>
                          </div>
                      </div>  
                </div>
            </div>
          </div>
      </div>
    </div>
</div>
</section>
   <section class="slice slice-lg" style="padding:20px">
    <div style="display:flex; align-items:center">
        <h2 style="color:var(--black); flex:1">Domestik</h2>
        <a class="btn btn-sm btn-primary" href="<?=base_url() .'search'?>">Selengkapnya >></a>
    </div>
    <div style="display:flex; flex-wrap:wrap">
    <?php foreach($domestik as $p) { ?> 
       <div id="p_" class="postItem">

 <div style="background-image:url('<?=base_url() . 'assets/images/' . $p->nama_produk .'.jpg'?>')" class="coverImg"></div> 
    <a href="">
      <h5 class="postItemTitle"><?=$p->nama_produk?></h5>
    </a>
    <div style="display:flex;">
      <p style="margin-left:8px;"><?= $this->Paket_m->get_row(['id_produk' => $p->id_produk])->harga?></p>
    </div>
    <p class="postItemSummary">
      <i><?=$this->Paket_m->get_row(['id_produk', $p->id_produk])->deskripsi?></i>
    </p>
  </div>
</div>
    <?php } ?>
    </div>
 <!-- <div style="display:flex; align-items:center; margin-top:16px">
        <h2 style="color:var(--black); flex:1">Intenasional</h2>
        <a class="btn btn-sm btn-primary" href="<?=base_url() .'search?popular=true'?>">Selengkapnya >></a>
    </div>    
    <div style="display:flex; flex-wrap:wrap">
    <?php foreach($internasional as $p) { ?> 
        <?=$this->load->view('PostFragment.php', array('p' => $p), TRUE);?>
    <?php } ?>
    </div> -->
</section>