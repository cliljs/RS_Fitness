<div class="clearfix"></div>
<!-- slider -->


<!-- slider -->
<div class="x_panel mt-3">
  <div class="x_title">
    <h4><i class="fa fa-book"></i> &nbsp;Records</h4>

    <hr>


    <div class="row">

      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">



          </div>
          <div class="x_content">

            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="meal-tab" data-toggle="tab" href="#meal" role="tab" aria-controls="meal" aria-selected="true">Daily Meal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="workout-tab" data-toggle="tab" href="#workout" role="tab" aria-controls="workout" aria-selected="false">Workouts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Student Activities</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="meal" role="tabpanel" aria-labelledby="meal-tab">
                <form id="frmRpt1" class="form-inline pull-right">

                  <div class="form-group mx-sm-3 mb-2">

                    <input type="date" class="form-control" id="rptDT1" name="rptDT1" required>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> &nbsp;Filter</button>
                </form>
                <table id="tblRpt1" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Meal Taken</th>
                      <th>Calories Gained</th>
                    </tr>
                  </thead>
                  <tbody id="tblRpt1Body">

                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="workout" role="tabpanel" aria-labelledby="workout-tab">
                <form id="frmRpt2" class="form-inline pull-right">

                  <div class="form-group mx-sm-3 mb-2">

                    <input type="date" class="form-control" id="rptDT2" name="rptDT2" required>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> &nbsp;Filter</button>
                </form>
                <table id="tblRpt2" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Workout</th>
                      <th>Calories Burned</th>
                    </tr>
                  </thead>
                  <tbody id="tblRpt2Body">

                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                <form id="frmRpt3" class="form-inline pull-right">
                  <div class="form-group mx-sm-3 mb-2">
                    <select id="rptInp1" name="rptInp1" class="select2_single form-control" tabindex="-1" required>

                    </select>
                  </div>
                  <div class="form-group mx-sm-3 mb-2">

                    <input type="date" class="form-control" id="rptDT3" name="rptDT3" required>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> &nbsp;Filter</button>
                </form>
                <table id="tblRpt3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Activity</th>
                      <th></th>
                      <th>Calories</th>
                    </tr>
                  </thead>
                  <tbody id="tblRpt3Body">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>