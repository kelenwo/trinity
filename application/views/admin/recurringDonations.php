<style>
   .modal { overflow-y: auto !important}
</style>
<!-- Page level custom scripts -->
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Monthly Donations</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
      <a class="btn btn-success btn-md px-3" href="<?=base_url()?>donate" target="_blank"><b>Add Donation <i class="fa fa-plus"></i></b></a>
      </div>
         <div class="table-responsive">
            <!-- View contracts Start -->
            <div class="card-body">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Country</th>
                     <th>Amount</th>
                     <th>Date</th>
                     <th>Status</th>
                     <th>Actions</th>

                  </tr>
               </thead>
               <tbody>
                  <?php if(empty($donors)): ?>
                  <tr>
                     <td colspan="8">
                        <h4 class="text-center">NO DATA TO DISPLAY</h4>
                     </td>
                  </tr>
                  <?php else: $i = 1;?>
                  <?php  foreach($donors as $req): ?>
                  <tr>
                     <td><?php echo $i++.'.';?>
                     <td class="cursor-hand text-capitalize" onclick='showDetails(<?= json_encode($req); ?>)'><?php echo $req['first_name'] .' '. $req['last_name']; ?></td>
                     <td class="cursor-hand" onclick='showDetails(<?= json_encode($req); ?>)'><?php echo $req['email']; ?></td>
                     <td class="cursor-hand" onclick='showDetails(<?= json_encode($req); ?>)'><?php echo $req['country']; ?></td>
                     <td class="cursor-hand" onclick='showDetails(<?= json_encode($req); ?>)' ><?php echo $req['amount'];?></td>
                     <td class="cursor-hand" onclick='showDetails(<?= json_encode($req); ?>)' ><?php echo date("d F Y", strtotime($req['date']));?></td>
                     <td class="cursor-hand text-capitalize" onclick='showDetails(<?= json_encode($req); ?>)'><?php echo $req['status']; ?></td>

                     <td>
                        <!-- <a class="cursor-hand" href="#" <?php if($req['status']=='active'):?>title="Mark Inactive" onclick="doneItem(<?=$req['id'] ?>,'donors','inactive')" <?php elseif($req['status']=='inactive' || $req['status']=='pending'):?> title="Mark active" onclick="doneItem(<?= $req['id'] ?>,'donors','active')"<?php endif;?>><i class="far fa-check-square <?php if($req['status']=='active'){echo 'text-success';} else{echo 'text-danger';}?>"></i></a> | -->

                        <a class="cursor-hand" title="Delete" onclick="deleteItem('<?= $req['id']; ?>','donors')"><i class="fa fa-trash text-danger"></i></a>

                     </td>
                     <!-- delete contract -->
                  </tr>
                  <!-- delete contract end -->
                  <?php endforeach;
                     endif;?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
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
</body><!-- Modal -->
<button class="btn btn-success btn-md px-3 d-none" id="showViewModal" data-toggle="modal" data-target="#viewModal"><b>Add Event <i class="fa fa-plus"></i></b></button>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prayer Request</h5>
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
                     <h6 id="firstnameView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary">
                        <span class="text-success">Email Address:</span>
                        <br>
                        <h6 id="emailView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Country:</span>
                        <br>
                        <h6 id="countryView"></h6>
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
                     <h6 id="lastnameView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary">
                        <span class="text-success">Phone Number:</span>
                        <br>
                        <h6 id="phoneView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">State:</span>
                        <br>
                        <h6 id="stateView"></h6>
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

            <!-- Donation Information start-->
            <div class="col-md-12 mt-2">
         <span class="fa-stack text-warning fa-2x" style="font-size: 0.9em !important;">
         <i class="fas fa-circle fa-stack-2x"></i>
         <i class="far fa-money-bill-alt fa-stack-1x fa-inverse"></i>
         </span> 
         <h5 class="inline">Donation Information</h5>
      </div>
      <div class="col-sm-11 col-md-11 card  bg-light ml-4">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6 col-md-6 mt-3">
                  <div class="text-sm text-primary ml-3 text-capitalize">
                     <span class="text-success">Amount:</span>
                     <br>
                     <h6 id="amountView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Next Gift:</span>
                        <br>
                        <h6 id="nextGiftView"></h6>
                     </div>                     
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Date Cancelled:</span>
                        <br>
                        <h6 id="dateCancelledView"></h6>
                     </div>
                  </div>
               </div>

               <div class="col-sm-6 col-md-6 mt-3">
                  <div class="text-sm text-primary ml-3 text-capitalize">
                     <span class="text-success">Date Paid:</span>
                     <br>
                     <h6 id="datePaidView"></h6>
                  </div>
                  <div class="ml-3">
                     <div class="text-sm text-primary">
                        <span class="text-success">Rounds:</span>
                        <br>
                        <h6 id="roundsView"></h6>
                     </div>
                     <div class="text-sm text-primary text-capitalize">
                        <span class="text-success">Type:</span>
                        <br>
                        <h6 id="typeView"></h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="form-group text-center mt-3" id="bttn">
            <button class="btn px-3" id="paidBtn"> Mark Paid</button>
            <button class="btn px-3 btn-success" id="doneBtn">&nbsp;<span id="cancelB"> Cancel</span></button>
            <button class="btn px-3 btn-danger" type="button" id="deleteBtn"><i class="fas fa-trash"></i> Delete</button>
            <button class="btn px-3 btn-info cl" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
         </div>
      <!-- General Information end -->
      </div>
    </div>
  </div>
</div>
<script>

function showDetails(value) {

   $('#deleteBtn').attr('onclick','deleteItem('+value['id']+',"media")');

   if(value['status']=='cancelled') {
      $('#paidBtn').addClass('btn-success');
      $('#paidBtn').attr('disabled','disabled');
      $('#cancelB').text('Resume giving')
      $('#doneBtn').attr('onclick','doneItem('+value['id']+',"donors","pending")');


   }
   else if(value['status']=='pending') {
      $('#paidBtn').addClass('btn-warning');
      $('#doneBtn').attr('onclick','doneItem('+value['id']+',"donors","cancelled")');
      $('#paidBtn').attr('onclick','doneItem('+value['id']+',"donors","paid")');

   }
   else if(value['status']=='paid') {
      $('#paidBtn').attr('disabled','disabled');
      $('#paidBtn').addClass('btn-success');
      $('#doneBtn').attr('onclick','doneItem('+value['id']+',"donors","cancelled")');
   } else {
      $('#paidBtn').addClass('btn-warning');
   }
      $('#titleView').text(value['title']);
      $('#amountView').text(value['amount']);
      $('#dateView').text(value['date']);
      $('#emailView').text(value['email']);
      $('#statusView').text(value['status']);
      $('#firstnameView').text(value['first_name']);
      $('#lastnameView').text(value['last_name']);
      $('#phoneView').text(value['phone']);
      $('#countryView').text(value['country']);
      $('#stateView').text(value['state']);
      $('#nextGiftView').text(value['next_gift']);
      $('#dateCancelledView').text(value['date_cancelled']);
      $('#datePaidView').text(value['date_paid']);
      $('#typeView').text(value['type']);
      $('#roundsView').text(value['rounds']);
      $('#showViewModal').trigger('click');

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