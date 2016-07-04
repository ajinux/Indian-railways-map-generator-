<?php
$from=$_POST['FROM'];
$to=$_POST['TO'];
echo "FROM $from to $to";

 $servername="localhost";
 $username="root";
 $password="myroot";
 $dbname="Transportation";

 $conn=new mysqli($servername,$username,$password,$dbname);

 if($conn->connect_error)
  {
 	die("Connection error :".$conn->connect_error);
  }
 $from= $conn->real_escape_string($from);
 $to= $conn->real_escape_string($to);
 $from=trim($from," ");
 $to=trim($to," ");

 $sql="SELECT ID ,SOURCE ,DESTINATION FROM Train where SOURCE='".$from."' and DESTINATION='".$to."'";


$result=$conn->query($sql);
echo "<br> No of Trains available :".$result->num_rows." <br>";
if($result->num_rows>0)
 {
 	
 ?>
  <table border="2" style= "color: #761a9b; margin: 0 auto;">
  	<thead style="color: #1E2D1E;">
     <tr>
        <th>FROM</th>
        <th>TO</th>
        <th>Train NO</th>
        <th>Train Name</th>
        <th>Train Source</th>
        <th>Arival Time</th>
        <th>Destination Time</th>
        <th>Total Distance</th>
     </tr>
  	</thead>
 <?php
 	while($row=$result->fetch_assoc())
 	{
 		$sql1="SELECT * from Train_details where ID=".$row['ID']."";
         $train_det=$conn->query($sql1);
         $row1=$train_det->fetch_assoc();
 		 
 ?>
         
         <tr>
              <td><?php echo $row['SOURCE']; ?></td>
              <td><?php echo $row['DESTINATION']; ?></td>
              <td><?php echo $row1['Train_no']; ?></td>
              <td><?php echo $row1['Train_name']; ?></td>
              <td><?php echo $row1['Train_source']; ?></td>
              <td><?php echo $row1['Arival_time']; ?></td>
              <td><?php echo $row1['Destination_time']; ?></td>
              <td><?php echo $row1['Distance']."Km"; ?></td>

         </tr>

 <?php
 }
 ?>
 	</table>

 <?php
 }
 else
 {
 	echo "<br>No Train from $from to $to";
 }      $from=strtolower($from);
        $address = $from.",India"; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        //echo "<br><br>".$geocode;
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        print "<br>FROM-->Latitude :".$latitude."Longitude :".$longitude;
        $to=strtolower($to);
        $address = $to.", India";//str_replace(' ','+',$address);
        //echo "<br>Address:".$address;
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        //echo "<br><br>".$geocode;
        $output= json_decode($geocode);
        $latitude1 = $output->results[0]->geometry->location->lat;
        $longitude1 = $output->results[0]->geometry->location->lng;
        print "<br><br>TO-->Latitude :".$latitude1."Longitude :".$longitude1;

        echo '
         <form action="googlemap.php" method="POST">
             <input type="Hidden" name="fromlat" value="'.$latitude.'" checked> 
             <input type="Hidden" name="fromlong" value="'.$longitude.'" checked>
             <input type="Hidden" name="tolat" value="'.$latitude1.'" checked>
             <input type="Hidden" name="tolong" value="'.$longitude1.'" checked>
             <input type="submit" value="Map" style="float:right;">
        </form>
        ';
        
?>