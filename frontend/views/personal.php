<div class="clearfix"></div>

<div class="x_panel mt-3">
  <div class="x_title">
    <h4><i class="fa fa-user"></i> &nbsp;Personal Information</h4>


  </div>
  <div class="row">
    <div class="col-md-12 px-4">
      <form class="form-horizontal form-label-left" id="frmPersonal">
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
            <input id="middlename" name="middlename" class="form-control col has-feedback-left" type="text" value="<?php echo $_SESSION['user_middlename'] ?>">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
          <div class="col-md-6 col-sm-6 ">
            <div id="gender" class="btn-group" data-toggle="buttons">
              <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                <input type="radio" name="gender" value="male" class="join-btn" checked> &nbsp; Male &nbsp;
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
            <input id="birthdate" name="birthdate" class="date-picker form-control has-feedback-left" placeholder="yyyy-MM-dd" type="date" value="<?php echo $_SESSION['user_birthdate'] ?>" required="required">

            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
          </div>
        </div>
        <div class="form-group row">

          <label class="col-form-label col-md-3 col-sm-3 label-align" for="weight">Weight <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 ">
            <input type="number" id="weight" name="weight" required="required" class="form-control has-feedback-left" placeholder="Weight in pounds(lbs)" value="<?php echo $_SESSION['user_weight'] ?>">
            <span class="fa fa-bar-chart form-control-feedback left" aria-hidden="true"></span>
          </div>
        </div>
        <div class="form-group row">

          <label class="col-form-label col-md-3 col-sm-3 label-align" for="height">Height <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 ">
            <input type="number" id="height" name="height" required="required" class="form-control has-feedback-left" placeholder="Height in centimeters(cm)" value="<?php echo $_SESSION['user_height'] ?>">
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
        <div class="form-group row">
          <label class="col-form-label col-md-3 col-sm-3 label-align">
          </label>
          <div class="col-md-6 col-sm-6 pull-right" style = "padding-right:5px !important;">
            <div class="d-flex flex-row-reverse">
              <button type="submit" class="btn btn-info">Update</button >
            </div>

          </div>

        </div>
      </form>
    </div>
  </div>
</div>