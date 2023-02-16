SCHEDULE<?php
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
																																		echo "<div class=container>";
                                                                    echo "   <table class='table table-sm table-dark table-hover'>";
																																	echo "	<thead>";
																																	echo "	<tr>";
																																  	echo "	<th>Day</th>";
																																		echo "	<th>Start Time </th>";
																																		echo "	<th>End Time</th>";
																																		echo "  <th>Availability</th>";
																																		echo "  <th>Book Now!</th>";



																																	echo " </tr>";
																																	echo " </thead>";

																																	}

															    echo "<tr>";
																	echo "<td>" . $row['SCHEDULE_Day']. "</td>";
																	 echo "<td>" . $row['SCHEDULE_Start']. "</td>";
																	 echo "<td>" . $row['SCHEDULE_End']. "</td>";
                                  $state="success";
																	 echo "<td><span class='badge badge-".$state."'>" . $row['SCHEDULE_Availability']. "</span></td>";

																//	 echo "<td><a href='book_consultation.php?&appid=" . $row['ScheduleID'] . "&Schedule_Date=".$row['Schedule_Date']."' class='btn btn-".$btnclick." btn-xs' role='button' ".$btnstate.">Book Now</a></td>";

																			$found = 1;

																 ?>
																 <td> <a href="book_consultation.php?&appid=<?php echo $row['SCHEDULE_ID'] ;?>" class="btn btn-primary" role="button" >Book</a></td>
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
																							echo " <i class='fa fa-info-circle'></i>  <strong>No schedule found on this date. Please choose other date.</strong>" ;
																						echo "  </div>";
																					echo "  </div>";
																			 echo "  </div>";
												}







?>
