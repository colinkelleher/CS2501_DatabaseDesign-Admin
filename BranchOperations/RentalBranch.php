<html lang="en">
  <head>
	<title class="title">Dreamhome Rental Agency</title>
   	<meta charset="utf-8" />
    	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
    	<link rel="stylesheet" href="../CSS/dreamhome.css" />
    	<link rel="icon" href="../favicon.ico" />
	<style>
	    table, tr, td, th{
		border-collapse: collapse;
		padding: .5em;
		border: 1px solid green;
		text-align: center;
		margin-left: auto;
		margin-right: auto;	
	    }
	</style>
  </head>
  <body> 
    <header>
	   <h1>Dreamhome Rental Agency</h1>
    </header>
	<table style="width:100%" id="table">
    	<tr>
        	<th colspan="4"><a href="../index.html" class ="home">Home Page</a></th>
   	</tr>
    	<tr>
        	<th colspan="4"><a href="branchoperations.html" class ="home">Branch Operations</a></th>
    	</tr>
	</table>
  <body>
  <h2>Select branch below:</h2>
	<form method="post">
Branch No.: B3 <input type="radio" name="bno" value="B3" checked> B5 <input type="radio" name="bno" value="B5"> B7 <input type="radio" name="bno" value="B7"> B4 <input type="radio" name="bno" value="B4"> B2 <input type="radio" name="bno" value="B2"><br><br>
	<input type="submit" value="List properties">
	</form>
	    <br>
<?php
	include "../dreamsetup.php";
		$conn_id = dream_connect ()
 	or die ("Cannot connect to server");
	  if ($_POST){
		$branch = $_POST['bno'];
		$query = ("SELECT Pno, Street, Area, City, Type, Rooms, Rent FROM property_for_rent WHERE Bno = '".$branch."'");
		$result = mysqli_query($conn_id, $query)
			or exit("Cannot execute insert");
		if (mysqli_num_rows($result) > 0){
		$string = "<h2><b>Rental properties managed by branch " .$branch. "</b></h2>";
		$string .= "<table><tr><th>Property Number</th><th>Street</th><th>Area</th><th>City</th><th>Type</th><th>Rooms</th><th>Price</th></tr>";
		while ($row = mysqli_fetch_assoc($result)){
		$string .= ("<tr><td>" .$row["Pno"]. "</td><td>" .$row["Street"]. "</td><td>".$row["Area"]. "</td><td>".$row["City"]. "</td><td>" .$row["Type"]. "</td><td>".$row["Rooms"]. "</td><td>" .$row["Rent"]. "</td></tr>");
				}
		$string .= "</table>";
print($string);
		} else {
			print("<p><b>No properties managed by this branch!</p></b>");
			}
		}
	?>
	</body>
<footer>
        <p> 
            <small>
                   &copy; Colin Kelleher,  University College Cork. All rights reserved.
            </small>
        </p> 
    </footer>
</html>
