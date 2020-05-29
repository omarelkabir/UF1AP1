<?php
    include "header.php";
    session_start();
?>
    <div class="container">    
            
        <div id="signupbox" class="mainbox col-md-6 col-sm-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Crear usuario</div>
                </div>  
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField">Nom<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" name="txtFirstname" style="margin-bottom: 10px" required/>
                            </div>
                        </div>
                         <div class="form-group required">
                            <label class="control-label col-md-4 requiredField">Cognom<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" name="txtLastname" style="margin-bottom: 10px" required/>
                            </div>
                        </div>
                         <div class="form-group required">
                            <label class="control-label col-md-4 requiredField">Contrasenya<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" name="txtPassword" style="margin-bottom: 10px" required/>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField">Email<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="email" class="input-md textinput textInput form-control" name="txtEmail" style="margin-bottom: 10px" required/>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField">Rol d'usuari (permisos) <span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <select class="input-md textinput textInput form-control" name="txtRole" style="margin-bottom: 10px" required>
                                    <option value="">Seleccionar rol usuari</option>
                                    <?php
                                        $role = mysqli_query($con, "SELECT `id`, role, description FROM `tbl_role` ");
                                        while($rl=mysqli_fetch_assoc($role)){
                                    ?>
                                    <option value='<?php echo $rl["role"] ?>'><?php echo $rl["role"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                      
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Submit" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div> 
                        
                <?php
                     if(isset($_POST["Signup"])){
                      $firstname = $_POST["txtFirstname"];
                      $lastname = $_POST["txtLastname"];
                      $password = md5($_POST["txtPassword"]);
                      $email= $_POST["txtEmail"];
                      $role= $_POST["txtRole"];
                      
                      $sql = mysqli_query($con, "INSERT INTO `tbl_user`(`firstname`, `lastname`, `email`, `password`, `role`) VALUES ('$firstname','$lastname','$email','$password','$role')");
                      if($sql>0){
                          echo "<meta http-equiv=refresh content='0'>";
                      }
                  }
                  ?>
                    </form>
                </div>
            </div>
        </div> 
    
    </div>
    <div class="container">
        <div iclass="mainbox col-md-9 col-sm-9">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Cognom</th>
                        <th>Email</th>
                        <th>Rol d'usuari</th>
                    </tr>
                </thead>
                <?php
                        $users = mysqli_query($con, "SELECT `firstname`, `lastname`, `email`, `password`, `role` FROM `tbl_user`");
                        while($ic=mysqli_fetch_assoc($users)){
                        ?>
                <tbody>
                    <tr>
                        <td><? echo $ic["firstname"] ?></td>
                        <td><? echo $ic["lastname"] ?></td>
                        <td><? echo $ic["email"] ?></td>
                        <td><? echo $ic["role"] ?></td>
                    </tr>
                </tbody>
                <?php
                        }
                ?>
            </table>
        </div>   
        </div>
    </div>
    </body>
</html>
