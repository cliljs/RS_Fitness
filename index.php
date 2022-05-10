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
    .form-control-borderless {
      border: none;
    }

    .form-control-borderless:hover,
    .form-control-borderless:active,
    .form-control-borderless:focus {
      border: none;
      outline: none;
      box-shadow: none;
    }

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


    .counter-box {
      display: block;
      background: #f6f6f6;
      padding: 40px 20px 37px;
      text-align: center
    }

    .counter-box p {
      margin: 5px 0 0;
      padding: 0;
      color: #909090;
      font-size: 18px;
      font-weight: 500
    }

    .counter-box i {
      font-size: 60px;
      margin: 0 0 15px;
      color: #d2d2d2
    }

    .counter {
      display: block;
      font-size: 32px;
      font-weight: 700;
      color: #666;
      line-height: 28px
    }

    .counter-box.colored {
      background: #3acf87;
    }

    .counter-box.colored p,
    .counter-box.colored i,
    .counter-box.colored .counter {
      color: #fff
    }

    .profile_info {
      padding-top: 20px !important;
    }

    .profile_info span {
      line-height: 20px !important;
    }
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;display:none;">
            <a href="#" class="site_title"><span>MaLoFit<br><small>MacroNutrient &amp; Calories Fitness</small></span></a>
            <!-- <a href = "#" class="site_title">MacroNutrient &amp; Calories Fitness</a> -->
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
  <script src="frontend/plugins/echarts/dist/echarts.min.js"></script>
  <!-- Custom Theme Scripts -->
  <!-- <script src="frontend/plugins/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script> -->
  <script src="frontend/build/js/custom.min.js"></script>
  <script src="frontend/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="frontend/build/js/common.js"></script>
  <script src="frontend/plugins/slider/main.js"></script>

  <script>
    let dtUserMgmt = null,
      dtMyMeals = null,
      dtWorkout = null,
      dtMeal = null,
      dtMealMgmt = null;
    $(function() {
      let me = getUrlVars()['view'];

      if (me == "meal") {
        loadMealList($("meta[name=mode]").attr("content"));
        loadMealsTaken($('#date_taken').val());
        $('body').on('click', '.btnViewMeal', function() {
          let dataID = $(this).attr('data-id');
          fireAjax('MealPlanController.php?action=get_meal_info&id=' + dataID, '', false).then(function(data) {
            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            $('#imgPicture').attr('src', image_url + objData.plan_picture);
            $('#plan_name').val(objData.plan_name);
            $('#plan_description').val(objData.plan_description);
            $('#plan_category').val(objData.plan_category);
            fireAjax('MealIngredientsController.php?action=get_meal_ingredients&meal_pk=' + dataID, '', false).then(function(data2) {
              console.log(data2);
              let obj2Data = $.parseJSON(data2.trim()).data;
              let retval = '';
              $.each(obj2Data, function(k, v) {
                retval += '<tr>';
                retval += '<td>' + v.ingredient_name + '</td>';
                retval += '<td>' + v.calories + '</td>';
                retval += '</tr>';
              });
              $('#tblIngredientsBody').html(retval);
            }).catch(function(err2) {
              console.log(err2);
            })

            $('#mdlMealInfo').modal({
              backdrop: "static"
            });
          }).catch(function(err) {
            console.log(err);
            fireSwal('View Meal', 'Failed to retrieve information. Please try again', 'error');
          })
        });
        $('body').on('click', '.btnAddMeal, .btnAddToDaily', function() {
          let dataID = $(this).attr('data-id');
          let payload = {
            mealplan_id: dataID
          };
          Swal.fire({
            allowOutsideClick: false,
            title: 'Add Meal',
            text: 'Are you sure you want to add this meal to your daily meal?',
            icon: 'info',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, add',
            denyButtonText: 'No',
          }).then((result) => {

            if (result.isConfirmed) {
              fireAjax('StudentMealController.php?action=create_student_meal', payload, false).then(function(data) {
                console.log(data);
                let objData = $.parseJSON(data.trim()).success;
                if (objData == 1) {
                  fireSwal('Daily Meal', 'Meal has been added successfully', 'success');
                } else {
                  fireSwal('Daily Meal', 'Failed to add meal. Please try again', 'error');
                }
              }).catch(function(err) {
                console.log(err);
                fireSwal('Daily Meal', 'Failed to add meal. Please try again', 'error');
              })
            }
          })
        });
        $('body').on('click', '.btnDeleteMyMeal', function() {
          let dataID = $(this).attr('data-id');
          let thisButton = $(this);
          Swal.fire({
            allowOutsideClick: false,
            title: 'Meal',
            text: 'Are you sure you want to delete this meal?',
            icon: 'info',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete',
            denyButtonText: 'No',
          }).then((result) => {
            if (result.isConfirmed) {
              fireAjax('StudentMealController.php?action=remove_student_meal&id=' + dataID, '', false).then(function(data) {
                console.log(data);
                let objSuccess = $.parseJSON(data.trim()).success;

                dtMyMeals
                  .row(thisButton.parents('tr'))
                  .remove()
                  .draw();

                fireSwal('Meal', 'Meal deleted successfully', 'success');
              }).catch(function(err) {
                console.log(err);
                fireSwal('Meal', 'Failed to delete meal. Please try again', 'error');
              })
            }
          });
        });
        $('#btnSeachMyMeals').on('click', function() {
          loadMealsTaken($('#date_taken').val());
        });
        $('#frmCustomMeal').on('submit', function(e) {
          e.preventDefault();
          let fd = new FormData(this);
          fireAjax('StudentMealController.php?action=create_student_meal', fd, true).then(function(data) {
            console.log(data);
            let objSuccess = $.parseJSON(data.trim()).success;
            loadMealsTaken($('#date_taken').val());
            $('#frmCustomMeal').trigger('reset');
            $('#mdlCustomMeal').modal('hide');
            fireSwal('Custom Meal', 'Custom Meal added successfully', 'success');
          }).catch(function(err) {
            console.log(err);
            fireSwal('Custom Meal', 'Failed to add custom meal. Please try again', 'error');
          })
        });
      } else if (me == null || me == "home") {
        //alert(moment().format('YYYY-MM-DD'));
        let sGender = "All";
        $("#reportrange span").html(moment().startOf("month").format("MMMM D, YYYY") + " - " + moment().endOf("month").format("MMMM D, YYYY"))
        $(".aGenderSelect").on('click', function() {
          let aThis = $(this);
          sGender = aThis.html();

          init_echarts(moment().startOf("month").format('YYYY-MM-DD'), moment().endOf("month").format('YYYY-MM-DD'), sGender);
        })

        loadAdminHeader();
        init_echarts(moment().startOf("month").format('YYYY-MM-DD'), moment().endOf("month").format('YYYY-MM-DD'), 'All');
      } else if (me == "mealmgmt") {
        loadAllMeals();
        let ingredients_arr = [];
        let edit_ingredients_arr = [];
        $("#meal_picture").on("change", function() {
          $(".custom-file-label").html("Image Selected");
        });
        $('#edit_btnAddIngredients').on('click', function() {
          let ingName = $('#edit_ingredient_name').val();
          let ingCal = $('#edit_calorie').val();

          $('#edit_tblIngredientsBody').append('<tr><td>' + ingName + '</td><td>' + ingCal + '</td><td class = "text-right"><button class = "btnEditRemoveIngredient btn btn-danger btn-sm"><i class = "fa fa-trash"></i>&nbsp;Remove</button></td></tr>');
          $('#edit_ingredient_name').val('');
          $('#edit_calorie').val('');
          edit_ingredients_arr.push({
            name: ingName,
            calories: ingCal
          });
        });
        $('#btnAddIngredients').on('click', function() {
          let ingName = $('#ingredient_name').val();
          let ingCal = $('#calorie').val();

          $('#tblIngredientsBody').append('<tr><td>' + ingName + '</td><td>' + ingCal + '</td><td class = "text-right"><button class = "btnRemoveIngredient btn btn-danger btn-sm"><i class = "fa fa-trash"></i>&nbsp;Remove</button></td></tr>');
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
        $('body').on('click', '.btnMealMgmtEdit', function() {
          let dataID = $(this).attr('data-id');
          fireAjax('MealPlanController.php?action=get_meal_info&id=' + dataID, '', false).then(function(data) {
            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            $('#editMealModalLabel').attr('data-id', dataID);
            $('#edit_plan_name').val(objData.plan_name);
            $('#edit_plan_description').val(objData.plan_description);
            $('#edit_plan_category').val(objData.plan_category);
            fireAjax('MealIngredientsController.php?action=get_meal_ingredients&meal_pk=' + dataID, '', false).then(function(data2) {
              console.log(data2);
              let objData2 = $.parseJSON(data2.trim()).data;
              let retval = '';
              $.each(objData2, function(k, v) {
                edit_ingredients_arr.push({
                  name: v.ingredient_name,
                  calories: v.calories
                });
                retval += '<tr>';
                retval += '<td>' + v.ingredient_name + '</td>';
                retval += '<td>' + v.calories + '</td>';
                retval += '<td class = "text-right"><button type = "button" class = "btnEditRemoveIngredient btn btn-danger btn-sm" data-id = "' + v.id + '"><i class = "fa fa-trash"></i>&nbsp;Remove</button></td>';
                retval += '</tr>';
              });

              $('#edit_tblIngredientsBody').html(retval);
              $('#editMealModal').modal({
                backdrop: "static"
              });
            }).catch(function(err2) {
              console.log(err2);
              fireSwal('Edit Meal', 'Failed to retrieve meal information. Please try again', 'error');

            })

          }).catch(function(err) {
            console.log(err);
            fireSwal('Edit Meal', 'Failed to retrieve meal information. Please try again', 'error');
          })
        });
        $('body').on('click', '.btnEditRemoveIngredient', function() {
          let row = $(this).closest('tr');
          let tditem = $(this)
            .closest('tr')
            .children('td')
            .html();
          edit_ingredients_arr.splice(edit_ingredients_arr.findIndex(el => el.vip == tditem), 1);
          row.remove();
          // let dataID = $(this).attr('data-id');
          // let thisButton = $(this);
          // fireAjax('MealIngredientsController.php?action=remove_ingredient&id=' + dataID, '', false).then(function(data) {
          //   console.log(data.trim());
          //   let objData = $.parseJSON(data.trim()).data;
          //   if (objData.length === 0) {
          //     fireSwal('Meal Ingredients', 'Failed to remove meal ingredient. Please try again', 'error');
          //   } else {
          //     thisButton.closest('tr').remove();
          //     fireSwal('Meal Ingredients', 'Meal Ingredient removed successfully', 'success');
          //   }
          // }).catch(function(err) {
          //   console.log(err);
          //   fireSwal('Meal Ingredients', 'Failed to remove meal ingredient. Please try again', 'error');
          // })
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
        $('#mdlEditMeal').on('submit', function(e) {
          e.preventDefault();
          console.log(edit_ingredients_arr);

          let dataID = $('#editMealModalLabel').attr('data-id');
          let json_arr = JSON.stringify(edit_ingredients_arr);
          let fd = new FormData(this);
          fd.append('ingredients', json_arr);

          fireAjax('MealPlanController.php?action=update_mealplan&id=' + dataID, fd, true).then(function(data) {
            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            if (objData) {
              $('#mdlEditMeal').trigger('reset');
              $('#editMealModal').modal('hide');
              fireSwal('Edit Meal', 'Meal updated successfully', 'success');
            } else {
              fireSwal('Edit Meal', 'Failed to edit meal. Please try again', 'error');
            }
          }).catch(function(err) {
            console.log(err);
            fireSwal('Edit Meal', 'Failed to edit meal. Please try again', 'error');
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
      } else if (me == "workout") {
        loadWorkout();
        $('#frmNewWorkout').on('submit', function(e) {
          e.preventDefault();
          let fd = new FormData(this);
          fireAjax('WorkoutController.php?action=create_workout', fd, true).then(function(data) {
            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            loadWorkout();
            $('#mdlNewWorkout').modal('hide');
            $('#frmNewWorkout').trigger('reset');
            fireSwal('New Workout', 'Workout added successfully.', 'success');
          }).catch(function(err) {
            console.log(err);
            fireSwal('New Workout', 'Failed to add workout. Please try again', 'error');
          })
        });

        $('#frmEditWorkout').on('submit', function(e) {
          e.preventDefault();
          let workoutID = $('#mdlNewWorkoutLabel').attr('data-id');
          let payload = {
            calories_burned: $('#edit_calories_burned').val(),
            workout_duration: $('#edit_workout_duration').val(),
            description: $('#edit_description').val(),
            workout_date: $('#edit_workout_date').val()
          };
          fireAjax('WorkoutController.php?action=update_workout&id=' + workoutID, payload, false).then(function(data) {
            console.log(data);
            let objSuccess = $.parseJSON(data.trim()).success;
            if (objSuccess == 1) {
              loadWorkout();
              $('#frmEditWorkout').trigger('reset');
              $('#mdlEditWorkout').modal('hide');
              fireSwal('Edit Workout', 'Workout updated successfully', 'success');
            } else {
              fireSwal('Edit Workout', 'Failed to update workout. Please try again', 'error');
            }
          }).catch(function(err) {
            console.log(err);
            fireSwal('Edit Workout', 'Failed to update workout. Please try again', 'error');
          })
        });
        $('body').on('click', '.btnDeleteWorkout', function() {
          let dataID = $(this).attr('data-id');
          let thisButton = $(this);
          Swal.fire({
            icon: 'info',
            title: 'Delete Workout',
            text: 'Are you sure you want to delete this workout entry?',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete',
            denyButtonText: 'No',
          }).then((result) => {

            if (result.isConfirmed) {
              fireAjax('WorkoutController.php?action=remove_workout&id=' + dataID, '', false).then(function(data) {
                console.log(data);
                let objData = $.parseJSON(data.trim()).data;
                dtWorkout
                  .row(thisButton.parents('tr'))
                  .remove()
                  .draw();
                fireSwal('Delete Workout', 'Workout deleted successfully', 'success');
              }).catch(function(err) {
                console.log(err);
                fireSwal('Delete Workout', 'Failed to delete workout. Please try again', 'error');
              })
            }
          })
        })

        $('body').on('click', '.btnEditWorkout', function() {
          let dataID = $(this).attr('data-id');
          fireAjax('WorkoutController.php?action=get_workout_info&id=' + dataID, '', false).then(function(data) {
            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            $('#mdlNewWorkoutLabel').attr('data-id', dataID);
            $('#edit_workout_date').val(objData.workout_date);
            $('#edit_description').val(objData.description);
            $('#edit_workout_duration').val(objData.workout_duration);
            $('#edit_calories_burned').val(objData.calories_burned);
            $('#mdlEditWorkout').modal({
              backdrop: "static"
            });
          }).catch(function(err) {
            console.log(err);
            fireSwal('Edit Workout', 'Failed to retrieve workout information. Please try again', 'error');
          })
        })
      } else if (me == "history") {
        let e = new Date();
        
        plotCalendar(e.getMonth() + 1, e.getFullYear());
      } else if (me == "records") {
        fireAjax('UsersController.php?action=get_all_students', '', false).then(function(data) {
          console.log(data);
          let retval = '<option disabled selected>Select Student\'s Name</option>'
          let objData = $.parseJSON(data.trim()).data;
          $.each(objData, function(k, v) {
            retval += '<option value = "' + v.id + '">' + v.fullname + '</option>';
          });
          $('#rptInp1').html(retval);
        }).catch(function(err) {
          console.log(err);
          fireSwal('Records', 'Failed to retrieve list of students. Please reload the page', 'error');
        })

      }
    });

    var loadFile = function(event) {
      var output = document.getElementById('imgPicture');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src)
      }
    };

    function plotCalendar(m, y) {
      console.log(m);
      console.log(y);
      fireAjax('UsersController.php?action=get_user_history&month=' + m + '&year=' + y, '', false).then(function(data) {
        console.log(data);


        let objData = $.parseJSON(data.trim()).data;

        let meal_taken = objData.meal_taken;
        let workout_made = objData.calories_burned;
        let merged_array = meal_taken.concat(workout_made);
        merged_array.pop();
        console.log(merged_array);
        init_calendar(merged_array);
      }).catch(function(err) {
        console.log(err);
        fireSwal('History', 'Failed to retrieve history. Please reload the page', 'error');
      })
    }

    function loadWorkout() {
      fireAjax('WorkoutController.php?action=get_user_workout', '', false).then(function(data) {
        console.log(data);
        let objData = $.parseJSON(data.trim()).data;
        let retval = '';

        $.each(objData, function(k, v) {
          retval += '<tr>';
          retval += '<td>' + v.workout_date + '</td>';
          retval += '<td>' + v.description + '</td>';
          retval += '<td>' + v.workout_duration + '</td>';
          retval += '<td>' + v.calories_burned + '</td>';
          retval += '<td class = "text-right">';
          retval += '<button data-id = "' + v.id + '" class="btnEditWorkout btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>';
          retval += '<button data-id = "' + v.id + '" class="btnDeleteWorkout btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>';
          retval += '</td>';
          retval += '</tr>';
        });

        if (dtWorkout != null) {
          dtWorkout.destroy();
        }
        $('#tblWorkoutBody').html(retval);
        dtWorkout = $('#tblWorkout').DataTable({
          "paging": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,
          "responsive": true
        });
      }).catch(function(err) {
        console.log(err);
        fireSwal('Workout', 'Failed to retrieve workout list. Please reload the page', 'error');
      })
    }

    function loadMealsTaken(date_consumed) {
      let payload = {
        date_taken: date_consumed
      };
      fireAjax('StudentMealController.php?action=get_user_meals', payload, false).then(function(data) {
        console.log(data.trim());
        let objData = $.parseJSON(data.trim()).data;
        let retval = '';
        $.each(objData, function(k, v) {
          retval += '<tr>';
          retval += '<td>' + v.meal_name + '</td>';
          retval += '<td>' + v.meal_description + '</td>';
          retval += '<td>' + v.meal_category + '</td>';
          retval += '<td>' + v.calories_obtained + '</td>';
          retval += '<td class="text-right"><button data-id = "' + v.id + '" class="btnDeleteMyMeal btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button></td>';
          retval += '</tr>';
        });
        if (dtMyMeals != null) {
          dtMyMeals.destroy();
        }
        $('#tblMyMealsBody').html(retval);
        dtMyMeals = $('#tblMyMeals').DataTable({
          "paging": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": true,
          "responsive": true
        });
      }).catch(function(err) {
        console.log(err);
        fireSwal('Meals', 'Failed to retrieve all meals. Please reload the page', 'error');
      })
    }

    function loadMealList(meal_type) {
      fireAjax('MealPlanController.php?action=get_meal_by_category', '', false).then(function(data) {
        console.log(data.trim());
        let objData = $.parseJSON(data.trim()).data;
        let retval = '';
        $.each(objData, function(k, v) {
          retval += '<tr>';
          retval += '<td>' + '<img width="70" height="70" src="' + image_url + v.plan_picture + '" alt="meal">' + '</td>';
          retval += '<td>' + v.plan_name + '</td>';
          retval += '<td>' + v.plan_description + '</td>';
          retval += '<td>' + v.plan_category + '</td>';
          retval += '<td>' + v.total_calories + '</td>';
          retval += '<td class="text-right"><button data-id = "' + v.id + '" class="btnAddToDaily btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Add to daily meal</button></td>';
          retval += '</tr>';
        });
        if (dtMeal != null) {
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
      }).catch(function(err) {
        console.log(err);
        fireSwal('Meals', 'Failed to retrieve all meals. Please reload the page', 'error');
      })


      fireAjax('MealPlanController.php?action=get_meal_by_category&type=' + meal_type, '', false).then(function(data) {
        console.log(data);
        let objData = $.parseJSON(data.trim()).data;
        let retvalMobile = '';
        let retvalPC = '';
        let tempCount = 1;
        let desc = '';
        $.each(objData, function(k, v) {
          desc = v.plan_description;
          if (desc.length > 90) {
            desc = desc.substr(0, 86) + '...';
          }
          if (tempCount == 1 && retvalPC == '') {
            retvalPC += '<div class="carousel-item active">';
            retvalPC += '<div class = "row">';
          } else if (tempCount == 1 && retvalPC != '') {
            retvalPC += '<div class="carousel-item">';
            retvalPC += '<div class = "row">';
          }
          retvalPC += '<div class="col-md-4">';
          retvalPC += '<div class="product-block">';
          retvalPC += '<img class="d-block w-100 mb-2" src="https://via.placeholder.com/800x400" alt="Product">';
          retvalPC += '<div class="product-info">';
          retvalPC += '  <h4>' + v.plan_name + '</h4>';
          retvalPC += '  <p><button class="btn btn-outline-secondary btn-sm">' + v.total_calories + ' Calories</button></p>';
          retvalPC += '  <p class="text-muted">' + desc + '</p>';
          retvalPC += '  <div class="row">';
          retvalPC += '    <div class="col-md-12 text-right">';
          retvalPC += '      <button data-id = "' + v.id + '" class="btnAddMeal btn btn-sm btn-success"><i class = "fa fa-plus"></i>&nbsp;Add to daily meal</button>';
          retvalPC += '      <button data-id = "' + v.id + '" class="btnViewMeal btn btn-sm btn-secondary"><i class = "fa fa-view"></i>&nbsp;More Details</button>';
          retvalPC += '    </div>';
          retvalPC += '  </div>';
          retvalPC += '</div>';
          retvalPC += '</div>';
          retvalPC += '</div>';
          tempCount++;
          if (tempCount == 4) {
            retvalPC += '</div>';
            retvalPC += '</div>';
            tempCount = 1;
          }

        });

        if (tempCount < 4) {

          for (let i = tempCount; i < 4; i++) {
            console.log("PROC");
            retvalPC += '<div class="col-md-4"><div class="product-block" style = "border: 0px !important;"><div class="product-info"></div></div></div>';
          }
        }
        console.log(tempCount);
        $('#carouselPCInner').html(retvalPC);
      }).catch(function(err) {
        console.log(err);
        fireSwal('Meals', 'Failed to retrieve list of meals. Please reload the page', 'error');
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

    function loadAdminHeader() {
      fireAjax('UsersController.php?action=get_admin_header', '', false).then(function(data) {
        console.log(data);
        let objData = $.parseJSON(data.trim()).data;
        $('#countUsers').html(objData.total_users);
        $('#countMales').html(objData.total_female);
        $('#countFemales').html(objData.total_female);
        $('#countAdmins').html(objData.admins);
        $('.counter-value').each(function() {
          $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
          }, {
            duration: 1000,
            easing: 'swing',
            step: function(now) {
              $(this).text(Math.ceil(now));
            }
          });
        });
      }).catch(function(err) {
        console.log(err);
      })
    }

    function loadAllMeals() {
      fireAjax('MealPlanController.php?action=get_user_mealplan', '', false).then(function(data) {
        console.log(data);
        let objData = $.parseJSON(data.trim()).data;
        let retval = '';
        $.each(objData, function(k, v) {
          retval += '<tr>';
          retval += (!v.plan_picture) ? '<td></td>' : '<td><img width="100" height="100" src="' + image_url + v.plan_picture + '" alt="meal"></td>'
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