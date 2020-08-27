<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
</head>
<style>
  .navbar-inverse
  {
      background:#00796B;
      border-bottom-color: #004D40;
  }
  .navbar-inverse .navbar-nav>li>a,.navbar-inverse .navbar-brand,.navbar-inverse .navbar-nav>.dropdown>a .caret
  {
      color: #fff;
  }
  .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus,
  .navbar-nav>li>.dropdown-menu
  {
      background:#4DB6AC;
  }
  .nav-pills>li>a,
  {
      color: #303F9F;
  }

  .nav>li>a:hover, .nav>li>a:focus
  {
      background-color: #EEEEEE;
  }
</style>
<body>
  <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
      <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Dashboard</a>
          </div>
          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                      <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> <?php $_SESSION['user'] = $logged_in_user;?> <span class="caret"></span></a>
                  </li>
                  <li><a href="login.php"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
          </div>
      </div>
      <!-- /container -->
  </div>

  <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

      <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
          <!--<li class="nav-header"></li>-->
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="#"><i class="fa fa-tags"></i> Referal Code</a></li>
          <li><a href="#"><i class="fa fa-history"></i> Redeem History</a></li>
          <li><a href="#"><i class="fa fa-lock"></i> Change Password</a></li>

      </ul>
  </div><!-- /span-3 -->

  <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
      <!-- Right -->

      <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
      <hr>
  </div>
</body>
</html>