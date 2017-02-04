<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-do List</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/glyphicons-social.css" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  </head>

  <body class="body">
    <!--Navigation-->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-main" id="nav">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            AGATAR
          </a>
        </div><!--navbar header-->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="list-unstyled nav navbar-nav navbar-right xs-hidden" id="icons-social">
            <li><a href="https://twitter.com/arajczakowska"><span class="social social-twitter item-glyph-footer"></span></a></li>
            <li><a href="https://github.com/agatar"><span class="social social-github item-glyph-footer"></span></a></li>
            <li><a href="https://www.linkedin.com/in/agata-rajczakowska-b097a8130"><span class="social social-linked-in item-glyph-footer"></span></a></li>
          </ul>
       </div><!--navbar-->
      </div><!--/container-->
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
          <h2 class="text-center">TO-DO LIST</h2>
          <hr />
          <p>This application allows you to plan your daily tasks.
              You can create, delete and edit your tasks. Feel free to download the app and use it.</p>
          <p>Technologies used included: HTML, CSS, PHP, jQuery, MYSQL.</p>
          <p>License: MIT</p>
          <br />
              <p class="text-center" ><a href="#" class="btn btn-md btn-primary link">See Demo</a></p>
              <p class="text-center" id="scroll-point"><a href="#" class="link"><span class="glyphicon glyphicon glyphicon-chevron-down glyph-sign"></span></a></p>
        </div><!--/col-sm-6-->
      </div><!--/row-->
    </div><!--/container-fluid-->

    <!--container with icons-->
    <div class="container-fluid container-icons" id="con-icons">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <a class="btn btn-default btn-md" href="https://github.com/agatar/todo-list/archive/master.zip" role="button"><span class='glyphicon glyphicon-download-alt'></span> Download this project </a>
        </div><!--/col-sm-8-->
      </div><!--/row-->
    </div><!--/container-fluid-->

    <!--Main application-->
    <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 panel panel-primary panel-main">
         <h2 class="text-center">TO-DO LIST</h2>

           <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#all-todos-tab" aria-controls="all-todos-tab" role="tab" data-toggle="tab">All to-dos</a></li>
              <li role="presentation"><a href="#new-todo-tab" aria-controls="new-todo-tab" role="tab" data-toggle="tab">New to-do</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">

              <!--First tab - will be dynamically render from database-->
              <div role="tabpanel" class="tab-pane active" id="all-todos-tab">
                <!--Alert success and danger hidden-->
                <div id="display-alert-success" class="alert alert-success hidden"></div>
                <div id="display-alert-error" class="alert alert-danger hidden"></div>

                <div class="text-right" id="btn-clear-all" data-toggle="modal" data-target="#modal-clear-all">
                  <button class="btn btn-danger">Clear All Tasks!</button>
                </div><!--/text-right-->
                <br />

                <!--Dynamically render todos from database-->
                <div id="all-todos-display" class="text-left"></div><!--end of rendering todos-->

                </div><!--/all-todos-tab-->

              <!--Secound tab - will be form to add new task-->
              <div role="tabpanel" class="tab-pane" id="new-todo-tab">
                <form id="new-todo-form">
                  <h4>Add new task</h4>
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
                    <button type="button" id="new-todo-submit" data-loading-text="Loading..." class="btn btn-success">Add new task</button>
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

   <!-- Modal delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="deleteModalLabel">Delete a task</h4>
          </div><!--/modal-header-->
          <div class="modal-body">
              <h5>Do you really want to delete this task?</h5>
              <!--hidden modal field-->
              <input type="hidden" id="modal-delete-id" value="">
          </div><!--/modal-body-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
            <button type="button" class="btn btn-danger" id="modal-delete-button">Yes, sure!</button>
          </div><!--/modal footer-->
        </div><!--/modal conntent-->
      </div><!--modal-dialog-->
    </div><!--modal fade-->

    <!-- Modal edit -->
    <div class="modal fade" tabindex="-1"  id="modal-edit" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit a task</h4>
            </div><!--/modal-header-->
            <div class="modal-body">
               <div class="form-group">
                 <label for="edit-title">Title</label>
                 <!--modal title field-->
                 <input type="text" class="form-control" id="modal-edit-title" placeholder="Title">
               </div><!--/form-group-->
               <div class="form-group">
                 <label for="edit-description">Description</label>
                 <!--modal description field-->
                 <input type="text" class="form-control"  id="modal-edit-description" placeholder="Description">
               </div><!--/form-group-->
               <!--hidden modal item id field-->
               <input type="hidden" id="modal-edit-id" value="">
            </div><!--/modal-body-->

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" id="modal-edit-button">Edit a task</button>
            </div><!--modal-footer-->
          </form>
        </div><!-- /modal-content -->
      </div><!-- /modal-dialog -->
    </div><!-- /modal fade-->

    <!-- Modal clear all-->
    <div class="modal fade" id="modal-clear-all" tabindex="-1" role="dialog" aria-labelledby="ClearModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="clearModalLabel">Clear all tasks</h4>
          </div><!--/modal-header-->
          <div class="modal-body">
            <h5>Do you really want to clear all tasks?</h5>
          </div><!--/modal-body-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="btn-clear">Yes, sure!</button>
          </div><!--modal-footer-->
        </div><!--modal content-->
      </div><!--modal-dialog-->
    </div><!--modal fade-->


    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
