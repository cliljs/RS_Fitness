<div class="clearfix"></div>

<div class="x_panel mt-3">
  <div class="x_title">
    <h4><i class="fa fa-cutlery"></i> &nbsp;Meal Management</h4>
    <div class="text-right">
      <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#mealmodal" data-backdrop="static"><i class="fa fa-plus"></i>&nbsp;Add New Meal</button>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-hover" id="tblMealMgmt">
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
        <tbody id="tblMealMgmtBody">


        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="mealmodal" tabindex="-1" role="dialog" aria-labelledby="mealmodallabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form id="mdlMealRegister">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mealmodallabel">Add New Meal</h5>
        </div>
        <div class="modal-body">
          <div class="row p-2">
            <div class="col-md-12 col-lg-6">
              <div class="form-group">

                <img class="img-fluid" id="imgPicture" name="imgPicture" src="https://via.placeholder.com/500">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" accept=".jpg, .png, .jpeg, .bmp" class="custom-file-input" id="meal_picture" name="meal_picture" onchange="loadFile(event)">
                    <label class="custom-file-label" for="meal_picture">Choose Image</label>
                  </div>

                </div>
              </div>

            </div>
            <div class="col-md-12 col-lg-6">
              <div class="form-group row">
                <label>Meal Name</label>
                <input class="form-control" type="text" id="plan_name" name="plan_name" required>
              </div>
              <div class="form-group row">
                <label>Description</label>
                <input class="form-control" type="text" id="plan_description" name="plan_description" required>
              </div>

              <div class="form-group row">
                <label>Category</label>
                <select id="plan_category" name="plan_category" class="form-control" style="width: 100%;">
                  <option selected disabled>Please select a meal category</option>
                  <option value="Breakfast">Breakfast</option>
                  <option value="Brunch">Brunch</option>
                  <option value="Lunch">Lunch</option>
                  <option value="Afternoon Snack">Afternoon Snack</option>
                  <option value="Dinner">Dinner</option>
                  <option value="Midnight Snack">Midnight Snack</option>
                </select>

              </div>


            </div>
          </div>
          <div class="row p-2">
            <div class="col-md-12">
              <hr>
              <div class="form-group row">
                <h3>Meal Ingredients</h3>
              </div>
              <div class="row p-1">
                <div class="col-sm-12 col-md-7">
                  <div class="form-group row">
                    <label>Ingredient Name</label>
                    <input class="form-control" type="text" id="ingredient_name" name="ingredient_name">
                  </div>
                </div>
                <div class="col-sm-12 col-md-1 p-1">

                </div>
                <div class="col-sm-12 col-md-4">
                  <div class="form-group row">
                    <label>Calories</label>
                    <input class="form-control" type="number" id="calorie" name="calorie">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 text-right" style="padding-right:0px;">
                  <a id="btnAddIngredients" class="btn btn-info" href="Javascript:void(0)">Add to list</a>
                </div>
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
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
    </form>
  </div>
</div>



<!--test -->

<div class="carousel-item active">
  <div class="row">
    <div class="col-md-3">
      <div class="product-block"><img class="d-block w-100 mb-2" src="https://via.placeholder.com/800x400" alt="Product">
        <div class="product-info">
          <h4>Meal Name</h4>
          <p><button class="btn btn-outline-secondary btn-sm">200 Calories</button></p>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at ex sed neque luctus pulvinar in quis augue. Integer eget neque sollicitudin, accumsan augue id, volutpat lectus.</p>
          <div class="row">
            <div class="col-md-12 text-right"> <button data-id="27" class="btnAddMeal btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;Add to daily meal</button> <button data-id="27" class="btnViewMeal btn btn-sm btn-secondary"><i class="fa fa-view"></i>&nbsp;More Details</button> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-md-3">
          <div class="product-block"><img class="d-block w-100 mb-2" src="https://via.placeholder.com/800x400" alt="Product">
            <div class="product-info">
              <h4>Meal Name</h4>
              <p><button class="btn btn-outline-secondary btn-sm">200 Calories</button></p>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at ex sed neque luctus pulvinar in quis augue. Integer eget neque sollicitudin, accumsan augue id, volutpat lectus.</p>
              <div class="row">
                <div class="col-md-12 text-right"> <button data-id="29" class="btnAddMeal btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;Add to daily meal</button> <button data-id="29" class="btnViewMeal btn btn-sm btn-secondary"><i class="fa fa-view"></i>&nbsp;More Details</button> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-3">
              <div class="product-block"><img class="d-block w-100 mb-2" src="https://via.placeholder.com/800x400" alt="Product">
                <div class="product-info">
                  <h4>Meal Name</h4>
                  <p><button class="btn btn-outline-secondary btn-sm">200 Calories</button></p>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at ex sed neque luctus pulvinar in quis augue. Integer eget neque sollicitudin, accumsan augue id, volutpat lectus.</p>
                  <div class="row">
                    <div class="col-md-12 text-right"> <button data-id="30" class="btnAddMeal btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;Add to daily meal</button> <button data-id="30" class="btnViewMeal btn btn-sm btn-secondary"><i class="fa fa-view"></i>&nbsp;More Details</button> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-3">
                  <div class="product-block"><img class="d-block w-100 mb-2" src="https://via.placeholder.com/800x400" alt="Product">
                    <div class="product-info">
                      <h4>Meal Name</h4>
                      <p><button class="btn btn-outline-secondary btn-sm">200 Calories</button></p>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at ex sed neque luctus pulvinar in quis augue. Integer eget neque sollicitudin, accumsan augue id, volutpat lectus.</p>
                      <div class="row">
                        <div class="col-md-12 text-right"> <button data-id="28" class="btnAddMeal btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;Add to daily meal</button> <button data-id="28" class="btnViewMeal btn btn-sm btn-secondary"><i class="fa fa-view"></i>&nbsp;More Details</button> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="product-block"><img class="d-block w-100 mb-2" src="https://via.placeholder.com/800x400" alt="Product">
                        <div class="product-info">
                          <h4>Meal Name</h4>
                          <p><button class="btn btn-outline-secondary btn-sm">200 Calories</button></p>
                          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at ex sed neque luctus pulvinar in quis augue. Integer eget neque sollicitudin, accumsan augue id, volutpat lectus.</p>
                          <div class="row">
                            <div class="col-md-12 text-right"> <button data-id="26" class="btnAddMeal btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;Add to daily meal</button> <button data-id="26" class="btnViewMeal btn btn-sm btn-secondary"><i class="fa fa-view"></i>&nbsp;More Details</button> </div>
                          </div>
                        </div>
                      </div>
                    </div>