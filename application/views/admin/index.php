
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

          <!-- Content Row -->
          <div class="row">
            <!--  -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-secondary fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-sm font-weight-bold text-secondary text-uppercase mb-1">Pending Prayer Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $prayer_requests ?></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-info fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Pending Contacts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $contacts ?></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-success fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Pending One-off Donations</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $oneoff_donations ?></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-warning fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Pending recurring Donations</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $recurring_donations ?></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!--  -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upcoming Events</h6>
                </div>
                <!-- Card Body -->
                <?php if(empty($events)): ?>
                  <div class="card-body">
                  <h5 class="m-0 ml-3 text-primary text-sm">
                   No Upcoming Event
                  </h5>
                </div>
                <?php else: ?>
                <?php foreach($events as $req): ?>
                <div class="card-body">
                  <h5 class="m-0 ml-3 text-success text-sm">
                    <?= $req['title'] ?>
                  </h5>
                  <span class="m-0 ml-3 text-primary text-sm">
                  <?php echo date("h:ia - d F Y", strtotime($req['date']));?>
                  </span>
                </div>
                <?php endforeach; endif;?>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Approved", "Pending"],
    datasets: [{
      data: [<?php echo $contracts_approved_count;?>, <?php echo $contracts_pending_count;?>,],
      backgroundColor: ['#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>
</body>

</html>
