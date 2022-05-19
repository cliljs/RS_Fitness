<?php

session_start();
if (!isset($_SESSION['google_email'])) {
    header('Location: login.php');
}
if (isset($_SESSION['validated'])) {
    if($_SESSION['is_admin'] == 1){
        header('Location: index.php?view=home');
    } else{
        header('Location: index.php?view=meal');
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="frontend/build/images/favicon.png" type="image/png" />

    <title>MaLoFit | Registration</title>

    <!-- Bootstrap -->
    <link href="frontend/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="frontend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="frontend/plugins/nprogress/nprogress.css" rel="stylesheet">
    <link href="frontend/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="frontend/build/css/custom.min.css" rel="stylesheet">
    <link href="frontend/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
    <link href="frontend/build/css/preloader.css" rel="stylesheet">

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="row">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>MaLoFit <small>Registration</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <p>Please complete all fields below</p>
                            <div id="wizard" class="form_wizard wizard_horizontal">
                                <ul class="wizard_steps">
                                    <li>
                                        <a href="#step-1">
                                            <span class="step_no">1</span>
                                            <span class="step_descr">
                                                Step 1<br />
                                                <small style="display:none">Step 1 description</small>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#step-2">
                                            <span class="step_no">2</span>
                                            <span class="step_descr">
                                                Step 2<br />
                                                <small style="display:none">Step 4 description</small>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="step-1">

                                    <form class="form-horizontal form-label-left" id="frmStep1">
                                        <div class="form-group row">
                                            <h2 class="col-md-3 col-sm-3 label-align">Personal Information</h2>
                                        </div>
                                        <div class="form-group row">

                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="firstname">First Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="firstname" name="firstname" required="required" class="form-control has-feedback-left" value="<?php echo $_SESSION['user_firstname'] ?>">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="lastname">Last Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="lastname" name="lastname" required="required" class="form-control has-feedback-left" value="<?php echo $_SESSION['user_lastname'] ?>">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="middlename" class="col-form-label col-md-3 col-sm-3 label-align">Middle Name</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="middlename" name="middlename" class="form-control col has-feedback-left" type="text">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <div id="gender" class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                                        <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
                                                    </label>
                                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                                        <input type="radio" name="gender" value="female" class="join-btn"> Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="birthdate" name="birthdate" class="date-picker form-control has-feedback-left" placeholder="yyyy-MM-dd" type="date" required="required">

                                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div id="step-2">

                                    <form class="form-horizontal form-label-left" id="frmStep1">
                                        <div class="form-group row">
                                            <h2 class="col-md-3 col-sm-3 label-align">Other Information</h2>
                                        </div>
                                        <div class="form-group row">

                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="weight">Weight <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="number" id="weight" name="weight" required="required" class="form-control has-feedback-left" placeholder="Weight in pounds(lbs)">
                                                <span class="fa fa-bar-chart form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="height">Height <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="number" id="height" name="height" required="required" class="form-control has-feedback-left" placeholder="Height in centimeters(cm)">
                                                <span class="fa fa-bar-chart form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="bmi">BMI
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="bmi" name="bmi" class="form-control has-feedback-left" disabled>
                                                <span class="fa fa-bar-chart form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="classification">Classification
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="classification" name="classification" class="form-control has-feedback-left" disabled>
                                                <span class="fa fa-bar-chart form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="frontend/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="frontend/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="frontend/plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="frontend/plugins/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="frontend/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <script src="frontend/plugins/moment/min/moment.min.js"></script>
    <script src="frontend/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="frontend/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="frontend/build/js/jquery.preloader.min.js"></script>
    <script src="frontend/build/js/custom.min.js"></script>
    <script src="frontend/build/js/common.js"></script>
    <script>
        $(function() {
            $('#weight, #height').on("keyup", function() {

                let bmi = calculateBMI($('#height').val(), $('#weight').val());
                if (bmi == Number.POSITIVE_INFINITY) return;
                if (isNaN(bmi)) {
                    $('#bmi').val('');
                    $('#classification').val('');
                    return;
                }
                $('#bmi').val(bmi);
                $('#classification').val(clasifyBMI(bmi));
            });
            $('.buttonFinish').on('click', function() {
                let payload = {
                    firstname: $('#firstname').val(),
                    middlename: $('#middlename').val(),
                    lastname: $('#lastname').val(),
                    birthdate: $('#birthdate').val(),
                    gender: $('input[name="gender"]:checked').val(),
                    height: $('#height').val(),
                    weight: $('#weight').val(),
                    bmi: $('#bmi').val()
                };

                fireAjax('UsersController.php?action=login_user', payload, false).then(function(data) {
                    console.log(data);
                    let objData = $.parseJSON(data.trim()).success;
                    if (objData == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration',
                            text: 'Account updated successfully. Click OK to proceed',
                            showDenyButton: false,
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: 'Ok'
                        }).then((result) => {

                            if (result.isConfirmed) {
                                window.location.href = home_url + 'index.php?view=meal';
                            }
                        })
                    } else {
                        fireSwal('Registration', 'Failed to register account. Please try again', 'error');
                    }
                }).catch(function(err) {
                    console.log(err);
                    fireSwal('Registration', 'Failed to register account. Please try again', 'error');
                })
            });
        });
    </script>
</body>

</html>