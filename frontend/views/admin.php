<div class="row">

  <div class="four col-md-3">
    <div class="counter-box">
      <i class="fa fa-sitemap"></i>
      <span id="countUsers" class="counter counter-value">0</span>
      <p>Registered Users</p>
    </div>
  </div>
  <div class="four col-md-3">
    <div class="counter-box">
      <i class="fa fa-male"></i>
      <span id="countMales" class="counter counter-value">0</span>
      <p>Total No. of Male</p>
    </div>
  </div>
  <div class="four col-md-3">
    <div class="counter-box">
      <i class="fa fa-female"></i>
      <span id="countFemales" class="counter counter-value">0</span>
      <p>Total No. of Female</p>
    </div>
  </div>
  <div class="four col-md-3">
    <div class="counter-box">
      <i class="fa fa-users"></i>
      <span id="countAdmins" class="counter counter-value">0</span>
      <p>Administrators</p>
    </div>
  </div>
</div>
<!-- /top tiles -->

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="dashboard_graph">

      <div class="row x_title">
        <div class="col-md-6">
          <!-- <h3>Calories Obtained/Burned</h3> -->
        </div>

      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <div class="col-md-6">
                <h2>Total Calories Obtained/Burned by Students</h2>
              </div>

              <div class="col-md-6">
                <div class="input-group-btn show">
                  <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="fa fa-calendar"></i> &nbsp;
                    <span>May 01, 2022 - May 30, 2022</span> <b class="caret"></b>
                  </div>
                  <button id = "btnGenderSelector" type="button" style = "margin-right:0px !important;" class="btn btn-primary btn-sm dropdown-toggle pull-right" data-toggle="dropdown" aria-expanded="true">Gender <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right" role="menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(197px, 38px, 0px);">
                    <li><a class="dropdown-item aGenderSelect" href="Javascript:void(0);">All</a>
                    </li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item aGenderSelect" href="Javascript:void(0);">Male</a>
                    </li>
                    <li><a class="dropdown-item aGenderSelect" href="Javascript:void(0);">Female</a>
                    </li>
              
                  </ul>

                </div>

              </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div id="mainb" style="min-height: 700px"></div>

            </div>
          </div>
        </div>


        <div class="clearfix"></div>
      </div>
    </div>

  </div>