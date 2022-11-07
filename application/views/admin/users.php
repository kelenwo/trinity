<style>
   .modal { overflow-y: auto !important}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Users</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
      <button class="btn btn-success btn-md px-3" data-toggle="modal" data-target="#addMediaModal"><b>Add Users <i class="fa fa-plus"></i></b></button>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <!-- View contracts Start -->
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Phone</th>
                     <th>Email</th>
                     <th>Rights</th>
                     <th>Status</th>
                     <th>Actions&nbsp;&nbsp;</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(empty($users)): ?>
                  <tr>
                     <td colspan="7">
                        <h4 class="text-center">NO DATA TO DISPLAY</h4>
                     </td>
                  </tr>
                  <?php else: $i = 1;?>
                  <?php  foreach($users as $req): ?>
                  <tr>
                     <td><?= $i++.'.';?>
                     <td class="cursor-hand text-capitalize" onclick='showDetails(<?= json_encode($req); ?>)'><a href="#"><?= $req['first_name'] .' '. $req['last_name']; ?></a></td>
                     <td onclick='showDetails(<?= json_encode($req); ?>)' class="text-capitalize"><?= $req['phone']; ?></td>
                     <td onclick='showDetails(<?= json_encode($req); ?>)'><?= $req['email']; ?></td>
                     <td class="text-capitalize" onclick='showDetails(<?= json_encode($req); ?>)'><?=$req['rights'];?></td>
                     <td class="cursor-hand text-capitalize <?php if($req['status']=='active'){echo 'text-success';}?>" onclick='showDetails(<?= json_encode($req); ?>)'><?php echo $req['status']; ?></td>
                     <td>
                        <a class="cursor-hand" href="#" <?php if($req['status']=='active'):?>title="Disable" onclick="doneItem(<?=$req['id'] ?>,'users','disabled')" <?php elseif($req['status']=='disabled'):?> title="Enable" onclick="doneItem(<?= $req['id'] ?>,'users','active')"<?php endif;?>><i class="far fa-check-square <?php if($req['status']=='active'){echo 'text-success';} else{echo 'text-danger';}?>"></i></a> |
                        <a class="cursor-hand" title="Edit" href="#" onclick='editItem(<?= json_encode($req); ?>)'><i class="fa fa-edit text-success"></i></a> | 
                        <a class="cursor-hand" title="Delete" onclick="deleteItem('<?= $req['id']; ?>','users')"><i class="fa fa-trash text-danger"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <form id="media">
            <div class="form-group">
               <label for="title">First Name</label>
               <input type="text" id="first_name" name="first_name" class="form-control">
            </div>

            <div class="form-group">
               <label for="title">Last Name</label>
               <input type="text" id="last_name" name="last_name" class="form-control">
            </div>  

            <div class="form-group">
               <label for="rights">Rights</label>
               <select name="rights" class="form-control">
                  <option value="admin">Administrator</option>
                  <option value="user">User</option>
               </select>
            </div>

            <div class="form-group">
               <label for="url">Email</label>
               <input type="text" id="email" name="email" class="form-control">
            </div>


            <div class="form-group">
               <label for="url">Phone Number</label>
               <input type="text" id="phone" name="phone" class="form-control">
            </div>


            <div class="form-group">
               <label for="url">Password</label>
               <input type="password" id="password" name="password" class="form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <form id="editMedia">
        <div class="form-group">
               <label for="title">First Name</label>
               <input type="text" id="firstEdit" name="first_name" class="form-control">
            </div>

            <div class="form-group">
               <label for="title">Last Name</label>
               <input type="text" id="lastEdit" name="last_name" class="form-control">
            </div>  

            <div class="form-group">
               <label for="type">Rights</label>
               <select name="rights" class="form-control">
                  <option value="admin">Administrator</option>
                  <option value="user">User</option>
               </select>
            </div>

            <div class="form-group">
               <label for="url">Email</label>
               <input type="text" id="emailEdit" name="email" class="form-control">
            </div>


            <div class="form-group">
               <label for="url">Phone Number</label>
               <input type="text" id="phoneEdit" name="phone" class="form-control">
            </div>


            <div class="form-group">
               <label for="url">Password</label><br>
               <small>Leave blank if you don't intend to change password</small><br>
               <input type="password" id="password" name="password" class="form-control">
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
               <div class="col-sm-6 col-md-6 mt-3">
                  <div class="text-sm text-primary ml-3 text-capitalize">
                     <span class="text-success">First Name:</span>
                     <br>
                     <h6 id="firstView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary">
                        <span class="text-success">Email:</span>
                        <br>
                        <h6 id="emailView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Phone Number:</span>
                        <br>
                        <h6 id="phoneView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Date:</span>
                        <br>
                        <h6 id="dateView"></h6>
                     </div>
                  </div>
               </div>

               <div class="col-sm-6 col-md-6 mt-3">
                  <div class="text-sm text-primary ml-3 text-capitalize">
                     <span class="text-success">Last Name:</span>
                     <br>
                     <h6 id="lastView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary">
                        <span class="text-success">Rights:</span>
                        <br>
                        <h6 id="rightsView"></h6>
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
            url:'<?php echo base_url()."admin/saveUser";?>',
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
               alert('User has been saved successfully');
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
         $('#statusEdit').val('disabled');
        }
      });

      $('#submitEdit').on('click',function() {
         $('.loading').show();

         $.ajax({
            url:'<?php echo base_url()."admin/updateUser";?>',
            type: "POST",
            error: function(){
               alert('An error occured, please try again');
               $('.loading').hide();
            },
            timeout: 6000,
            data: $('#editMedia').serialize(),
            success:function(data) {
               $('.loading').hide();
               if(data=true) {
               alert('User has been updated successfully');
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
      $('#deleteBtn').attr('onclick','deleteItem('+value['id']+',"users")');

      $('#firstView').text(value['first_name']);
      $('#lastView').text(value['   last_name']);
      $('#emailView').text(value['email']);
      $('#dateView').text(value['date']);
      $('#phoneView').text(value['phone']);
      $('#rightsView').text(value['rights']);
      $('#statusView').text(value['status']);
      $('#showViewModal').trigger('click');

   }

   function editItem(value) {
      $('#firstEdit').val(value['first_name']);
      $('#lastEdit').val(value['last_name']);
      $('#emailEdit').val(value['email']);
      $('#phoneEdit').val(value['phone']);
      $('#rightsEdit').val(value['rights']);
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