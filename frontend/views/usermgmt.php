<div class="clearfix"></div>

<div class="x_panel mt-3">
  <div class="x_title">
    <h4><i class="fa fa-users"></i> &nbsp;User Management</h4>
    <div class="text-right">
      <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#usermodal" data-backdrop="static"><i class="fa fa-plus"></i>&nbsp;Add New User</button>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-hover" id="tblUserMgmt">
        <thead>
          <tr>
            <th>Gmail Address</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Birthdate</th>
            <th>Gender</th>

            <th></th>
          </tr>
        </thead>
        <tbody id="tblUserMgmtBody">
         

        </tbody>
      </table>
    </div>
  </div>
</div>



<div class="modal fade" id="usermodal" tabindex="-1" role="dialog" aria-labelledby="usermodallabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="frmUserRegister">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="usermodallabel">Add New User</h5>
        </div>
        <div class="modal-body">
          <div class="row px-2">
            <div class="col-md-12">
              <div class="form-group row">
                <label>Gmail Address</label>
                <input type="email" class="form-control" id="gmail" name="gmail" required />
              </div>
              <div class="form-group row">
                <label>Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required />
              </div>
              <div class="form-group row">
                <label>First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required />
              </div>
              <div class="form-group row">
                <label>Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename" required />
              </div>
              <div class="form-group row">
                <label>Date Of Birth</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required />
              </div>
              <div class="form-group row">
                <label>Gender</label>
               
                  <div id="gender" class="btn-group form-control" data-toggle="buttons" style = "height:auto;">
                    <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                      <input type="radio" name="gender" value="male" class="join-btn" required> &nbsp; Male &nbsp;
                    </label>
                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                      <input type="radio" name="gender" value="female" class="join-btn" required> Female
                    </label>
                  </div>
               
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
    </form>
  </div>
</div>