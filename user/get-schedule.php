<?php
include("connect.php");

 $found =0;
 $header =0;


		$res = mysqli_query($connect,"SELECT * FROM consultation_schedule ");


$date = $_GET['consultdate'];


				 while ($row = mysqli_fetch_assoc($res) )
								 {

										 if(  $row['SCHEDULE_Date'] == $date &&  $row['SCHEDULE_Availability']=="Available" )
													{  $header++;
																																	if ($header ==1 ) {
																																		echo "<div class=containerGetSce style='overflow-x:auto; '>";
                                                                                                                                        echo "   <table class='table table-sm table-hover'>";
																																	echo "	<thead>";
																																	echo "	<tr class='tableGetScheduleCol'>";
																																  	echo "	<th class='tableGetScheduleCol'>Day</th>";
																																		echo "	<th class='tableGetScheduleCol'>Start Time </th>";
																																		echo "	<th class='tableGetScheduleCol'>End Time</th>";
																																		echo "  <th class='tableGetScheduleCol'>Availability</th>";
																																		echo "  <th class='tableGetScheduleCol'>Book Now!</th>";



																																	echo " </tr class='tableGetSchedule'>";
																																	echo " </thead>";

																																	}

															    echo "<tr class='tableGetSchedule'>";
																	echo "<td>" . $row['SCHEDULE_Day']. "</td>";
																	 echo "<td>" . $row['SCHEDULE_Start']. "</td>";
																	 echo "<td>" . $row['SCHEDULE_End']. "</td>";
                                  $state="success";
																	 echo "<td class='SceAvai'><span class='badge badge-".$state."'>" . $row['SCHEDULE_Availability']. "</span></td>";

																//	 echo "<td><a href='book_consultation.php?&appid=" . $row['ScheduleID'] . "&Schedule_Date=".$row['Schedule_Date']."' class='btn btn-".$btnclick." btn-xs' role='button' ".$btnstate.">Book Now</a></td>";

																			$found = 1;

																 ?>

																 <td class='SceAvai'> <a href="book-consultation.php?&appid=<?php echo $row['SCHEDULE_ID'] ;?>" class="btnGet" role="button" >Book</a></td>
			 <?php
													 }

							 }

							 echo "</tr>";
							echo "</table>";
							 echo "</div>";

												if ( $found == 0)
												 {
																			echo "<div class='row'>";
																					echo "<div class='col-lg-12'>";
																						echo "<div class='alert alert-danger alert-dismissable'>";
																							echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
																							echo " <i class='fa fa-info-circle' ></i>  <strong >No schedule found on this date. Please choose other date.</strong>" ;
																						echo "  </div>";
																					echo "  </div>";
																			 echo "  </div>";
												}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .SceAvai span{
            font-size: 20px;
            color: #4CAF50;
            background-color:transparent;
        }

        .btnGet{
            padding: 8px;
            background-image: linear-gradient(to right top, #bc49bc, #b23dbb, #a730bb, #9b22bb, #8e11bb);
            color: white;
            border-radius: 20px;
            margin-left: 25px;
        }

        .btnGet:hover {
            background-image: linear-gradient(to right top, #bb1ee7, #d396e9);
            text-decoration: none;
            color: white;
        }

        .containerGetSce{
            width: 100%;
        }
        .tableGetSchedule{
            font-size: 20px;

        }

        .tableGetScheduleCol{
            font-size: 20px;

        }
    </style>
</head>
