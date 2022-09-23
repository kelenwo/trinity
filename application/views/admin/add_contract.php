
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sell Property</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-10">
              <div class="card shadow mb-4">
                              <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">General Information</h6>
                </a>
    <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample" style="">
      <div class="card-body">
        <form id="add_contract"><div class="form-group">
          <label>Title <small style="color: red">*</small></label>
          <input type="text" name="contract_title" class="form-control form-control-user" placeholder="Title">
        </div>

        <div class="form-group">
          <label>Location <small style="color: red">*</small></label>
          <input type="text" name="loction" class="form-control form-control-user" placeholder="location">
        </div>

        <div class="form-group">
          <label>Size (in plots)<small style="color: red">*</small></label>
                    <input type="number" name="loction" step="1" class="form-control form-control-user" placeholder="location">
                </div>
                        <div class="form-group">
          <label>Price (NGN)<small style="color: red">*</small></label>
          <input type="text" name="contract_number" class="form-control form-control-user" placeholder="Price">
        </div>
                        <div class="form-group">
          <label>Description <small style="color: red">*</small></label>
          <textarea rows="3" name="contract_number" class="form-control form-control-user" placeholder="Description"></textarea>
        </div>
      
                </div>
      </div>
          </div>
            </div>

                        <div class="col-xl-12 col-lg-10">
              <div class="card shadow mb-4">
                              <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Attachement</h6>
                </a>
    <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample" style="">
      <div class="card-body">
        <form id="add_contract"><div class="form-group">
          <label>Display Image <small style="color: red">*</small></label>
          <small>(Select up to 3)</small><br>
          <small id="loading1" class="text-success"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.
          </small>
              <small id="success1"></small>

    <div class="input-group">
                        <div class="input-group-append">
                        <label for="image1" class="btn btn-primary" type="button">
                          <i class="fas fa-upload fa-sm"></i> Select Image
                        </label>
                      </div>
            <input type="text" id="doc1" class="form-control form-control-user small" placeholder="Title of document">
          <input type="hidden" value="" name="img1" class="imgs1">
                          </div><br>
                               
                               <small id="loading2" class="text-success"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.
          </small>
              <small id="success2"></small>          
                              <div class="input-group">
                                                  <div class="input-group-append">
                        <label for="image2" class="btn btn-primary" type="button">
                          <i class="fas fa-upload fa-sm"></i> Select Image
                        </label>
                      </div>
            <input type="text" id="doc2" class="form-control form-control-user small" placeholder="Title of document">
 <input type="hidden" value="" name="img2" class="imgs2">
                          </div><br>
            
                      <small id="loading3" class="text-success"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.
          </small>
              <small id="success3"></small>                  
                              <div class="input-group">
                                                  <div class="input-group-append">
                        <label for="image3" class="btn btn-primary" type="button">
                          <i class="fas fa-upload fa-sm"></i> Select Image
                        </label>
                      </div>
            <input type="text" id="doc3" class="form-control form-control-user small" placeholder="Title of document">
 <input type="hidden" value="{doc1}" name="img1" class="imgs1">
                          </div>
                          </div>
      
                </div>
      </div>
          </div>
            </div>
            </div>


        <div class="form-group col-lg-10">
          <button class="btn btn-success btn-block" type="button" id="add">SUBMIT <i id="loading" class="fas fa-cog fa-spin"></i></button>
        </div>
      </div>
      <input type="hidden" name="contract_owner" value="{name}">
      <input type="hidden" name="owner_email" value="{email}">
      <input type="hidden" name="date" value="<?php echo date("d-M-Y");?>">
</form>
<form id="upload1">
  <input type="file" id="image1" name="image1" style="display: none">
</form>
<form id="upload2">
  <input type="file" id="image2" name="image2" style="display: none">
</form>
<form id="upload3">
  <input type="file" id="image3" name="image3" style="display: none">
</form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>
  $(document).ready(function() {

  //Hide all loading icons
  $('#loading').hide();
  $('#loading1').hide();
  $('#loading2').hide();
  $('#loading3').hide();
  $('#loading4').hide();

//Submit the file upload on file select
$('#image1').on('change',function() {
  $('#loading1').show();
//  $('#doc1').val($('#image1').val());
$('#upload1').submit();
});
$('#image2').on('change',function() {
  $('#loading2').show();
$('#upload2').submit();
});
$('#image3').on('change',function() {
  $('#loading3').show();
$('#upload3').submit();
});


//Document 1
$('#upload1').submit(function(e){
  $('#loading1').show();
              e.preventDefault();
                   $.ajax({
                       url:'<?php echo base_url();?>dashboard/do_upload',
                       type:"post",
                       data:new FormData(this),
                       processData:false,
                       contentType:false,
                       cache:false,
                       async:false,
                        success: function(data){
  $('#loading1').hide();
  $('#success1').html(data);
      }
                   });
              });

  //Document 2
  $('#upload2').submit(function(e){
    $('#loading2').show();
                e.preventDefault();
                     $.ajax({
                         url:'<?php echo base_url();?>dashboard/do_upload',
                         type:"post",
                         data:new FormData(this),
                         processData:false,
                         contentType:false,
                         cache:false,
                         async:false,
                          success: function(data){
    $('#loading2').hide();
    $('#success2').html(data);
        }
                     });
                });
//Document 3
$('#upload3').submit(function(e){
  $('#loading3').show();
              e.preventDefault();
                   $.ajax({
                       url:'<?php echo base_url();?>dashboard/do_upload',
                       type:"post",
                       data:new FormData(this),
                       processData:false,
                       contentType:false,
                       cache:false,
                       async:false,
                        success: function(data){
  $('#loading3').hide();
  $('#success3').html(data);
      }
                   });
              });


  $('#add').on('click',function() {
  $('#loading').show();
  $.ajax({
    url:'<?php echo base_url()."contracts/publish_contract";?>',
    type: "POST",
    data: $('#add_contract').serialize(),
    success:function(data) {
  $('#loading').hide();
  if(data='true') {
  alert('Contract has been published successfully');
  window.location.href = "<?php echo base_url();?>contracts/list";
} else {
    alert(data);
  }
    }
  })
  });
  });
  </script>

</body>

</html>
