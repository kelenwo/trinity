<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<style>
   .modal { overflow-y: auto !important}
</style>
<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Contacts</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Contacts</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <!-- View contracts Start -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Country</th>
                     <th>Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(1 < 2): ?>
                  <tr>
                     <td colspan="7">
                        <h4 class="text-center">NO DATA TO DISPLAY</h4>
                     </td>
                  </tr>
                  <?php else: $i = 1;?>
                  <?php  foreach($contract as $req): ?>
                  <tr>
                     <td><?php echo $i++.'.';?>
                     <td><a href="#viewcontract-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['contract_title']; ?></a></td>
                     <td><?php echo $req['contract_number']; ?></td>
                     <td><?php echo $req['billing_amount']; ?></td>
                     <td><?php echo $req['status']; ?></td>
                     <td><?php echo date("d F Y", strtotime($req['date']));?></td>
                     <!-- delete contract -->
                  </tr>
                  <form id="del_contract-<?php echo $req['id'];?>">
                     <input type="hidden" name="id" value="<?php echo $req['id'];?>">
                     <input type="hidden" name="type" value="contract">
                  </form>
                  <!-- delete contract end -->
                  <!--edit contract modal -->
                  <div class="modal fade" id="edit_contract_<?php echo $req['id'];?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
                     <div class="modal-dialog modal-dialog-centered" style="width:700px !important;" role="document">
                        <div class="modal-content">
                           <div class="modal-header inline">
                              <div class="text-center mt-2">
                                 <span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
                                 <i class="fas fa-circle fa-stack-2x"></i>
                                 <i class="fas fa-edit fa-stack-1x fa-inverse"></i>
                                 </span> 
                                 <h3 class="inline">Edit Contract</h3>
                              </div>
                           </div>
                           <div class="modal-body">
                              <div class="row">
                                 <form name="edit_contract-<?php echo $req['id'];?>" method="post" id="edit_contract-<?php echo $req['id'];?>">
                                    <div class="form-group col-md-12">
                                       <label>Contract Title <small style="color: red">*</small></label>
                                       <input type="text" <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> name="contract_title" value="<?php echo $req['contract_title'];?>" class="form-control form-control-user" placeholder="Contract Title">
                                    </div>
                                    <div class="form-group col-md-12">
                                       <label>Contract Number <small style="color: red">*</small></label>
                                       <input type="text" name="contract_number" <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> value="<?php echo $req['contract_number'];?>" class="form-control form-control-user" placeholder="Contract Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Category <small style="color: red">*</small></label>
                                       <select <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> name="category" class="form-control">
                                          <option value="Civil Works" <?php if($req['category']=="Civil Works") {echo 'selected';}?>>Civil Works</option>
                                          <option value="Electrical Works" <?php if($req['category']=="Electrical Works") {echo 'selected';}?>>Electrical Works</option>
                                          <option value="Plumbing and fitting" <?php if($req['category']=="Plumbing and fitting") {echo 'selected';}?>>Plumbing and fitting</option>
                                          <option value="Welding" <?php if($req['category']=="Welding") {echo 'selected';}?>>Welding</option>
                                          <option value="Others" <?php if($req['category']=="others") {echo 'selected';}?>>Others</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Status <small style="color: red">*</small></label>
                                       <select <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> name="status" class="form-control">
                                          <option value="Active" <?php if($req['status']=='Active') {echo 'selected';}?>>Active</option>
                                          <option value="inactive"  <?php if($req['status']=='Inactive') {echo 'selected';}?>>Inactive</option>
                                          <option value="Completed"  <?php if($req['status']=='Completed') {echo 'selected';}?>>Completed</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Start Date <small style="color: red">*</small></label>
                                       <input type="date" <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> name="start_date" value="<?php echo $req['start_date'];?>" class="form-control form-control-user">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>End Date <small style="color: red">*</small></label>
                                       <input type="date" <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> name="end_date" value="<?php echo $req['end_date'];?>" class="form-control form-control-user">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Contract has renewal? <small style="color: red">*</small></label>
                                       <input type="checkbox" name="has_renewal" class="" value="<?php echo $req['has_renewal'];?>" style="height:1.1rem;width:1.1rem;background-color:#32b449;color:#fff">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Renewal Period</label>
                                       <input type="date" name="renewal_period" value="<?php echo $req['renewal_period'];?>" class="form-control form-control-user">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Billing Cycle <small style="color: red">*</small></label>
                                       <select <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> name="billing_cycle" class="form-control">
                                          <option value="One Time" <?php if($req['billing_cycle']=='One Time') {echo 'selected';}?>>One Time</option>
                                          <option value="Monthly" <?php if($req['billing_cycle']=='Monthly') {echo 'selected';}?>>Monthly</option>
                                          <option value="Quaterly" <?php if($req['billing_cycle']=='Quaterly') {echo 'selected';}?>>Quaterly</option>
                                          <option value="Yearly" <?php if($req['billing_cycle']=='Yearly') {echo 'selected';}?>>Yearly</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Billing Amount <small style="color: red">*</small></label>
                                       <input type="text" <?php if($req['owner']=='ePROCLOUD') {echo 'disabled';}?> name="billing_amount" value="<?php echo $req['billing_amount'];?>" class="form-control form-control-user" placeholder="Billing Amount (NGN)">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>First Billing Date <small style="color: red">*</small></label>
                                       <input type="date" name="first_billing_date" value="<?php echo $req['first_billing_date'];?>" class="form-control form-control-user">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Last Billing Date <small style="color: red">*</small></label>
                                       <input type="date" name="last_billing_date" value="<?php echo $req['last_billing_date'];?>" class="form-control form-control-user">
                                    </div>
                                    <input type="hidden"  name="id" value="<?php echo $req['id'];?>">
                                    <div class="form-group col-md-12">
                                       <label>Description</label>
                                       <input type="text" name="description" <?php echo $req['description'];?> class="form-control form-control-user" placeholder="Description">
                                    </div>
                              </div>
                              <div class="form-group col-md-12" style="color:green"><span id="msg-<?php echo $req['id'];?>"></span></div>
                              <div class="form-group col-md-12" style="color:red"><span id="msgerr-<?php echo $req['id'];?>"></span></div>
                              </form>
                              <div class="modal-footer">
                                 <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
                                 <button type="button" id="save-contract-edit-<?php echo $req['id'];?>" class="btn btn-success">SUBMIT <i id="loadingcontract-<?php echo $req['id'];?>" class="fas fa-cog fa-spin"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--  Edit contract modal end-->
                  <!-- List contract modal -->
                  <div class="modal fade" id="viewcontract-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header inline">
                              <div class="text-center mt-2">
                                 <span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
                                 <i class="fas fa-circle fa-stack-2x"></i>
                                 <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                                 </span> 
                                 <h3 class="inline">View Contract</h3>
                              </div>
                           </div>
                           <div class="modal-body">
                              <div class="form-group text-center mt-3">
                                 <a class="btn pl-5 pr-5 btn-success" href="#edit_contract_<?php echo $req['id'];?>" data-dismiss="modal" data-toggle="modal"><i class="far fa-edit"></i> Edit</a>
                                 <button class="btn pl-5 pr-5 btn-danger" type="button" id="del-contract-<?php echo $req['id'];?>"><i class="fas fa-trash"></i> Delete</button>
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
                                 <div class="card-body" style="margin: -5px!important;">
                                    <div class="row">
                                       <div class="col-sm-6 col-md-6 mt-3">
                                          <div class="text-sm text-primary ml-3 text-capitalize">
                                             <small class="text-success">Contract Title:</small>
                                             <br>
                                             <h6><?php echo $req['contract_title'];?></h6>
                                          </div>
                                          <br>
                                          <div class="ml-3">
                                             <div class="text-sm text-primary text-capitalize">
                                                <small class="text-success">Category:</small>
                                                <br>
                                                <h6><?php echo $req['category'];?></h6>
                                             </div>
                                             <br>
                                             <div class="text-sm text-primary text-capitalize">
                                                <small class="text-success">Id:</small>
                                                <br>
                                                <h6><?php echo $req['id'];?></h6>
                                             </div>
                                             <br>
                                             <div class="text-sm text-primary text-capitalize">
                                                <small class="text-success">Business Partners:</small>
                                                <br>
                                                <h6></h6>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-5 col-md-5 ml-4 mt-3">
                                          <div class="text-sm text-primary text-capitalize">
                                             <small class="text-success">Contract Status:</small>
                                             <br>
                                             <h6><?php echo $req['status'];?></h6>
                                          </div>
                                          <br>
                                          <div class="text-sm text-primary text-capitalize">
                                             <small class="text-success">Contract Number:</small>
                                             <br>
                                             <h6><?php echo $req['contract_number'];?></h6>
                                          </div>
                                          <br>
                                          <div class="text-sm text-primary text-capitalize">
                                             <small class="text-success">Contract description:</small>
                                             <br>
                                             <h6><?php echo $req['description'];?></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- General Information end -->
                              <!-- Lifecycle start-->
                              <div class="col-md-12 mt-3">
                                 <span class="fa-stack text-yellow fa-2x" style="font-size: 0.9em !important;">
                                 <i class="fas fa-circle fa-stack-2x"></i>
                                 <i class="fas fa-sync-alt fa-stack-1x fa-inverse"></i>
                                 </span> 
                                 <h5 class="inline">Lifecycle</h5>
                              </div>
                              <div class="col-sm-11 col-md-11 card  bg-light ml-4">
                                 <div class="card-body" style="margin: -5px!important;">
                                    <div class="row">
                                       <div class="col-sm-6 col-md-6">
                                          <div class="ml-3 mt-1">
                                             <div class="text-sm text-primary text-capitalize">
                                                <small class="text-success">Lifecycle (has renewal?):</small>
                                                <br>
                                                <h6><?php echo $req['has_renewal'];?></h6>
                                             </div>
                                             <br>
                                             <div class="text-sm text-primary text-capitalize">
                                                <small class="text-success">Start date:</small>
                                                <br>
                                                <h6><?php echo date("d F Y", strtotime($req['start_date']));?></h6>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-5 col-md-5 ml-4 mt-2">
                                          <div class="text-sm text-primary text-capitalize">
                                             <small class="text-success">Renewal Period:</small>
                                             <br>
                                             <h6><?php echo date("d F Y", strtotime($req['renewal_period']));?></h6>
                                          </div>
                                          <br>
                                          <div class="text-sm text-primary text-capitalize">
                                             <small class="text-success">End date:</small>
                                             <br>
                                             <h6><?php echo date("d F Y", strtotime($req['end_date']));?></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Lifecycle end -->
                              <!-- Billing start-->
                              <div class="col-md-12 mt-3">
                                 <span class="fa-stack text-danger fa-2x" style="font-size: 0.9em !important;">
                                 <i class="fas fa-circle fa-stack-2x"></i>
                                 <i class="far fa-credit-card fa-stack-1x fa-inverse"></i>
                                 </span> 
                                 <h5 class="inline">Billing & Financials</h5>
                              </div>
                              <div class="col-sm-11 col-md-11 card  bg-light ml-4">
                                 <div class="card-body" style="margin: -5px!important;">
                                    <div class="row">
                                       <div class="col-sm-6 col-md-6">
                                          <div class="ml-3 mt-1">
                                             <div class="text-sm text-primary text-capitalize">
                                                <small class="text-success">Billing Amount:</small>
                                                <br>
                                                <h6><?php echo $req['billing_amount'];?></h6>
                                             </div>
                                             <br>
                                             <div class="text-sm text-primary text-capitalize">
                                                <small class="text-success">Billing Cycle</small>
                                                <br>
                                                <h6><?php echo $req['billing_cycle'];?></h6>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-5 col-md-5 ml-4 mt-2">
                                          <div class="text-sm text-primary text-capitalize">
                                             <small class="text-success">First Billing Date:</small>
                                             <br>
                                             <h6><?php echo date("d F Y", strtotime($req['first_billing_date']));?></h6>
                                          </div>
                                          <br>
                                          <div class="text-sm text-primary text-capitalize">
                                             <small class="text-success">Last Billing date:</small>
                                             <br>
                                             <h6><?php echo date("d F Y", strtotime($req['last_billing_date']));?></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Billing end -->
                           </div>
                           <form id="del_article-<?php echo $req['id'];?>">
                              <input type="hidden" name="id" value="<?php echo $req['id'];?>">
                              <input type="hidden" name="type" value="contract">
                           </form>
                           <div class="modal-footer inline">
                              <div class="form-group text-center mt-3">
                                 <a class="btn pl-5 pr-5 btn-success" href="#edit_contract_<?php echo $req['id'];?>" data-dismiss="modal" data-toggle="modal"><i class="far fa-edit"></i> Edit</a>
                                 <button class="btn pl-5 pr-5 btn-danger" type="button" id="del-contract-<?php echo $req['id'];?>"><i class="fas fa-trash"></i> Delete</button>
                                 <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--List Contract modal End -->
                  <script>
                     $(document).ready(function() {
                     
                     //delete contract
                     $('#loadingcontract-<?php echo $req["id"];?>').hide();
                     $("#del-contract-<?php echo $req['id'];?>").click(function(){
                       if (confirm("Do you want to delete?")){
                         $.ajax({
                           url:'<?php echo base_url()."ucp/manage/delete_item";?>',
                           type: "POST",
                           data: $('#del_contract-<?php echo $req["id"];?>').serialize(),
                           success:function(data) {
                     if(data='true') {
                     window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
                     } else {
                       alert(data);
                     }
                     }
                     });
                       } {
                         return false;
                       }
                     });
                     //Save contract edit
                     $("#save-contract-edit-<?php echo $req['id'];?>").click(function() {
                     $("#loadingcontract-<?php echo $req['id'];?>").show();
                     $.ajax({
                       url:'<?php echo base_url()."contracts/update_contract";?>',
                       type: "POST",
                       data: $("#edit_contract-<?php echo $req['id'];?>").serialize(),
                       success:function(data) {
                     $("#loadingcontract-<?php echo $req['id'];?>").hide();
                       if(data="true") {
                     $("#msg-<?php echo $req['id'];?>").html('Changes has been saved');
                     $("#edit_contract-<?php echo $req['id'];?>")[0].reset();
                     window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
                       } else {
                     $('#msgerr-<?php echo $req["id"];?>').html(data);
                       }
                       }
                     });
                     });
                     
                     });
                  </script>
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
</body>
</html>