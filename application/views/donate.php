
        <!-- Vision & Mission -->
<div style="position: relative;">

        <div class = "col-md-12 mb-3 mt-5">

            <div class="vision-tab container card" style="box-shadow: 0 0 0 !important;">
              <div class = "row vision-body">

              <div class="col-md-12 p-3">
                <div class="shadow-lg bg-white rounded p-5">
                  <h5 class="card-title" style="font-family: Montserrat Black; font-size:35px;">Donate</h5>
                  <div class="text-justify col-md-12"><p>
The ministry of Trinity Chapel is made possible with the participation of many people like you who desire to put their strengths, abilities, and resources towards the cause of changing hearts and lives through the Gospel of Jesus Christ.
</p><br><p class="text-success bold">Sign up to receive instructions on how to give and text/email alerts for recurring donations
</p><br>
</div>
                    <form id="donate">
                    <div class = "form-row" style="text-align: left; font-size: 16px">
                    <div class="form-group col-md-6">
                        <label class="text-left">First Name</label>
                        <input type="text" class="bg-light form-control" name="first_name" id="inputName" placeholder="First Name">
                     </div>

                   <div class="form-group col-md-6">
                        <label class="text-left">Last name</label>
                        <input type="text" class="bg-light form-control" name="last_name" id="inputName" placeholder="Last Name">
                   </div>

                   <div class="form-group col-md-6">
                       <label class="text-left">Email</label>
                       <input type="text" class="bg-light form-control" name="email" id="inputName" placeholder="Email">
                    </div>

                    <div class="form-group col-md-6">
                      <label class="text-left">Phone Number</label>
                      <input type="text" class="bg-light form-control" name="phone" id="inputName" placeholder="Phone Number">
                   </div>

                  <div class="form-group col-md-6">
                       <label class="text-left">Country</label>
                       <select class="bg-light form-control" name="country" id="country">
                        <option>--Select Country--</option>
                        <?php foreach($countries as $country): ?>
                            <option id="optionVal" name="<?=$country['id']?>" value="<?=$country['name']?>"
                            <?php if($country['name']=='Nigeria') {echo 'selected';}?>><?=$country['name']?></option>
                          <?php endforeach;?>
                        </select>
                  </div>

                  <div class="form-group col-md-6">
                       <label class="text-left">State</label>
                       <select class="bg-light form-control" name="state" id="state">
                            <option value="" id="state-option">-</option>
                        </select>
                  </div>

                 <div class="form-group col-md-12">
                      <label class="text-left">Amount</label>
                      <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="Amount">₦</span>
                    </div>
                    <input type="text" name="amount" class="form-control" placeholder="amount">
                  </div>
                 </div>

                  <div class="form-group col-md-12">
                     <div class="mb-2"><b class="">Frequency</b></div>
                 <div class="form-check form-check-inline col-md-6">

                     <input type="radio" class="bg-light form-check-input ml-2" checked name="type" value="onetime">
                     <label class="form-check-label" for="onetime">One Time</label> &nbsp;&nbsp;
                      <input type="radio" class="bg-light form-control-check-input ml-4" name="type" id="type" value="monthly">&nbsp;&nbsp;
                      <label class="form-check-label" for="monthly">Monthly</label>
                  </div>
                </div>

                  <!-- <div class="form-group col-md-6">
                      <label class="text-left">Period</label>
                      <select class="bg-light form-control" name = "period">
                        <option value="weekly" selected>Weekly</option>
                        <option value="yearly">Monthly</option>
                        <option value="3months">3 Months</option>
                        <option value="6months">6months</option>
                        <option value="yearly">Yearly</option>
                      </select>
                  </div> -->


                 <div class="form-group col-md-12">

