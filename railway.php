<html>
<head>
	<title>Welcome</title>
</head>
<body>
<?php
//echo "Hello world!<br>";
 $from=$_POST['FROM1'];
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
$from=trim($from," ");
$sql="SELECT ID ,SOURCE ,DESTINATION FROM Train where SOURCE='".$from."'";
//echo $sql;
$result=$conn->query($sql);
?>
<h1>Welcome to Indian Railways!</h1>
  <form action="railway1.php" method="POST">
 <table>
    <tr>
     <td>
     FROM:
    </td>
      <td>
        <select name="FROM">
            <option value="<?php echo $_POST['FROM1'];?>"><?php echo $_POST['FROM1'];?></option>
        </select>
      </td>
    </tr>
    <tr>
     <td>TO:</td>
     <td>
     	<select name="TO">
            <?php
             while($row=$result->fetch_assoc())
 	         {
 	         	 
                  echo "<option value='$row[DESTINATION]'>$row[DESTINATION]</option>";
 	         	 
 	         }
            ?>
          
     	</select>
     </td>
    </tr>
    <tr>
        <td>
          <a href="transport.html">Back</a>
        </td>
        <td>
           <input type="submit" value="GO" style="float:right;">
        </td>
    </tr>
 </table>
 </form>
</body>
</html>