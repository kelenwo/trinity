<style>
   .modal { overflow-y: auto !important}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Events</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <button class="btn btn-success btn-md px-3" data-toggle="modal" data-target="#addEventModal"><b>Add Event <i class="fa fa-plus"></i></b></button>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <!-- View contracts Start -->
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Title</th>
                     <th>Location</th>
                     <th>Media</th>
                     <th>Status</th>
                     <th>Date</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(empty($events)): ?>
                  <tr>
                     <td colspan="8">
                        <h4 class="text-center">NO DATA TO DISPLAY</h4>
                     </td>
                  </tr>
                  <?php else: $i = 1;?>
                  <?php  foreach($events as $req): ?>
                  <tr>
                     <td><?php echo $i++.'.';?>
                     <td><a href="#" onclick='showDetails(<?= json_encode($req); ?>)'><?= $req['title']; ?></a></td>
                     <td><a href="#" onclick='showDetails(<?= json_encode($req); ?>)'><?= $req['location']; ?></a></td>
                     <td><a href="<?=$req['image']?>"><?=$req['image']?></a></td>
                     <td class="cursor-hand text-capitalize <?php if($req['status']=='active'){echo 'text-success';}?>" onclick='showDetails(<?= json_encode($req); ?>)'><?php echo $req['status']; ?></td>
                     <td><?= date("h:ia - d F Y", strtotime($req['date']));?></td>
                     <td><a class="cursor-hand" title="Edit" href="#" onclick='editItem(<?= json_encode($req); ?>)'><i class="fa fa-edit text-success"></i></a> | 
                        <a class="cursor-hand" title="Delete" onclick="deleteItem('<?= $req['id']; ?>','events')"><i class="fa fa-trash text-danger"></i></a>
                     </td>
                     <!-- delete contract -->
                  </tr>
                  <?php endforeach;
                     endif;?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<button class="btn btn-success btn-md px-3 d-none" id="showViewModal" data-toggle="modal" data-target="#viewModal"><b>Add Event <i class="fa fa-plus"></i></b></button>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-3">
         <div class="form-group text-center mt-3">
            <button class="btn pl-5 pr-5 btn-success" type="button" id="editBtn" data-dismiss="modal"><i class="far fa-edit"></i> Edit</button>
            <button class="btn pl-5 pr-5 btn-danger" type="button" id="deleteBtn" data-dismiss="modal"><i class="fas fa-trash"></i> Delete</button>
            <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
         </div>
      <!-- General Information start-->
      <div class="col-md-12">
         <span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
         <i class="fas fa-circle fa-stack-2x"></i>
         <i class="far fa-copy fa-stack-1x fa-inverse"></i>
         </span> 
         <h5 class="inline">General Information</h5>
      </div>
      <div class="col-sm-11 col-md-11 card  bg-light ml-4">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6 col-md-6 mt-3">
                  <div class="text-sm text-primary ml-3 text-capitalize">
                     <span class="text-success">Event Title:</span>
                     <br>
                     <h6 id="titleView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">location:</span>
                        <br>
                        <h6 id="locationView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Date:</span>
                        <br>
                        <h6 id="dateView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Status:</span>
                        <br>
                        <h6 id="statusView"></h6>
                  </div>
                  </div>
               </div>
               <div class="col-sm-5 col-md-5 ml-4 mt-3">
                  <div class="text-sm text-primary text-capitalize">
                     <span class="text-success">Image:</span>
                     <br>
                     <img class="img-fluid" id="view-image" src="" style="height:auto !important" />
                  </div>
                  <br>
               </div>
            </div>
         </div>
      </div>
      <!-- General Information end -->
      </div>
    </div>
  </div>
</div>

<!-- View Event Modal -->

<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <form id="event">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" id="title" name="title" class="form-control">
            </div> 

            <div class="form-group">
               <label for="location">Location</label>
               <input type="text" id="location" name="location" class="form-control">
            </div>

            <div class="form-group">
               <label for="date">Date</label>
               <input type="datetime-local" id="date" name="date" class="form-control">
            </div>

            <div class="form-group">
               <label for="d-image">Display Image (jpg,jpeg,png)</label>
               <div class="text-success" id="success"></div>
               <div class="text-danger" id="error"></div>
               
               <div class="input-group">
                  <div class="input-group-append">
                     <label for="d-image" class="btn btn-primary" type="button">
                        <i class="fas fa-upload fa-sm"></i>Upload file
                     </label>
                  </div>
                  <input type="text" name="image" class="form-control image form-control-user small" placeholder="Select Image" readonly>
               </div>
            </div>

            <div class="form-group">
               <button type="button" class="btn btn-success px-4" id="submit">Submit <i class="fa fa-cog fa-spin loading"></i></button>
            </div>
            <input type="hidden" name="status" value="active">
        </form>
        <form id="uploadImage">
         <input type="file" id="d-image" name="image" class="d-none">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit modal -->
