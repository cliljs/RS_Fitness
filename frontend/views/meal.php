<div class="clearfix"></div>
<!-- slider -->


<!-- slider -->
<div class="x_panel mt-3">
  <div class="x_title">
    <h4><i class="fa fa-cutlery"></i> &nbsp;Meal</h4>
    <h5>Recommended meals for <?php echo $meal_type; ?></h5>
    <div class="container px-2">

      <div class="row">

        <div class="col-md-12 text-right">
          <div class="col-md-12">
            <div class="button-placement d-none d-sm-none d-md-block">
              <a class="btn btn-sm btn-success" href="#carouselPC" role="button" data-slide="prev"> <i class="fa fa-arrow-left"></i> </a>
              <a class="btn btn-sm btn-success" href="#carouselPC" role="button" data-slide="next"> <i class="fa fa-arrow-right"></i> </a>
            </div>
            <div class="button-placement d-md-none d-lg-none d-xl-none">
              <a class="btn btn-sm btn-success" href="#carouselMobile" role="button" data-slide="prev"> <i class="fa fa-arrow-left"></i> </a>
              <a class="btn btn-sm btn-success" href="#carouselMobile" role="button" data-slide="next"> <i class="fa fa-arrow-right"></i> </a>
            </div>
          </div>
        </div>


        <div id="carouselPC" class="carousel slide d-none d-sm-none d-md-block" data-ride="carousel">

          <div class="carousel-inner" id="carouselPCInner">

          </div>


          <div id="carouselMobile" class="carousel slide d-md-none d-lg-none d-xl-none" data-ride="carousel">

            <div class="carousel-inner">


            </div>

          </div>


        </div>

      </div>


    </div>
    <hr>
    <h4 class="mt-3">All Meals</h4>
    <div class="text-right">
      <button class="btn btn-md btn-info" data-toggle="modal" data-target="#mdlCustomMeal"><i class="fa fa-plus"></i>&nbsp; Add Custom Meal</button>
    </div>
    <div class="row">

      <div class="col-md-12">
        <table class="table table-striped table-hover" id="tblMeals">
          <thead>
            <tr>
              <th style="width:10%"></th>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Calories</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tblMealsBody">

          </tbody>
        </table>
      </div>
    </div>

    <hr>
    <h4 class="mt-3">Meals Taken</h4>
    <div class="row">

      <div class="col-md-12">
        <div class="d-flex flex-row-reverse">
          <div class="form-row align-items-center">
            <div class="col-auto">
              <h6>Filter by date taken:</h6>
            </div>
            <div class="col-auto">

              <div class="input-group">
                <input type="date" class="form-control" id="date_taken" name="date_taken" placeholder="Date taken">
              </div>
            </div>
            <div class="col-auto">
              <button id = "btnSeachMyMeals" class="btn btn-primary mb-2"><i class="fa fa-search"></i>&nbsp;Filter</button>
            </div>
          </div>
        </div>

        <table class="table table-striped table-hover" id="tblMyMeals">
          <thead>
            <tr>

              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Calories</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tblMyMealsBody">

          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="modal fade" id="mdlMealInfo" tabindex="-1" role="dialog" aria-labelledby="mdlMealInfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mdlMealInfoLabel">Meal Information</h5>
        </div>
        <div class="modal-body">
          <div class="row p-2">
            <div class="col-md-12 col-lg-6">
              <div class="form-group">
                <img class="img-fluid" id="imgPicture" name="imgPicture" src="https://via.placeholder.com/500">
              </div>

            </div>
            <div class="col-md-12 col-lg-6">
              <div class="form-group row">
                <label>Meal Name</label>
                <input class="form-control" type="text" id="plan_name" name="plan_name">
              </div>
              <div class="form-group row">
                <label>Description</label>
                <input class="form-control" type="text" id="plan_description" name="plan_description">
              </div>

              <div class="form-group row">
                <label>Category</label>
                <input type="text" id="plan_category" name="plan_category" class="form-control">
              </div>


            </div>
          </div>
          <div class="row p-2">
            <div class="col-md-12">
              <hr>
              <div class="form-group row">
                <h3>Meal Ingredients</h3>
              </div>
              <div class="form-group row mt-2">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Ingredient Name</th>
                      <th>Calories</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="tblIngredientsBody">

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <div class="modal fade" id="mdlCustomMeal" tabindex="-1" role="dialog" aria-labelledby="mdlCustomMealLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <form id="frmCustomMeal">
          <div class="modal-header">
            <h5 class="modal-title" id="mdlCustomMealLabel">Custom Meal</h5>
          </div>
          <div class="modal-body">
            <div class="row p-2">
              <div class="col-md-12">
                <div class="form-group row">
                  <label>Date Taken</label>
                  <input class="form-control" type="date" id="meal_date" name="meal_date" required>
                </div>
                <div class="form-group row">
                  <label>Meal Name</label>
                  <input class="form-control" type="text" id="meal_name" name="meal_name" required>
                </div>
                <div class="form-group row">
                  <label>Description</label>
                  <input class="form-control" type="text" id="meal_description" name="meal_description" required>
                </div>

                <div class="form-group row">
                  <label>Category</label>
                  <select id="meal_category" name="meal_category" class="form-control" style="width: 100%;" required>
                    <option selected disabled>Please select a meal category</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Brunch">Brunch</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Afternoon Snack">Afternoon Snack</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Midnight Snack">Midnight Snack</option>
                  </select>
                </div>

                <div class="form-group row">
                  <label>Estimated Calories</label>
                  <input type="number" id="calories_obtained" name="calories_obtained" class="form-control" required>
                </div>

              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>