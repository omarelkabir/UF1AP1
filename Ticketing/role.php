<?php
    include "header.php";
    session_start();
?>
    <div class="container">    
            
        <div id="signupbox" class="mainbox col-md-6 col-sm-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Crear rol d'usuari</div>
                </div>  
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField">Nom del rol<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" name="txtRolename" style="margin-bottom: 10px" required/>
                            </div>
                        </div>
                        
                         <div class="form-group required">
                            <label class="control-label col-md-4 requiredField">Descripció<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <textarea class="input-md textinput textInput form-control" name="txtDescription" style="margin-bottom: 10px" required></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="btnRole" value="Submit" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div> 
                        
                <?php
                    if(isset($_POST["btnRole"])){
                        $Rolename = $_POST["txtRolename"];
                        $Description = $_POST["txtDescription"];
                          
                        $sql = mysqli_query($con, "INSERT INTO tbl_role(role, description) VALUES ('$Rolename','$Description')");
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
                        <th>Rol</th>
                        <th>Descripció</th>
                    </tr>
                </thead>
                <?php
                    $role = mysqli_query($con, "SELECT `id`, role, description FROM `tbl_role` ");
                    while($ic=mysqli_fetch_assoc($role)){
                ?>
                <tbody>
                    <tr>
                        <td><? echo $ic["role"] ?></td>
                        <td><? echo $ic["description"] ?></td>
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
