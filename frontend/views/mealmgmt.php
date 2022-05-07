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
        <tbody>
          <tr>
            <td><img width="50" height="50" src="https://panlasangpinoy.com/wp-content/uploads/2019/03/Beef-Pares-500x485.jpg" alt="meal"></td>
            <td>Fortune</td>
            <td>Awts wala</td>
            <td>Lunch</td>
            <td>300</td>
            <td class="text-right">
              <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
              <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="mealmodal" tabindex="-1" role="dialog" aria-labelledby="mealmodallabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form id="mdlMeal">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mealmodallabel">Add New Meal</h5>
        </div>
        <div class="modal-body">
          <div class="row p-2">
            <div class="col-md-12 col-lg-6">
              <div class="form-group">
                <label for="meal_picture">Meal picture</label>
                <img class="img-fluid" id="imgPicture" name="imgPicture">
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

              <div class="form-group row">
                <label>Ingredient Name</label>
                <input class="form-control" type="text" id="ingredient_name" name="ingredient_name" required>
              </div>
              <div class="form-group row">
                <label>Calories</label>
                <input class="form-control" type="number" id="calorie" name="calorie" required>
              </div>
              <div class="form-group row">
                <button id="btnAddIngredients" class="btn btn-info">Add to list</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>