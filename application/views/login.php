
        <!-- Vision & Mission -->
<div style="position: relative;">

        <div class = "col-md-12 mb-3 mt-5">

            <div class="vision-tab container card" style="box-shadow: 0 0 0 !important;">
              <div class = "row vision-body">

              <div class="col-md-6 offset-3 p-3">
                <div class="shadow-lg bg-white rounded p-5">
                  <h5 class="card-title" style="font-family: Montserrat Black; font-size:25px;">Login</h5>
                  <hr/>
                    <form id="login">
                    <div class = "form-row" style="text-align: left; font-size: 16px">

                   <div class="form-group col-md-12">
                       <label class="text-left">Email</label>
                       <input type="text" class="bg-light form-control" name="email" id="inputName" placeholder="Email">
                    </div>

                    <div class="form-group col-md-12">
                      <label class="text-left">Password</label>
                      <input type="password" class="bg-light form-control" name="password" id="inputName" placeholder="Password">
                   </div>


                 <div class="form-group col-md-12">

<hr/>
                        <button type="button" id="submit" class="btn btn-block btn-sm btn-primary">Submit <i class="fa fa-cog fa-spin loading"></i></button>
                        </form>
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
        <h3 class="text-success"><i class="far fa-check-circle"></i> Your donation has been sent successfully, You'll recieve  a response shortly</h3>
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


      $('#submit').on('click',function() {
         $('.loading').show();
         $.ajax({
            url:'<?php echo base_url()."auth/login";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('.loading').hide();
            },
            timeout: 6000,
            data: $('#login').serialize(),
            success:function(data) {
               $('.loading').hide();
               if(data=='true') {
              //  alert('Event has been added successfully');
              window.location.href = "<?= base_url('admin');?>";
               } else {
                  alert(data);
               }
            }
         })
      });
   });


</script>