<button class="btn btn-success btn-md px-3 d-none" id="showEditModal" data-toggle="modal" data-target="#editModal"><b>Add Event <i class="fa fa-plus"></i></b></button>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <form id="editEvent">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" id="titleEdit" name="title" class="form-control">
            </div> 

            <div class="form-group">
               <label for="location">Location</label>
               <input type="text" id="locationEdit" name="location" class="form-control">
            </div>

            <div class="form-group">
               <label for="date">Date</label>
               <input type="datetime-local" id="dateEdit" name="date" class="form-control">
            </div>

            <div class="form-group">
               <label for="d-image">Display Image (jpg,jpeg,png)</label>
               <div class="text-success" id="success"></div>
               <div class="text-danger" id="error"></div>
               
               <div class="input-group">
                  <div class="input-group-append">
                     <label for="d-image" class="btn btn-primary" type="button">
                        <i class="fas fa-upload fa-sm"></i> &nbsp;Change file
                     </label>
                  </div>
                  <input type="text" name="image" id="imageEdit" class="form-control image form-control-user small" placeholder="Select Image" readonly>
               </div>
            </div>
            <div class="form-group">
               <label for="location">Status</label><br>
               <input type="checkbox" id="statusEdit1" class="text-success form-checkbox-input"> &nbsp; Active?
            </div>

            <div class="form-group">
               <button type="button" class="btn btn-success px-4" id="submitEdit">Submit <i class="fa fa-cog fa-spin loading"></i></button>
            </div>
            <input type="hidden" name="id" id="idEdit">
            <input type="hidden" name="status" id="statusEdit">
        </form>

      </div>
    </div>
  </div>
</div>
<!-- Edit modal end -->

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
</body>
</html>
<script>
   $(document).ready(function() {
      $('.loading').hide();
      $('#error').hide();
      $('#success').hide();
      $('#d-image').on('change',function() {
         $('.loading').show();
         $('#uploadImage').submit();
      });

      // $('#editBtn').on('click',function() {
      //    $(this).trigger('click');
      // });
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
            url:'<?php echo base_url()."admin/saveEvent";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('.loading').hide();
            },
            timeout: 6000,
            data: $('#event').serialize(),
            success:function(data) {
               $('.loading').hide();
               if(data=='true') {
               alert('Event has been added successfully');
               window.location.href = '';
               } else {
                  alert(data);
               }
            }
         })
      });

      $('#statusEdit1').on('click',function() {
        if(this.checked) {
         $('#statusEdit').val('active');
        } 
        else {
         $('#statusEdit').val('inactive');
        }
      });

      $('#submitEdit').on('click',function() {
         $('.loading').show();

         $.ajax({
            url:'<?php echo base_url()."admin/updateEvent";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('.loading').hide();
            },
            timeout: 6000,
            data: $('#editEvent').serialize(),
            success:function(data) {
               $('.loading').hide();
               if(data=='true') {
               alert('Event has been updated successfully');
               window.location.href = '';
               } else {
                  alert(data);
               }
            }
         })
      });
   });

   function showDetails(value) {
      $('#editBtn').attr('onclick','editItem('+JSON.stringify(value)+')');
      $('#deleteBtn').attr('onclick','deleteItem('+value['id']+',"events")');

      $('#titleView').text(value['title']);
      $('#locationView').text(value['location']);
      $('#dateView').text(value['date']);
      $('#statusView').text(value['status']);
      $('#view-image').attr('src',"<?php echo base_url()?>uploads/images/"+value['image']);
      $('#showViewModal').trigger('click');

   }

   function editItem(value) {
      $('#titleEdit').val(value['title']);
      $('#locationEdit').val(value['location']);
      $('#dateEdit').val(value['date']);
      $('#statusEdit').val(value['status']);
      $('#imageEdit').val(value['image']);
      $('#idEdit').val(value['id']);

      if(value['status'] == 'active') {
         $('#statusEdit1').attr('checked','checked');
      }
      $('#showEditModal').trigger('click');

   }

   function deleteItem(id,type) {
        var items = [];
            items.push(id);
            items.push(type);
        if(confirm("Are you sure you want to delete this?")){
            $.ajax({
            url:'<?php echo base_url();?>admin/delete',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
            },
            data: 'items='+items,
            timeout: 6000,
            success:function(data) {
               window.location.href = '';
            }
         });
        }
        else{
            return false;
        }
    }
</script>