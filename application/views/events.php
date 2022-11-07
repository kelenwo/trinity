<style>
  .strike {
  display:block;
  position:relative;
  color: #aaa !important;
}

.strike:before {
  position: absolute;
  left: 0;
  top: 50%;
  height: 1px;
  background: #aaa;
  content: "";
  width: 300%;
  margin-left: -100%;
  display: block;
  -ms-transform: rotate(-45deg); /* IE 9 */
  transform: rotate(-45deg);
}
</style>
        <!-- Vision & Mission -->
<div style="position: relative;">

        <div class = "col-md-10 offset-md-1 mb-3 mt-5">

            <div class="vision-tab container card" style="box-shadow: 0 0 0 !important;">
              <div class = "row vision-body">
                <div class="col-md-8 offset-md-2">
                  <h5 class="inline mt-2" style="font-size:35px; font-family: MontserratAlt Black;">EVENTS</h5>
                  <hr/>
                </div>

              </div>
              <div class="col-md-12 mb-3 p-3 f-montserrat">
        <?php if(empty($events)): ?>
          <div class="container card" style="box-shadow: 0 0 0 !important;">
              <div class = "row">
                <div class="col-12 text-center">
                  <h4> No Event</h3>
                </div>
              </div>
          </div>
        <?php else: ?>
        <?php foreach($events as $req) :?>
              <div class="container card" style="box-shadow: 0 0 0 !important;">
              <div class = "row">
                <div class="col-4 position-relative">
                  <div class="position-absolute top-0 end-0 bg-light mx-4 mt-2 p-2 text-center" style="overflow: hidden;">
                    <span class="<?php if(date('d-m-Y') > date('d-m-Y', strtotime($req['date']))) {echo 'strike';}?>">  
                        <?= strtoupper(date("M", strtotime($req['date'])));?>
                        <br>
                        <?= date("d", strtotime($req['date']));?>
                    </span>
                  </div>
                  <img class="img-fluid" src="<?=base_url()?>uploads/images/<?=$req['image']?>" style="height:auto !important" />
                </div>
                <div class="col-8 p-3 text-left">
                  <h3 class="card-title"><?= $req['title']?></h4>
                    <div class="">
                      <?= date("l, d F Y", strtotime($req['date']));?>
                      <br>
                      <span class="text-primary"><i class="fa fa-map-marker-alt"></i>&nbsp; <?= $req['location']?></span>

                    </div>
                  </div>
                </div>
            </div>
            <hr/>
        <?php endforeach;?>
        <?php endif;?>
              </div>
            </div>
          </div>

</div>
