<?php
session_start();
if (!isset($_SESSION['validated'])) {
  header('Location: login.php');
}

$role = ($_SESSION['is_admin'] == 1) ? 'Administrator' : 'Standard User';
$is_admin = ($_SESSION['is_admin'] == 1) ? true : false;
$current_page = (empty($_GET['view'])) ? 'home' : $_GET['view'];

$current_page = (($is_admin) && ($current_page == 'home')) ? "admin" : $current_page;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="frontend/build/images/favicon.png" type="image/png" />

  <title>MaLoFit | <?php echo $_SESSION['user_fullname']; ?></title>

  <!-- Bootstrap -->
  <link href="frontend/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="frontend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="frontend/plugins/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="frontend/plugins/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="frontend/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="frontend/plugins/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="frontend/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <link href="frontend/plugins/datatable/datatable.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="frontend/build/css/custom.min.css" rel="stylesheet">
  <link href="frontend/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">

  <link href="frontend/plugins/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
  <link href="frontend/plugins/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

  <style>
    .site_title {
      line-height: 0px !important;
      height: 25px !important;
      margin-top: 25px;
      overflow: visible !important;
    }

    .site_title2 {
      line-height: 15px !important;
      height: 25px !important;
      margin-top: 5px;
      word-wrap: break-word;
      white-space: initial;
      font-weight: 200;
      font-size: 14px;
      width: 100%;
      color: #ecf0f1 !important;
      margin-left: 0 !important;
      line-height: 59px;
      display: block;

      margin: 0;
      padding-left: 10px;
    }

    td,
    th {

      vertical-align: middle !important;
    }
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <p class="site_title"><span>MaLoFit</span></p>
            <p class="site_title2">MacroNutrient &amp; Calories Fitness</p>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="frontend/build/images/user.png" alt="usericon" class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span id="logged_username"><?php echo $_SESSION['user_fullname']; ?></span>
              <h2 id="logged_role"><?php echo $role; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Health &amp; Fitness</h3>
              <ul class="nav side-menu">
                <li <?php if ($current_page == 'home' || $current_page == 'admin') echo 'class="current-page"'; ?>><a href="index.php?view=home"><i class="fa fa-home"></i> Home</a>

                </li>
                <li <?php if ($current_page == 'meal') echo 'class="current-page"'; ?>><a href="index.php?view=meal"><i class="fa fa-cutlery"></i> Meal</a>

                </li>
                <li <?php if ($current_page == 'workout') echo 'class="current-page"'; ?>><a href="index.php?view=workout"><i class="fa fa-bicycle"></i> Workout</a>

                </li>
                <li <?php if ($current_page == 'history') echo 'class="current-page"'; ?>><a href="index.php?view=history"><i class="fa fa-calendar"></i> History</a>

                </li>

              </ul>
            </div>
            <?php
            if ($is_admin) {
              echo '<div class="menu_section">';
              echo '<h3>Admin</h3>';
              echo '<ul class="nav side-menu">';

              echo '  <li ';
              if ($current_page == 'mealmgmt') echo 'class="current-page"';
              echo '><a href="index.php?view=mealmgmt"><i class="fa fa-cutlery"></i>Meal Management</a>';

              echo '  </li>';

              echo '  <li ';
              if ($current_page == 'usermgmt') echo 'class="current-page"';
              echo '><a href="index.php?view=usermgmt"><i class="fa fa-users"></i>User Management</a>';

              echo '  </li>';
              echo '  <li ';
              if ($current_page == 'records') echo 'class="current-page"';
              echo '><a href="index.php?view=records"><i class="fa fa-book"></i>Records</a>';

              echo '  </li>';
              echo '</ul>';
              echo '</div>';
            }

            ?>

            <div class="menu_section">
              <h3>Account</h3>
              <ul class="nav side-menu">

                <li <?php if ($current_page == 'profile') echo 'class="current-page"'; ?>><a href="index.php?view=profile"><i class="fa fa-user"></i>Personal Information</a>

                </li>
                <li><a href="logout.php"><i class="fa fa-arrow-circle-left"></i>Logout</a></li>
              </ul>
            </div>

          </div>

        </div>
      </div>



      <div class="right_col" role="main">
        <?php
        switch ($current_page) {
          case "home":
            include "frontend/views/home.php";
            break;
          case "admin":
            include "frontend/views/admin.php";
            break;
          case "meal":
            include "frontend/views/meal.php";
            break;
          case "workout":
            include "frontend/views/workout.php";
            break;
          case "history":
            include "frontend/views/history.php";
            break;
          case "mealmgmt":
            include "frontend/views/mealmgmt.php";
            break;
          case "usermgmt":
            include "frontend/views/usermgmt.php";
            break;
          case "records":
            include "frontend/views/records.php";
            break;
          case "profile":
            include "frontend/views/profile.php";
            break;
        }

        ?>

      </div>

      <footer>
        <div class="pull-right">
          MaLoFit . Regional Science High School III S.Y 2021-2022
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="frontend/plugins/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="frontend/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="frontend/plugins/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="frontend/plugins/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="frontend/plugins/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="frontend/plugins/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="frontend/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="frontend/plugins/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="frontend/plugins/skycons/skycons.js"></script>

  <script src="frontend/plugins/DateJS/build/date.js"></script>

  <!-- bootstrap-daterangepicker -->
  <script src="frontend/plugins/moment/min/moment.min.js"></script>
  <script src="frontend/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

  <script src="frontend/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
  <script src="frontend/plugins/fullcalendar/dist/fullcalendar.min.js"></script>

  <script src="frontend/plugins/datatable/datatable.js"></script>

  <!-- <script src="frontend/plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script> -->

  <!-- Custom Theme Scripts -->
  <script src="frontend/build/js/custom.min.js"></script>
  <script src="frontend/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- <script src="frontend/build/js/common.js"></script> -->

  <script>
    $(function() {
      let me = getUrlVars()['view'];

      if (me == "meal") {
        $('#tblMeals').DataTable({
          "paging": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,
          "responsive": true
        });
      } else if (me == "mealmgmt") {
        $("#meal_picture").on("change", function() {
          $(".custom-file-label").html("Image Selected");
        });
      }
    });
    var loadFile = function(event) {
      var output = document.getElementById('imgPicture');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) 
      }
    };

    function getUrlVars() {
      let vars = [],
        hash;
      let hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for (let i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1]
      }
      return vars
    }
  </script>
</body>

</html>