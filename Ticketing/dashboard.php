<?php
    include "header.php";
?>
<style>
    .fonts{
        font-size:18px;
    }
</style>
			<div class="col col-md-9">
				<div class="row">
					<div class="col col-md-8 fonts">
					    
						<h2>Estadístiques d'avui:</h2>
						<?php
						$totdayinc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(id) total FROM tbl_incident"));
						$todaytotalincident = $totdayinc["total"];
						?>
						<h3>Total d’incidències <span class="pull-right strong"><?php echo $todaytotalincident ?></span></h3>
					
						<?php
						$pnd = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(id) mid FROM tbl_incident WHERE status='Pending' "));
				        $pendingincident = $pnd["mid"];
						?>
						<h3>Percentatge d’incidències pendents<span class="pull-right strong"> <?php echo round($pendingincident / ($todaytotalincident / 100),2); ?>%</span></h3>
						 
				    	<?php
						$teacher = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(id) mid FROM tbl_incident WHERE role='Teacher'"));
				        $teacherincident = $teacher["mid"];
						?>
						<h3>Percentatge d’incidències (professor)<span class="pull-right strong"> <?php echo round($teacherincident/($todaytotalincident / 100),2);?>%</span></h3>
						<?php
						$student = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(id) mid FROM tbl_incident WHERE role='Student' "));
				        $srudentincident = $student["mid"];
						?>
						<h3>Percentatge d’incidències (Estudiant)<span class="pull-right strong"> <?php echo round($srudentincident/($todaytotalincident / 100),2);?>%</span></h3>
						
						<?php
						$admin = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(id) mid FROM tbl_user WHERE role='Admin' "));
				        $administratorincident = $admin["mid"];
						?>
						<h3>Percentatge d’incidències (Administrador)<span class="pull-right strong"> <?php echo round($administratorincident/($todaytotalincident / 100),2);?>%</span></h3>
						<h2>Tipus d’incidències</h2>
						<ul>
						    <?php
						        $types = mysqli_query($con, "SELECT DISTINCT type FROM tbl_incident");
						            while($incident = mysqli_fetch_assoc($types)){
						    ?>
						    <li><?php echo $incident["type"] ?></li>
						    <?php
						        }
						        ?>
						</ul>
					</div>
					
				</div>
			</div>
			
			
		</div>
	</body>
</html>
