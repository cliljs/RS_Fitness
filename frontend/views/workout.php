<div class="clearfix"></div>

<div class="x_panel mt-3">
  <div class="x_title">
    <h4><i class="fa fa-bicycle"></i> &nbsp;Workout</h4>
    <div class="text-right">
      <button data-toggle="modal" data-target="#mdlNewWorkout" data-backdrop="static" class="btn btn-md btn-info"><i class="fa fa-plus"></i>&nbsp; Add New Workout Entry</button>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-hover" id="tblWorkout">


        <thead>
          <tr>
            <th>Date</th>

            <th>Description</th>
            <th>Duration</th>
            <th>Calories Burned</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="tblWorkoutBody">


        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="mdlNewWorkout" tabindex="-1" role="dialog" aria-labelledby="mdlNewWorkoutLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form id="frmNewWorkout">
        <div class="modal-header">
          <h5 class="modal-title" id="mdlNewWorkoutLabel">Workout Information</h5>
        </div>
        <div class="modal-body">
          <div class="row p-2">
            <div class="col-md-12">
              <div class="form-group">
                <label>Workout Date</label>
                <input class="form-control" type="date" id="workout_date" name="workout_date" required />
              </div>
              <div class="form-group">
                <label>Workout Description</label>
                <input class="form-control" type="text" id="description" name="description" required />
              </div>
              <div class="form-group">
                <label>Estimated Burned Calories</label>
                <input class="form-control" type="number" id="calories_burned" name="calories_burned" required />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Register</button>
        </div>
      </form>
    </div>

  </div>
</div>