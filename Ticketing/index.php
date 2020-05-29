<?php
    session_start();
    include "connect_db.php";
?>
<html>
    <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    </head>
    <body>
        <div class="container">    
            <div id="loginbox" style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title text-center">Sign In</div>
                    </div>     
    
                    <div style="padding-top:30px" class="panel-body" >
    
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="#" method="post">
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="txtEmail" placeholder="email">                                        
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="txtPassword" placeholder="password">
                            </div>
    
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                  <button type="submit" id="btn-login" href="#" class="btn btn-success">Login</button>

                                </div>
                            </div>   
                            <?php
                                $Email = $_POST["txtEmail"];
                                $Password = md5($_POST["txtPassword"]);
                                
                                $sql = mysqli_query($con, "SELECT id, firstname, lastname, email, password, role FROM tbl_user WHERE email='$Email' AND password='$Password' ");
                                
                                if(mysqli_num_rows($sql) > 0){
                                    $data = mysqli_fetch_assoc($sql);
                                    $_SESSION["fullname"] = $data["firstname"]." ".$data["lastname"];
                                    $_SESSION["role"] = $data["role"];
                                    if($data["role"]=="Admin"){
                                        echo '<script>window.location.href="dashboard.php";</script>';
                                    }else if($data["role"]=="Student"){
                                        echo '<script>window.location.href="incidencies.php";</script>';
                                    }else if($data["role"]=="Teacher"){
                                        echo '<script>window.location.href="incidencies.php";</script>';
                                    }
                                    
                                }
                            ?>
                        </form>     
    
                    </div>                     
                </div>  
            </div>
        </div>
    </body>
</html>