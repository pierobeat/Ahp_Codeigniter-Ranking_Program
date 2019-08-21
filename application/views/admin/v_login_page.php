<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login Page</title>

        <!-- Bootstrap Core CSS -->
        <link href="startmin-master/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="startmin-master/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="startmin-master/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="startmin-master/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" style="margin-top: 80px;">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Selamat Datang</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="login/aksi_login" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control"
                                         	   placeholder="Username"
                                         	   name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control"
                                               placeholder="Password"
                                               name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-primary btn-block loginbtn">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="startmin-master/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="startmin-master/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="startmin-master/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="startmin-master/js/startmin.js"></script>

    </body>
</html>
