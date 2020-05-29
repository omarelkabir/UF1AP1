<?php
    session_start();
    include "header.php";
    
    $id = $_GET["id"];
    $data = mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`, `date`, `component`, `aula`, `description`, `status`, `createdby` FROM `tbl_incident` WHERE id='$id'"));
?>
    <div class="container">    
            
        <div id="signupbox" class="mainbox col-md-6 col-sm-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Crear Incidencia</div>
                </div>  
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="#">
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField"> Data<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="hidden" name="txtid" class="input-md textinput textInput form-control" value='<?php $data["id"] ?>' readonly />
                                <input type="text" name="txtDate" class="input-md textinput textInput form-control" value='<?php echo date('d M Y') ?>' readonly />
                            </div>
                        </div>
                        
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField"> Aula<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" class="input-md textinput textInput form-control" name="txtAula" value='<?php echo $data["aula"] ?>' style="margin-bottom: 10px" readonly />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">Descripció:<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                <textarea class="input-md textinput textInput form-control" name="txtDescription" placeholder="Description" style="margin-bottom: 10px"><?php echo $data["description"] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-md-4 requiredField"> Estat<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <select name="ddlStatus" class="form-control">
                                    <option value="Pending" <?php if($data["status"]=="Pending"){echo "selected";} ?>>Pendent</option>
                                    <option value="Open" <?php if($data["status"]=="Open"){echo "selected";} ?>>Obert</option>
                                    <option value="Closed" <?php if($data["status"]=="Closed"){echo "selected";} ?>>Tancat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div> 
                    <?php
                        if(isset($_POST["btnUpdate"])){
                            $Date = $_POST["txtDate"];
                            $Aula = $_POST["txtAula"];
                            $Description = $_POST["txtDescription"];
                            $Status = $_POST["ddlStatus"];
                            
                            $sql = mysqli_query($con, "UPDATE tbl_incident SET status='$Status' WHERE id='$id'");
                            if($sql>0){
                                if($Status=="Closed"){
                                    $myFile = "historic/historic.txt";
                                    if(strpos(file_get_contents($myFile), '$id') !== false){
                                        echo 'Sorry this id is already exist';
                                    }else{
                                        $fh = fopen($myFile, 'a') or die("can't open file");
                                        $stringData = "$id | $Date | $Aula | $Description | $Status | \n";
                                        fwrite($fh, "\n". $stringData);
                                        fclose($fh);
                                    }
                                }
                              echo '<script>alert("Record updated successfully.");window.location.href="incidencies.php";</script>';
                            }
                        }
                      ?>
                    </form>
                </div>
            </div>
        </div> 
    
    </div>
    </div>
    </body>
</html>
