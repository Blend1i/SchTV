<!DOCTYPE HTML>
<html>
	<head>
		<title>FSHK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="clcStyle.css">
        <!-- <meta http-equiv="refresh" content="3600;URL="> -->
		<script src="clcJs.js"></script>
		<style>
			th{background-color: #ff5722;color:white}
            #sidebar {
            height:100%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
            }
            html {scroll-behavior: smooth;}    

.marquee-wrapper .container{
  overflow:hidden;
  margin:0 auto !important;
}
.marquee-inner span{
  height:50%;
}
.marquee-wrapper .marquee-block{
  width: 100%;
  height: 1500px;
  overflow: hidden;
  box-sizing: border-box; 
  position: relative;
  padding: 30px 0;
  float:left;
}
.marquee-inner{
  display: block;
  height: 200%;
  width:100%;
  position: absolute;
}
.marquee-inner.to-right{
  animation: marqueeBottom 500s linear infinite;
}
.marquee-item{
  display: block;
  transition: all .5s ease-out;
}
@keyframes marqueeTop{
  from {
    transform: translateY(400%);
  }
  to {
    transform: translateY(-400%);
  }
}
@keyframes marqueeBottom{
  from { 
    transform: translateY(0%);
  }
  to {
    transform: translateY(-800%);
  }
}
 
		</style>
	</head>
		<!-- Content -->
			<div id="content" style="margin-left:220px;padding:20px;">
            <div class="marquee-wrapper">
	        <div class="container">
		    <div class="marquee-block">
			<div class="marquee-inner to-right">
			<span>
				<div class="inner" style="max-width: none;">
					<!-- Post -->
						<article class="box post post-excerpt">
							<div class="table-wrapper" style="width:100%">								
                                <?php include("config.php");
                                $dayToday=date("l");
                                $dayToday="Monday";
                                $dayWeek=date('N', strtotime($dayToday));
                                $scCounter=0;
                                $rot=0; 
                                while($rot<=10){ $rot++;
                                for($i=1;$i<=6;$i++){
                                    //Find how many years a level has.
                                    $NrOfYearsForLevel = array();
                                    $NrOfYearsForLevelQuery = mysqli_query($conn, "SELECT * FROM schedule WHERE s_day='$dayWeek' AND s_level='$i' ");
                                    while($NrOfYearsForLevelRow = mysqli_fetch_array($NrOfYearsForLevelQuery)) { 
                                        $temp=strval($NrOfYearsForLevelRow['s_year']);
                                        if(!in_array($temp, $NrOfYearsForLevel)) $NrOfYearsForLevel[] = $temp;
                                    }
                                    switch($i){
                                        case 1: $Level='Bachelor';break;
                                        case 2: $Level='Master???';break;
                                        case 3: $Level='Bachelor - SEW';break;
                                        case 4: $Level='Bachelor - IE';break;
                                        case 5: $Level='Master - SKIA';break;
                                        case 6: $Level='Master - E-Qeverisja';break;
                                    }
                                    for($j=0;$j<count($NrOfYearsForLevel);$j++){
                                        $ActualYear=$NrOfYearsForLevel[$j];
                                        switch($ActualYear){
                                            case '1': $Year='I';break;
                                            case '2': $Year='II';break;
                                            case '3': $Year='III';break;
                                            case '4': $Year='IV';break;
                                            case '5': $Year='V';break;
                                        }
                                        ?>
                                        <div class="marquee-item">
                                        <table class="alt" style="margin-bottom:80px">
                                        <center><p id="<?php echo $scCounter;?>" style="font-size:30px;font-weight:600;padding-top:20px">Orari për vitin e <?php echo "$Year - $Level" ?></p></center>
                                        <thead>
                                            <tr>
                                                <th>Lënda</th>
                                                <th>Ligj/Usht</th>
                                                <th>Grupi</th>
                                                <th>Ora</th>
                                                <th>Salla</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $scCounter++;
                                        $sqlRow = mysqli_query($conn, "SELECT * FROM schedule WHERE s_day='$dayWeek' AND s_level='$i' AND  s_year='$ActualYear'
                                         ORDER BY s_time ASC");
                                        while($InfoTeMarra = mysqli_fetch_array($sqlRow)) {
                                            switch($InfoTeMarra['s_lecType']){
                                                case 1: $Group='Ligjeratë';break;
                                                case 2: $Group='Ushtrime';break;
                                            }
                                            echo "<tr>";
                                            echo "<td>".$InfoTeMarra['s_subject']."</td>";
                                            echo "<td>".$Group."</td>";
                                            echo "<td>Gr ".$InfoTeMarra['s_group']."</td>";
                                            echo "<td>".$InfoTeMarra['s_time']."</td>";
                                            echo "<td>".$InfoTeMarra['s_class']."</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    echo "</table>";
                                }
                                }
                                ?></div>
							</div>
						</section>
					</article>
				</div>
                </span>
                <span>
				<div class="inner" style="max-width: none;">
					<!-- Post -->
						<article class="box post post-excerpt">
							<div class="table-wrapper" style="width:100%">								
                                <?php include("config.php");
                                $dayToday=date("l");
                                $dayToday="Monday";
                                $dayWeek=date('N', strtotime($dayToday));
                                $scCounter=0;
                                $rot=0; 
                                while($rot<=10){ $rot++;
                                for($i=1;$i<=6;$i++){
                                    //Find how many years a level has.
                                    $NrOfYearsForLevel = array();
                                    $NrOfYearsForLevelQuery = mysqli_query($conn, "SELECT * FROM schedule WHERE s_day='$dayWeek' AND s_level='$i' ");
                                    while($NrOfYearsForLevelRow = mysqli_fetch_array($NrOfYearsForLevelQuery)) { 
                                        $temp=strval($NrOfYearsForLevelRow['s_year']);
                                        if(!in_array($temp, $NrOfYearsForLevel)) $NrOfYearsForLevel[] = $temp;
                                    }
                                    switch($i){
                                        case 1: $Level='Bachelor';break;
                                        case 2: $Level='Master???';break;
                                        case 3: $Level='Bachelor - SEW';break;
                                        case 4: $Level='Bachelor - IE';break;
                                        case 5: $Level='Master - SKIA';break;
                                        case 6: $Level='Master - E-Qeverisja';break;
                                    }
                                    for($j=0;$j<count($NrOfYearsForLevel);$j++){
                                        $ActualYear=$NrOfYearsForLevel[$j];
                                        switch($ActualYear){
                                            case '1': $Year='I';break;
                                            case '2': $Year='II';break;
                                            case '3': $Year='III';break;
                                            case '4': $Year='IV';break;
                                            case '5': $Year='V';break;
                                        }
                                        
                                        ?>
                                        <div class="marquee-item">
                                        <table class="alt" style="margin-bottom:80px">
                                        <center><p id="<?php echo $scCounter;?>" style="font-size:30px;font-weight:600;padding-top:20px">Orari për vitin e <?php echo "$Year - $Level" ?></p></center>
                                        <thead>
                                            <tr>
                                                <th>Lënda</th>
                                                <th>Ligj/Usht</th>
                                                <th>Grupi</th>
                                                <th>Ora</th>
                                                <th>Salla</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $scCounter++;
                                        $sqlRow = mysqli_query($conn, "SELECT * FROM schedule WHERE s_day='$dayWeek' AND s_level='$i' AND  s_year='$ActualYear'
                                         ORDER BY s_time ASC");
                                        while($InfoTeMarra = mysqli_fetch_array($sqlRow)) {
                                            switch($InfoTeMarra['s_lecType']){
                                                case 1: $Group='Ligjeratë';break;
                                                case 2: $Group='Ushtrime';break;
                                            }
                                            echo "<tr>";
                                            echo "<td>".$InfoTeMarra['s_subject']."</td>";
                                            echo "<td>".$Group."</td>";
                                            echo "<td>Gr ".$InfoTeMarra['s_group']."</td>";
                                            echo "<td>".$InfoTeMarra['s_time']."</td>";
                                            echo "<td>".$InfoTeMarra['s_class']."</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    echo "</table>";
                                }
                            }
                                ?></div>
							</div>
						</section>
					</article>
				</div>
                </span>
			</div>
            
		<!-- Sidebar -->
			<div id="sidebar" style="background-color: #2a3140;text-shadow:none;">
				<!-- Logo -->
				<a href="" class="image featured"><img src="logoUni.png" alt="" /></a>

				<!-- Calendar -->
					<section class="box calendar" >
						<div class="inner" style='background-color: #ff5722;'>
							<table>
								<?php 
                                $todayD=date("d.m.Y");
                                $day=date("l");
                                switch($day){
                                    case 'Monday': $daySq="e Hënë";break;
                                    case 'Tuesday': $daySq="e Martë";break;
                                    case 'Wednesday': $daySq="e Mërkurë";break;
                                    case 'Thursday': $daySq="e Enjte";break;
                                    case 'Friday': $daySq="e Premte";break;
                                    case 'Saturday': $daySq="e Shtunë";break;
                                    case 'Sunday': $daySq="e Diel";break;
                                }
                                $todayDate = explode('.', $todayD);
                                $month=$todayDate['1'];
                                switch($month){
                                    case '1': $month="Janar";break;
                                    case '2': $month="Shkurt";break;
                                    case '3': $month="Mars";break;
                                    case '4': $month="Prill";break;
                                    case '5': $month="Maj";break;
                                    case '6': $month="Qershor";break;
                                    case '7': $month="Korrik";break;
                                    case '8': $month="Gusht";break;
                                    case '9': $month="Shtator";break;
                                    case '10': $month="Tetor";break;
                                    case '11': $month="Nëntor";break;
                                    case '12': $month="Dhjetor";break;
                                }
                                echo "<caption style='font-size:18px'>$todayDate[1] / $month / $todayDate[2]</caption>";
                                ?>
							</table>
						</div>
						<div id="clockContainer" style="width:180px;margin:18px 0">
							<div id="hour"></div>
							<div id="minute"></div>
							<div id="second"></div>
						</div>
                        <div class="inner " style='background-color: #ff5722;'>
							<table>
								<?php 
                                echo "<caption style='font-size:18px'>Orari për ditën $daySq</caption>";
                                ?>
							</table>
						</div>
					</section>
				<ul id="copyright">
					<li>&copy;UKZ-FSHK</li><li>Developed by:<br> Donat Dalipi & Blend Kurti</li>
                    <li>Buen Bajrami, Shkurte Rexhepaj, Lirie Daku, Lumnije Aliu, Ljiridon Aljimi, Dalina Ibrahimi, Januz Hajrullahu</li>
				</ul>
			</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>