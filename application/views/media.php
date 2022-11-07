
        <!-- Vision & Mission -->
<div style="position: relative;">

        <div class = "col-md-12 mb-5 mt-5">

            <div class="vision-tab container card" style="box-shadow: 0 0 0 !important;">
              <div class = "row vision-body">
                <div class="col-md-10 offset-md-1">
                  <h5 class="inline mt-2" style="font-size:35px; font-family: MontserratAlt Black;">MEDIA</h5>
                  <hr/>
                <div class="row">
                  <div class="col-3">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Teachings</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Services</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Outreach Programs</a>
                      </div>
                    </div>
                    <div class="col-9">
                      <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active text-justify" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                          <div class="row">
                            <div class="col-md-12">
                               The ministry’s teachings exalt the Person and work of Jesus Christ, Upholding the Word of God as our standard for life, and fostering a lifestyle of giving.

                            </div>
                            <div class="col-md-12 mt-4 text-center">
                              <h5 class="card-title" style="font-family: Montserrat Black; ">Latest Teachings</h5>
                              <?php if(!empty($mediaTLatest)): ?>
                              <?php foreach($mediaTLatest as $res):?>

                              <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?=$res['url']?>" allowfullscreen></iframe>
                              </div>
                              <div class="my-4 text-justify" style="font-family: Montserrat; ">
                                  <b><?=$res['title']?></b>
                              </div>
                              <?php endforeach; endif;?>

                              <?php if(!empty($mediaT)): ?>
                                <hr/>
                              <h5 class="card-title" style="font-family: Montserrat Black; ">More Videos</h5>
                              <div class="row">
                                <?php foreach($mediaT as $res):?>

                                  <div class="col-md-6">
                                      <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?=$res['url']?>?rel=0" allowfullscreen></iframe>
                                      </div>
                                      <div class="mt-4 text-justify" style="font-family: Montserrat; ">
                                          <?=$res['title']?>
                                      </div>
                                  </div>
                              
                              <?php endforeach;?>
                              </div>
                              <?php endif;?>
                            </div>


                          </div>  

                        </div>
                        <div class="tab-pane fade text-justify" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            <div class="col-md-12">
                               The ministry’s teachings exalt the Person and work of Jesus Christ, Upholding the Word of God as our standard for life, and fostering a lifestyle of giving.

                            </div>
                            <div class="col-md-12 mt-4 text-center">
                              <?php if(!empty($mediaSLatest)): ?>
                              <h5 class="card-title" style="font-family: Montserrat Black; ">Latest Teachings</h5>

                              <?php foreach($mediaSLatest as $res):?>
                              <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?=$res['url']?>" allowfullscreen></iframe>
                              </div>
                              <div class="my-4 text-justify" style="font-family: Montserrat; ">
                                  <b><?=$res['title']?></b>
                              </div>
                              <?php endforeach; endif;?>

                              <?php if(!empty($mediaS)): ?>
                                <hr/>
                              <h5 class="card-title" style="font-family: Montserrat Black; ">More Videos</h5>
                              <div class="row">
                              
                              <?php foreach($mediaS as $res):?>
                              <div class="col-md-6">
                                  <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?=$res['url']?>?rel=0" allowfullscreen></iframe>
                                  </div>
                                  <div class="mt-4 text-justify" style="font-family: Montserrat; ">
                                      <?=$res['title']?>
                                  </div>
                              </div>
                              <?php endforeach; ?>
                              </div>
                              <?php endif;?>
                            </div>


                          </div> 

                        </div>
                        <div class="tab-pane fade text-justify" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="row">
                            <div class="col-md-12">
                               The ministry’s teachings exalt the Person and work of Jesus Christ, Upholding the Word of God as our standard for life, and fostering a lifestyle of giving.

                            </div>
                            <div class="col-md-12 mt-4 text-center">
                              <?php if(!empty($mediaOLatest)): ?>
                              <h5 class="card-title" style="font-family: Montserrat Black; ">Latest Teachings</h5>

                              <?php foreach($mediaOLatest as $res):?>
                              <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?=$res['url']?>" allowfullscreen></iframe>
                              </div>
                              <div class="my-4 text-justify" style="font-family: Montserrat; ">
                                  <b><?=$res['title']?></b>
                              </div>
                              <?php endforeach; endif;?>

                              <?php if(!empty($mediaO)): ?>
                                <hr/>
                              <h5 class="card-title" style="font-family: Montserrat Black; ">More Videos</h5>
                              <div class="row">
                              <?php foreach($mediaO as $res):?>
                              <div class="col-md-6">
                                  <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?=$res['url']?>?rel=0" allowfullscreen></iframe>
                                  </div>
                                  <div class="mt-4 text-justify" style="font-family: Montserrat; ">
                                      <?=$res['title']?>
                                  </div>
                              </div>
                              <?php endforeach;?>
                              </div>
                              <?php endif;?>
                            </div>


                          </div> 

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
            </div>
        </div>
</div>