<hr/>
                    <input type="hidden" name="date" value="<?= date('d-m-Y'); ?>">
                    <input type="hidden" name="status" value="pending">



                        <button type="button" id="submit" class="btn btn-block btn-sm btn-primary">Submit <i class="fa fa-cog fa-spin loading"></i></button>
                        </form>
                 </div>
                  </div>
                </div>

            <div class=" mb-5 mt-5">
            <div class="h-100 shadow-lg bg-white rounded p-5">
              <div class="row p-3">
              <div class="col-md-12"><h5 class="card-title" style="font-family: Montserrat Black; ">OTHER GIVING OPTIONS</h5></div>
            <div class="col-md-6 text-left" style="font-size: 16px">
              <div class="p-3 bg-primary text-center"><b class="text-white">Call to give</b></div><br>
              <b class="text-primary">Phone:</b><br>
              +2347039843199<br>+2348037881693
            </div>

            <div class="col-md-6 text-left" style="font-size: 16px">
              <div class="p-3 bg-primary text-center"><b class="text-white">Email to give</b></div><br>
              <b class="text-primary">Email:</b><br>
              contact@trinitychapel.com
            </div>
            </div>
</div>
            </div>
          </div>
            </div>
</div>
</div>
</div><!-- Modal -->
<button class="btn btn-success btn-md px-3 d-none " id="contactModalSuccess" data-toggle="modal" data-target="#contactModal"></button>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body px-5 py-5 text-center">
        <h3 class="text-success"><i class="far fa-check-circle"></i> Thanks for your interest in standing by the ministry. Pls check your email, we'll send you instructions on how to give</h3>
        <br>
        <a class="btn btn-primary px-5" href="<?= base_url() ?>">Go Home <i class="fa fa-home"></i></a>
      </div>
    </div>
  </div>
</div>

<script>
   $(document).ready(function() {
      $('.loading').hide();
      $('#error').hide();
      $('#success').hide();

      // $('input:radio[name="type"]').on('change',function() {
      //   // alert('hello');
      //   if(this.checked && this.value == "monthly") {
      //     $("#next-gift").val("");
      //   } 
      //   else {
      //     $("#next-gift").val('');
      //   }
      // });


      var id = $("#country").val()
    $.ajax({
            url:'<?php echo base_url();?>app/fetchState/'+id,
            type: "GET",
            dataType: 'json',
            error: function(){
               alert('An error occured, please try again');
            },
            timeout: 6000,
            success:function(data) {
              $('#state option').remove();
              if(data !== false) {
                for (let i = 0; i < data.length; i++) {
                  $('#state').append($('<option>', {
                        value: data[i]['name'],
                        text: data[i]['name'],
                    }));

                    if(data[i]['name']==="Akwa Ibom") {
                      $('#state option[value="Akwa Ibom"]').attr('selected','selected');
                        }
                }
              }
            }
         });

      $('#country').on('change',function() {
      var id = $("#country").val()
    $.ajax({
            url:'<?php echo base_url();?>app/fetchState/'+id,
            type: "GET",
            dataType: 'json',
            error: function(){
               alert('An error occured, please try again');
            },
            timeout: 6000,
            success:function(data) {
              $('#state option').remove();
              if(data !== false) {
                for (let i = 0; i < data.length; i++) {
                  $('#state').append($('<option>', {
                        value: data[i]['name'],
                        text: data[i]['name']
                    }));
                }
              }
            }
         });
      });

      $('#submit').on('click',function() {
         $('.loading').show();
         $.ajax({
            url:'<?php echo base_url()."send/donation";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('.loading').hide();
            },
            timeout: 6000,
            data: $('#donate').serialize(),
            success:function(data) {
               $('.loading').hide();
               if(data == 'true') {
              //  alert('Event has been added successfully');
              $('#success2').html('<i class="far fa-check-circle"> Thanks for your interest in standing by the ministry. Pls check your email, we will send you instructions on how to give</i>');
              $('#contactModalSuccess').trigger('click');
              // window.location.href = window.location.href;
               } else {
                  alert(data);
               }
            }
         })
      });
   });


</script>
