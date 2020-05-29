<?php
    include "header.php";
    session_start();
    $role = $_SESSION["role"];
    $user = $_SESSION["fullname"];
?>
    <div class="container">    
            
        <div id="signupbox" class="mainbox col-md-6 col-sm-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Crear Incidència</div>
                </div>  
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField"> Data<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" value='<?php echo date('d M Y') ?>' readonly />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-md-4">Component<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8"  style="margin-bottom: 10px">
                                <label class="radio-inline"> <input type="radio" name="txtComponent" value="Computer" style="margin-bottom: 10px">Ordinador </label>
                                <label class="radio-inline"> <input type="radio" name="txtComponent" value="Projector" style="margin-bottom: 10px">Projector </label>
                                <label class="radio-inline"> <input type="radio" name="txtComponent" value="Printer" style="margin-bottom: 10px">Impressora </label>
                                <label class="radio-inline"> <input type="radio" name="txtComponent" value="Scanner" style="margin-bottom: 10px">Scanner </label>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField"> Aula<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" name="txtAula" style="margin-bottom: 10px" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField"> Tipus<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" name="txtType" style="margin-bottom: 10px" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-md-4  requiredField">Descripció:<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                <textarea class="input-md textinput textInput form-control" name="txtDescription" placeholder="Description" style="margin-bottom: 10px"></textarea>
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
                        $txtComponent = $_POST["txtComponent"];
                        $txtAula = $_POST["txtAula"];
                        $txtDescription = $_POST["txtDescription"];
                        $txtName=$_SESSION["fullname"];
                        $type = $_POST["txtType"];
                        $sql = mysqli_query($con, "INSERT INTO tbl_incident(component, aula, description, type, createdby, role) VALUES 
                        ('$txtComponent','$txtAula','$txtDescription', '$type', '$txtName', '$role')");
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
                        <th>Data</th>
                        <th>Component</th>
                        <th>Aula</th>
                        <th>Descripció</th>
                        <th>Creat per</th>
                        <th>Estat</th>
                        <?php
                            if($role=="Admin"){
                        ?>
                        <th>Edita</th>
                        <th>Suprimeix</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <?php
                if($role=="Admin"){
                    $incident = mysqli_query($con, "SELECT id, date, component, aula, description, status, createdby FROM tbl_incident WHERE status<>'Resolved'");
                }else{
                    $incident = mysqli_query($con, "SELECT id, date, component, aula, description, status, createdby FROM tbl_incident WHERE status<>'Resolved' AND createdby='$user'");
                }
                    while($ic=mysqli_fetch_assoc($incident)){
                    ?>
                <tbody>
                    <tr>
                        <td><? echo date("d-M-Y", strtotime($ic["date"])) ?></td>
                        <td><? echo $ic["component"] ?></td>
                        <td><? echo $ic["aula"] ?></td>
                        <td><? echo $ic["description"] ?></td>
                        <td><? echo $ic["createdby"] ?></td>
                        <td><? echo $ic["status"] ?></td>
                        <?php
                            if($role=="Admin"){
                        ?>
                        <td><a class="btn btn-info" href='editincidence.php?id=<? echo $ic["id"] ?>'>Editar</a></td>
                        <td><a class="btn btn-danger" href='model/deleteincidence.php?id=<? echo $ic["id"] ?>' onclick="return confirm('Segur que voleu suprimir-ho?')">Esborrar</a></td>
                        <?php
                            }
                        ?>
                    </tr>
                </tbody>
                <?php
                        }
                ?>
            </table>
        </div>   
        </div>
    </div>Closed
    </body>
</html>
