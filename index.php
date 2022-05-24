<?php
date_default_timezone_set('Asia/Manila');
session_start();
if (!isset($_SESSION['validated'])) {
  header('Location: login.php');
}
$nowDate = date("Y-m-d h:i:sa");


$time = date("H:i:s", strtotime($nowDate));

$meal_type = "";
if ($time >= "06:00:00" && $time < "09:00:00") {
  $meal_type = "Breakfast";
} else if ($time >= "09:00:00" && $time < "12:00:00") {
  $meal_type = "Brunch";
} else if ($time >= "12:00:00" && $time < "15:00:00") {
  $meal_type = "Lunch";
} else if ($time >= "15:00:00" && $time < "18:00:00") {
  $meal_type = "Afternoon Snack";
} else if ($time >= "18:00:00" && $time < "21:00:00") {
  $meal_type = "Dinner";
} else {
  $meal_type = "Midnight Snack";
}

$current_page = '';
$role = ($_SESSION['is_admin'] == 1) ? 'Administrator' : 'Standard User';
$is_admin = ($_SESSION['is_admin'] == 1) ? true : false;

$current_page = (empty($_GET['view'])) ? '404' : $_GET['view'];

$admin_side = ["records", "home", "usermgmt", "mealmgmt"];
$user_side = ["meal", "workout", "history"];

if ($is_admin && in_array($current_page, $user_side)) {
  $current_page = "404";
}

if (!$is_admin && in_array($current_page, $admin_side)) {
  $current_page = "404";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="mode" id="mode" content="<?php echo $meal_type; ?>" />
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
  <link href="frontend/build/css/preloader.css" rel="stylesheet">
  <link href="frontend/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">

  <link href="frontend/plugins/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
  <link href="frontend/plugins/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
  <link href="frontend/plugins/slider/animate.min.css" rel="stylesheet">
  <link href="frontend/build/css/common.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;display:none;">
            <a href="#" class="site_title"><span>MaLoFit<br><small>MacroNutrient &amp; Calories Fitness</small></span></a>
        
          </div>

          <div class="clearfix"></div>

          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="frontend/build/images/user.png" alt="usericon" class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span id="logged_username"><?php echo $_SESSION['user_fullname']; ?></span>
              <h2 id="logged_role"><?php echo $role; ?></h2>
            </div>
          </div>
         
          <br />

      
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">


            <?php
            
            if ($is_admin) {
              echo '<div class="menu_section">';
              echo '<h3>Admin</h3>';
              echo '<ul class="nav side-menu">';

              echo '  <li ';
              if ($current_page == 'home' || $current_page == 'admin') echo 'class="current-page"';
              echo '><a href="index.php?view=home"><i class="fa fa-home"></i>Home</a>';

              echo '  </li>';

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
            } else {
              echo '<div class="menu_section">';
              echo '<h3>Health &amp; Fitness</h3>';
              echo '<ul class="nav side-menu">';

              echo '<li ';
              if ($current_page == 'meal') echo 'class="current-page"';
              echo '><a href="index.php?view=meal"><i class="fa fa-cutlery"></i> Meal</a>';

              echo '</li>';
              echo '<li ';
              if ($current_page == 'workout') echo 'class="current-page"';
              echo '><a href="index.php?view=workout"><i class="fa fa-bicycle"></i> Workout</a>';

              echo '</li>';
              echo '<li ';
              if ($current_page == 'history') echo 'class="current-page"';
              echo '><a href="index.php?view=history"><i class="fa fa-calendar"></i> History</a>';

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

      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle pb-2">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">

          </nav>
        </div>
      </div>

      <div class="right_col" role="main">
        <?php
        switch ($current_page) {
          case "home":
            include "frontend/views/admin.php";
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
            include "frontend/views/personal.php";
            break;
          default:
            include "frontend/views/404.php";
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


  <script src="frontend/plugins/jquery/dist/jquery.min.js"></script>

  <script src="frontend/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script src="frontend/plugins/fastclick/lib/fastclick.js"></script>

  <script src="frontend/plugins/nprogress/nprogress.js"></script>

  <script src="frontend/plugins/Chart.js/dist/Chart.min.js"></script>

  <script src="frontend/plugins/gauge.js/dist/gauge.min.js"></script>

  <script src="frontend/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

  <script src="frontend/plugins/iCheck/icheck.min.js"></script>

  <script src="frontend/plugins/skycons/skycons.js"></script>

  <script src="frontend/plugins/DateJS/build/date.js"></script>

 
  <script src="frontend/plugins/moment/min/moment.min.js"></script>
  <script src="frontend/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

  <script src="frontend/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
  <script src="frontend/plugins/fullcalendar/dist/fullcalendar.min.js"></script>

  <script src="frontend/plugins/datatable/datatable.js"></script>

  <script src="frontend/plugins/echarts/dist/echarts.min.js"></script>

  <script src="frontend/build/js/custom.min.js"></script>
  <script src="frontend/build/js/jquery.preloader.min.js"></script>
  <script src="frontend/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="frontend/build/js/common.js"></script>
  <script src="frontend/plugins/slider/main.js"></script>
  <script src="frontend/build/js/obfuscated.js"></script>

</body>

</html>