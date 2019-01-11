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
    <?php 
        $this->load->view('PostFragment.php')
     ?>
