<style>
   .modal { overflow-y: auto !important}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Media</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
      <button class="btn btn-success btn-md px-3" data-toggle="modal" data-target="#addMediaModal"><b>Add Media <i class="fa fa-plus"></i></b></button>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <!-- View contracts Start -->
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Title</th>
                     <th>Type</th>
                     <th>Url</th>
                     <th>Status</th>
                     <th>Date</th>
                     <th>Actions&nbsp;&nbsp;</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(empty($media)): ?>
                  <tr>
                     <td colspan="7">
                        <h4 class="text-center">NO DATA TO DISPLAY</h4>
                     </td>
                  </tr>
                  <?php else: $i = 1;?>
                  <?php  foreach($media as $req): ?>
                  <tr>
                     <td><?= $i++.'.';?>
                     <td><a href="#" onclick='showDetails(<?= json_encode($req); ?>)'><?= $req['title']; ?></a></td>
                     <td class="text-capitalize"><?= $req['type']; ?></td>
                     <td><a href="<?= $req['url']; ?>" target="_blank"><?= $req['url']; ?></td>
                     <td class="cursor-hand text-capitalize <?php if($req['status']=='active'){echo 'text-success';}?>" onclick='showDetails(<?= json_encode($req); ?>)'><?php echo $req['status']; ?></td>
                     <td ><?= date("d F Y", strtotime($req['date']));?></td>
                     <td>
                        <a class="cursor-hand" href="#" <?php if($req['status']=='active'):?>title="Mark Inactive" onclick="doneItem(<?=$req['id'] ?>,'media','inactive')" <?php elseif($req['status']=='inactive'):?> title="Mark active" onclick="doneItem(<?= $req['id'] ?>,'media','active')"<?php endif;?>><i class="far fa-check-square <?php if($req['status']=='active'){echo 'text-success';} else{echo 'text-danger';}?>"></i></a> |
                        <a class="cursor-hand" title="Edit" href="#" onclick='editItem(<?= json_encode($req); ?>)'><i class="fa fa-edit text-success"></i></a> | 
                        <a class="cursor-hand" title="Delete" onclick="deleteItem('<?= $req['id']; ?>','media')"><i class="fa fa-trash text-danger"></i></a>
                     </td>
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
<div class="modal fade" id="addMediaModal" tabindex="-1" role="dialog" aria-labelledby="addMediaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <form id="media">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" id="title" name="title" class="form-control">
            </div> 

            <div class="form-group">
               <label for="type">Type</label>
               <select name="type" class="form-control">
                  <option value="teaching">Teaching</option>
                  <option value="service">Service</option>
                  <option value="outreach">Outreach</option>
               </select>
            </div>

            <div class="form-group">
               <label for="url">Url</label>
               <input type="text" id="url" name="url" class="form-control">
            </div>

            <div class="form-group">
               <label for="date">Date</label>
               <input type="datetime-local" id="date" name="date" class="form-control">
            </div>


            <div class="form-group">
               <button type="button" class="btn btn-success px-4" id="submit">Submit <i class="fa fa-cog fa-spin loading"></i></button>
            </div>
            <input type="hidden" name="status" value="active">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<button class="btn btn-success btn-md px-3 d-none" id="showEditModal" data-toggle="modal" data-target="#editModal"><b>Add Event <i class="fa fa-plus"></i></b></button>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <form id="editMedia">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" id="titleEdit" name="title" class="form-control">
            </div> 

            <div class="form-group">
               <label for="type">Type</label>
               <select name="type" class="form-control">
                  <option value="teaching">Teaching</option>
                  <option value="service">Service</option>
                  <option value="outreach">Outreach</option>
               </select>
            </div>

            <div class="form-group">
               <label for="url">Url</label>
               <input type="text" id="urlEdit" name="url" class="form-control">
            </div>

            <div class="form-group">
               <label for="date">Date</label>
               <input type="datetime-local" id="dateEdit" name="date" class="form-control">
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
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
</body>
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
               <div class="col-sm-12 col-md-12 mt-3">
                  <div class="text-sm text-primary ml-3 text-capitalize">
                     <span class="text-success">Title:</span>
                     <br>
                     <h6 id="titleView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary">
                        <span class="text-success">Url:</span>
                        <br>
                        <h6 id="urlView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Type:</span>
                        <br>
                        <h6 id="typeView"></h6>
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
            </div>
         </div>
      </div>
      <div class="form-group text-center mt-3">
            <button class="btn pl-5 pr-5 btn-success" type="button" id="editBtn" data-dismiss="modal"><i class="far fa-edit"></i> Edit</button>
            <button class="btn pl-5 pr-5 btn-danger" type="button" id="deleteBtn" data-dismiss="modal"><i class="fas fa-trash"></i> Delete</button>
            <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
         </div>
      <!-- General Information end -->
      </div>
    </div>
  </div>
</div>

<script>
   $(document).ready(function() {
      $('.loading').hide();

      $('#submit').on('click',function() {
         $('.loading').show();
         $.ajax({
            url:'<?php echo base_url()."admin/saveMedia";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('#loading').hide();
            },
            timeout: 6000,
            data: $('#media').serialize(),
            success:function(data) {
               $('.loading').hide();
               if(data='true') {
               alert('Media has been saved successfully');
               window.location.href = window.location.href;
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
            url:'<?php echo base_url()."admin/updateMedia";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('.loading').hide();
            },
            timeout: 6000,
            data: $('#editMedia').serialize(),
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
      $('#deleteBtn').attr('onclick','deleteItem('+value['id']+',"media")');

      $('#titleView').text(value['title']);
      $('#urlView').text(value['url']);
      $('#dateView').text(value['date']);
      $('#typeView').text(value['type']);
      $('#statusView').text(value['status']);
      $('#showViewModal').trigger('click');

   }

   function editItem(value) {
      $('#titleEdit').val(value['title']);
      $('#urlEdit').val(value['url']);
      $('#typeEdit').val(value['type']);
      $('#statusEdit').val(value['status']);
      $('#dateEdit').val(value['date']);
      $('#idEdit').val(value['id']);

      if(value['status'] == 'active') {
         $('#statusEdit1').attr('checked','checked');
      }
      $('#showEditModal').trigger('click');

   }
   
   function doneItem(id,type,status) {
        var items = [];
            items.push(id);
            items.push(type);
            items.push(status);
            $.ajax({
            url:'<?php echo base_url();?>admin/done',
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
</html>