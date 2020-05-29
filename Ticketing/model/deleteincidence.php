<?php
    include "../connect_db.php";
    
    $id = $_GET["id"];
    $sql = mysqli_query($con, "DELETE FROM `tbl_incident` WHERE `id`='$id'");
    if($sql > 0){
        echo '<script>window.location.href="../incidencies.php";</script>';
    }
?>