
        <!-- Vision & Mission -->
<div style="position: relative;">

        <div class = "col-md-12 mb-3 mt-5">

            <div class="vision-tab container card" style="box-shadow: 0 0 0 !important;">
              <div class = "row vision-body">
                <div class="col-md-8 offset-md-2">
                  <h5 class="inline mt-2" style="font-size:35px; font-family: MontserratAlt Black;">CONTACT US</h5>
                  <hr/>
                </div>
                <div class="col-md-4 h-100" style="min-height: 100% !important; height: 100% !important">
                <div class="h-100 shadow-lg bg-white rounded p-4">
                  <b>You can write to the Trinity Chapel:</b><br>
                <div class="card-body vision-p" style="text-align: left !important">  78 Old Ring Road
                  Off Abak Road, Uyo, Akwa Ibom State, Nigeria.<br><hr>
                  <b class="text-success">Phone:</b> +2347039843199,+2348037881693<br><hr>
                  <b class="text-success">Email:</b> contact@trinitychapel.com
                </div>
                </div>

                </div>

              <div class="col-md-8 p-3">
                <div class="shadow-lg bg-white rounded p-5">
                  <h5 class="card-title" style="font-family: Montserrat Black; ">SEND US A MESSAGE</h5>
                <form id="contactUs">
                  <div class = "form-row" style="text-align: left;">
                    <div class = "form-row">
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
                            <option id="optionVal" name="<?=$country['id']?>" value="<?=$country['name']?>"><?=$country['name']?></option>
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
                      <label class="text-left">Message</label>
                      <textarea class="form-control" rows="3" cols="3" name="message"></textarea>
                 </div>

                 <div class="form-group col-md-12">
                 <div class="form-group">
               <label for="d-image">Add a Photo (jpg,jpeg,png)</label>
               <div class="text-success" id="success"></div>
               <div class="text-danger" id="error"></div>
               
               <div class="input-group">
                  <div class="input-group-append">
                     <label for="d-image" class="btn btn-primary" type="button">
                        <i class="fas fa-upload fa-sm"></i> &nbsp;Select file 
                     </label>
                  </div>
                  <input type="text" name="image" class="form-control image form-control-user small" placeholder="Select Image" readonly>
               </div>
            </div>
                 </div>



                 <div class="form-group col-md-12">
                   <span class="text-success bold">NOTE: Your email will get added to our weekly emailing list.
                          </span>
<hr/>                    <div class="text-success" id="success2"></div>
                    <input type="hidden" name="date" value="<?= date('d-m-Y'); ?>">
                    <input type="hidden" name="status" value="pending">

                        <button type="button" id="submit" class="btn btn-block btn-sm btn-primary">Submit <i class="fa fa-cog fa-spin loading"></i></button>
                        </form>
                        <form id="uploadImage">
         <input type="file" id="d-image" name="image" class="d-none">
        </form>                 </div>
                  </div>
                </div>
            </div>
          </div>

</div>
<!-- Modal -->
<button class="btn btn-success btn-md px-3 d-none " id="contactModalSuccess" data-toggle="modal" data-target="#contactModal"></button>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body px-5 py-5 text-center">
        <h3 class="text-success"><i class="far fa-check-circle"></i> Your message has been sent successfully, You'll recieve  a response shortly</h3>
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

      $('#d-image').on('change',function() {
         $('.loading').show();
         $('#uploadImage').submit();
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

      $('#uploadImage').submit(function(e){
         e.preventDefault();
         $.ajax({
            url:'<?php echo base_url();?>admin/do_upload',
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType:'json',
            success: function(data){
               $('.loading').hide();
               
               if(data['status'] == true) {
               $('#error').hide();
               $('#success').show();

                  $('#success').html('<i class="far fa-check-circle"> Image Uploaded successfully</i>');
                  $('.image').val(data['value']);
               } else {
               $('#success').hide();
               $('#error').show();
                  $('#error').html('<i class="fa fa-info-circle"> '+data["value"]+'</i>');
               }
			

            }
         });
      });

      $('#submit').on('click',function() {
         $('.loading').show();
         $.ajax({
            url:'<?php echo base_url()."send/message";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('.loading').hide();
            },
            timeout: 6000,
            data: $('#contactUs').serialize(),
            success:function(data) {
               $('.loading').hide();
               if(data =='true') {
              //  alert('Event has been added successfully');
              $('#success2').html('<i class="far fa-check-circle"> Your message has been sent successfully, You will recieve  a response shortly</i>');
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