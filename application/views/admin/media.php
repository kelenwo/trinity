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
   <h1 class="h3 mb-2 text-gray-800">Media</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Media</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <!-- View contracts Start -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Title</th>
                     <th>Type</th>
                     <th>Url</th>
                     <th>Date</th>
                     <th>Actions</th>
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
                  <?php endforeach;
                     endif;?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
</body>
</html>