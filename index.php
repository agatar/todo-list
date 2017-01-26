<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To do List</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  </head>

  <body class="body">
    <!--Navigation-->
    <nav class="navbar navbar-inverse navbar-transparent navbar-fixed-top navbar-main" id="nav">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <h4>AGATAR - TO DO LIST</h4>
          </a>
        </div><!--/navbar header-->
      </div><!--container-->
    </nav>

    <!--Master Background-->
    <div class="container-fluid container-main">
        <div class="row">
          <div class="col-sm-12 master-board">
          </div><!--/col-sm-12-->
        </div><!--row-->
    </div><!--/container-fluid-->

    <!--Container with text-->
    <div class="container-fluid container-text">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h3 class="text-center">TO DO LIST<h3>
          <hr />
          <p>This application gives you opportunity to plan your tasks.
              You can create, delate and edit your tasks. Feel free to download and use it.</p>
              <br /><br />
              <p class="text-center" ><a href="#" class="btn btn-md btn-default link">See Demo</a></p>
              <p class="text-center" id="scroll-point"><a href="#" class="link"><span class="glyphicon glyphicon glyphicon-chevron-down glyph-sign"></span></a></p>
        </div><!--/col-sm-6-->
      </div><!--/row-->
    </div><!--/container-fluid-->

    <!--container with icons-->
    <div class="container-fluid container-icons" id="con-icons">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <a class="btn btn-default btn-md" href="https://github.com/agatar/todo-list/archive/master.zip" role="button"><span class='glyphicon glyphicon-download-alt'></span> Download project </a>
        </div><!--/col-sm-8-->
      </div><!--/row-->
    </div><!--/container-fluid-->

    <!--Main application-->
    <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 panel panel-primary panel-main">
         <h3 class="text-center">TO DO LIST</h3>

           <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#all-todos-tab" aria-controls="all-todos-tab" role="tab" data-toggle="tab">All todos</a></li>
              <li role="presentation"><a href="#new-todo-tab" aria-controls="new-todo-tab" role="tab" data-toggle="tab">New todo</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">

              <!--First tab - will be dynamically render from database-->
              <div role="tabpanel" class="tab-pane active" id="all-todos-tab">
                <!--Alert success and danger hidden-->
                <div id="display-alert-success" class="alert alert-success hidden"></div>
                <div id="display-alert-error" class="alert alert-danger hidden"></div>

                <!--Dynamically render todos from database-->
                <div id="all-todos-display" class="text-left"></div><!--end of rendering todos-->



              </div><!--/all-todos-tab-->

              <!--Secound tab - will be form to add new task-->
              <div role="tabpanel" class="tab-pane" id="new-todo-tab">
                <form id="new-todo-form">
                  <h4>Add new item</h4>
                    <!--error message hidden-->
                    <div id="new-todo-info-error" class="alert alert-danger hidden"></div>
                    <div class="form-group">
                      <label for="new-todo-title">Title</label>
                      <input type="text" class="form-control" id="new-todo-title" placeholder="Title">
                    </div><!--/form-group-->

                    <div class="form-group">
                      <label for="new-todo-description">Description</label>
                      <textarea placeholder="Description" id="new-todo-description" class="form-control" rows="3"></textarea>
                    </div><!--form group-->
                    <button type="button" id="new-todo-submit" data-loading-text="Loading..." class="btn btn-success">Add new item</button>
                    <button type="button" id="new-todo-reset" class="btn btn-primary">Reset</button>
                </form>
              </div><!--/new-task-tab-->
            </div><!--/tabs-content-->
        </div><!--/col-md-6-->
      </div><!--/row-->
    </div><!--/container-->

    <!--FOOTER-->
    <div class="container-fluid container-footer">
     <div class="container">
       <div class="row">
         <div class="col-sm-6 col-sm-offset-3">

         <div class="row">
           <div class="col-sm-6">
              <h6 class="text-center">Coded with <span class="glyphicon glyphicon-heart"></span> by AGATAR</h6>
           </div><!--/col-sm-6-->
           <div class="col-sm-6">
             <h6 class="text-center">Copyright &copy; 2017 AGATAR</h6>
           </div><!--/col-sm-6-->
        <div><!--/row-->

        </div><!--/col-sm-6 col-sm-offset-3-->
      </div><!--/row-->
    </div><!--/container-->
   </div><!--/container-footer-->

    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
