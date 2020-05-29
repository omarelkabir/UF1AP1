<?php
    include "header.php";
?>
        <div class="container">    
            <div class="col col-md-9">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Component</th>
                            <th>Aula</th>
                            <th>Descripcio</th>
                            <th>Creat per </th>
                            <th>Estat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = mysqli_query($con, "SELECT `id`, `date`, `component`, `aula`, `description`, `status`, `createdby` FROM `tbl_incident` WHERE  status='Closed' 
                            ORDER BY date DESC");
                            while($data = mysqli_fetch_assoc($sql)){
                        ?>
                        <tr>
                            <td><?php echo date("d-M-Y", strtotime($data["date"])) ?></td>
                            <td><?php echo $data["component"] ?></td>
                            <td><?php echo $data["aula"] ?></td>
                            <td><?php echo $data["description"] ?></td>
                            <td><?php echo $data["createdby"] ?></td>
                            <td><?php echo $data["status"] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
    </body>
</html>
    
