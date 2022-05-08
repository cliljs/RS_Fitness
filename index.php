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


$role = ($_SESSION['is_admin'] == 1) ? 'Administrator' : 'Standard User';
$is_admin = ($_SESSION['is_admin'] == 1) ? true : false;
$current_page = (empty($_GET['view'])) ? 'home' : $_GET['view'];

$current_page = (($is_admin) && ($current_page == 'home')) ? "admin" : $current_page;
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
  <link href="frontend/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">

  <link href="frontend/plugins/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
  <link href="frontend/plugins/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
  <link href="frontend/plugins/slider/animate.min.css" rel="stylesheet">
  <style>
    .product-info {
      padding: 15px !important;

    }

    .product-block {

      border: 1px #2095a5a6 solid !important;
    }

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
  <script src="frontend/build/js/common.js"></script>
  <script src="frontend/plugins/slider/main.js"></script>

  <script>
    let dtUserMgmt = null,
      dtMeal = null,
      dtMealMgmt = null;
    $(function() {
      let me = getUrlVars()['view'];

      if (me == "meal") {
        loadMealList($("meta[name=mode]").attr("content"));


        
      } else if (me == "mealmgmt") {
        loadAllMeals();
        let ingredients_arr = [];
        $("#meal_picture").on("change", function() {
          $(".custom-file-label").html("Image Selected");
        });
        $('#btnAddIngredients').on('click', function() {
          let ingName = $('#ingredient_name').val();
          let ingCal = $('#calorie').val();

          $('#tblIngredientsBody').append('<tr><td>' + ingName + '</td><td>' + ingCal + '</td><td><button class = "btnRemoveIngredient btn btn-danger btn-sm">Remove</button></td></tr>');
          $('#ingredient_name').val('');
          $('#calorie').val('');
          ingredients_arr.push({
            name: ingName,
            calories: ingCal
          });
        });
        $('body').on('click', '.btnRemoveIngredient', function() {

          let row = $(this).closest('tr');
          let tditem = $(this)
            .closest('tr')
            .children('td')
            .html();
          ingredients_arr.splice(ingredients_arr.findIndex(el => el.vip == tditem), 1);
          row.remove();
        });
        $('body').on('click', '.btnMealMgmtDelete', function() {
          let dataID = $(this).attr('data-id');
          let thisButton = $(this);
          Swal.fire({
            allowOutsideClick: false,
            title: 'Meal Management',
            text: 'Are you sure you want to delete this meal plan?',
            icon: 'info',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete',
            denyButtonText: 'No',
          }).then((result) => {

            if (result.isConfirmed) {
              fireAjax('MealPlanController.php?action=remove_mealplan&id=' + dataID, '', false).then(function(data) {
                console.log(data);
                let objSuccess = $.parseJSON(data.trim()).success;

                dtMealMgmt
                  .row(thisButton.parents('tr'))
                  .remove()
                  .draw();

                fireSwal('Meal Management', 'Meal plan deleted successfully', 'success');
              }).catch(function(err) {
                console.log(err);
                fireSwal('Meal Management', 'Failed to delete meal plan. Please try again', 'error');
              })
            }
          })
        });
        $('#mdlMealRegister').on('submit', function(e) {
          e.preventDefault();

          let json_arr = JSON.stringify(ingredients_arr);

          let fd = new FormData(this);
          fd.append('ingredients', json_arr);
          fireAjax('MealPlanController.php?action=create_mealplan', fd, true).then(function(data) {
            console.log(data);
            let objSuccess = $.parseJSON(data.trim()).success;
            loadAllMeals();
            fireSwal('Meal Management', 'Meal plan registered successfully', 'success');
            $('#mdlMealRegister').trigger('reset');
            $('#tblIngredientsBody').empty();
            $('#mealmodal').modal('hide');
          }).catch(function(err) {
            console.log(err);
            fireSwal('Meal Management', 'Failed to register meal plan. Please try again', 'error');

          })

        });
      } else if (me == "usermgmt") {
        loadUsers();
        $('#frmUserRegister').on('submit', function(e) {
          e.preventDefault();
          let fd = new FormData(this);
          fireAjax('UsersController.php?action=add_other_user', fd, true).then(function(data) {
            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            if (objData == -1) {
              fireSwal('User Management', 'Failed to add user. Gmail Address already exists', 'info');
            } else if (objData == 1) {
              loadUsers();
              $('#usermodal').modal('hide');
              $('#frmUserRegister').trigger('reset');
              fireSwal('User Management', 'User added successfully', 'success');
            } else {
              fireSwal('User Management', 'Failed to add user. Please try again', 'error');
            }
          }).catch(function(err) {
            console.log(err);
            fireSwal('User Management', 'Failed to add user. Please try again', 'error');
          })
        });
        $('body').on('click', '.btnDeleteUser', function() {
          let dataID = $(this).attr('data-id');
          let thisButton = $(this);
          Swal.fire({
            allowOutsideClick: false,
            title: 'User Management',
            text: 'Are you sure you want to delete this user?',
            icon: 'info',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete',
            denyButtonText: 'No',
          }).then((result) => {
            if (result.isConfirmed) {
              fireAjax('usersController.php?action=remove_user&id=' + dataID, '', false).then(function(data) {
                console.log(data);
                let objData = $.parseJSON(data.trim()).data;
                if (objData != false) {
                  dtUserMgmt
                    .row(thisButton.parents('tr'))
                    .remove()
                    .draw();
                  fireSwal('User Management', 'User deleted successfully', 'success');
                } else {
                  fireSwal('User Management', 'Failed to delete user. Please try again', 'error');
                }

              }).catch(function(err) {
                console.log(err);
                fireSwal('User Management', 'Failed to delete user. Please try again', 'error');
              });
            }
          });

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

    function loadMealList(meal_type){
     
      fireAjax('MealPlanController.php?action=get_meal_by_category&type=' + meal_type,'',false).then(function(data){
        console.log(data);
        let objData = $.parseJSON(data.trim()).data;
        let retval = '';
    
        $.each(objData,function(k,v){
          retval += '<tr>';
          retval += '<td>' + '<img width="70" height="70" src="' + image_url + v.plan_picture + '" alt="meal">' + '</td>';
          retval += '<td>' + v.plan_name + '</td>';
          retval += '<td>' + v.plan_description + '</td>';
          retval += '<td>' + v.plan_category + '</td>';
          retval += '<td>' + v.total_calories + '</td>';
          retval += '<td class="text-right"><button data-id = "' + v.id + '" class="btnAddToDaily btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Add to daily meal</button></td>';
          retval += '</tr>';
        });
        if(dtMeal != null){
          dtMeal.destroy();
        }
        $('#tblMealsBody').html(retval);
        dtMeal = $('#tblMeals').DataTable({
          "paging": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,
          "responsive": true
        });
      }).catch(function(err){
        console.log(err);
        fireSwal('Meals','Failed to retrieve list of meals. Please reload the page','error');
      })
    }
    function loadUsers() {
      fireAjax('UsersController.php?action=get_all_users', '', false).then(function(data) {
        console.log(data);
        let objData = $.parseJSON(data.trim()).data;
        let retval = '';
        $.each(objData, function(k, v) {
          retval += '<tr>';
          retval += '<td>' + v.gmail_address + '</td>';
          retval += '<td>' + v.lastname + '</td>';
          retval += '<td>' + v.firstname + '</td>';
          retval += '<td>' + v.middlename + '</td>';
          retval += '<td>' + v.birthdate + '</td>';
          retval += '<td>';
          if (v.gender == 'Male') {
            retval += '<button class="btn btn-secondary btn-sm"><i class="fa fa-male"></i>&nbsp;Male</button>';
          } else {
            retval += '<button class="btn btn-warning btn-sm"><i class="fa fa-female"></i>&nbsp;Female</button>';
          }
          retval += '</td>';
          retval += '<td class="text-right"><button data-id = "' + v.id + '" class="btnDeleteUser btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button></td>';
          retval += '</tr>';
        });

        if (dtUserMgmt != null) {
          dtUserMgmt.destroy();
        }
        $('#tblUserMgmtBody').html(retval);
        dtUserMgmt = $('#tblUserMgmt').DataTable({
          "destroy": true,
          "paging": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,
          "responsive": true
        });
      }).catch(function(err) {
        console.log(err);
        fireSwal('User Management', 'Failed to retrieve list of users. Please reload the page', 'error');
      })
    }

    function loadAllMeals() {
      fireAjax('MealPlanController.php?action=get_user_mealplan', '', false).then(function(data) {
        console.log(data);
        let objData = $.parseJSON(data.trim()).data;
        let retval = '';
        $.each(objData, function(k, v) {
          retval += '<tr>';
          retval += '<td><img width="100" height="100" src="' + image_url + v.plan_picture + '" alt="meal"></td>'
          retval += '<td>' + v.plan_name + '</td>';
          retval += '<td>' + v.plan_description + '</td>';
          retval += '<td>' + v.plan_category + '</td>';
          retval += '<td>' + v.total_calories + '</td>';
          retval += '<td class="text-right">';
          retval += '<button class="btnMealMgmtEdit btn btn-primary btn-sm" data-id = "' + v.id + '"><i class="fa fa-edit"></i>&nbsp;Edit</button>';
          retval += '<button class="btnMealMgmtDelete btn btn-danger btn-sm" data-id = "' + v.id + '"><i class="fa fa-trash"></i>&nbsp;Delete</button>';
          retval += '</td>';
          retval += '</tr>';
        });
        if (dtMealMgmt != null) {
          dtMealMgmt.destroy();
        }
        $('#tblMealMgmtBody').html(retval);
        dtMealMgmt = $('#tblMealMgmt').DataTable({

          "paging": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,
          "responsive": true
        });
      }).catch(function(err) {
        console.log(err);
        fireSwal('Meal Management', 'Failed to retrieve list of meals. Please reload the page', 'error');
      })
    }

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