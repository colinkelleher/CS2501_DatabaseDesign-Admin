<html lang="en">
  <head>
	<title class="title">Dreamhome Rental Agency</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="stylesheet" href="../CSS/dreamhome.css" />
    <link rel="icon" href="../favicon.ico" />
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
        	<th colspan="4"><a href="staffoperations.html" class ="home">Staff 			Operations</a></th>
   	</tr>
	</table>

	<h2>Update the phone number corresponding to a staff number</h2>
	<h3>Enter staff number and phone number below</h3>
	<form method="POST">
		Staff Number: <input type="text" name="staffnumber" required><p>
		Select new Branch Number.: <br>B3 <input type="radio" name="bno" value="B3" 		checked> B5 <input type="radio" name="bno" value="B5"> B7 <input type="radio" 			name="bno" value="B7"> B4 <input type="radio" name="bno" value="B4"> B2 		<input type="radio" name="bno" value="B2"><br><br>
	<input type="submit" value="Update Branch">
	</form>

<?php
if (count ($_POST) != 0){
	$staffnumber = $_POST['staffnumber'];
	$branchnumber = $_POST['bno'];

	include "../dreamsetup.php";
	$conn_id = dream_connect ()
 	or die ("Cannot connect to server");

	$query = "UPDATE staff SET Bno  = '$branchnumber'
	"
	."where Sno = '$staffnumber'";
	$result_id = mysqli_query ($conn_id, $query)
	or die ("Cannot execute query");
	if ($result_id){
			print("<p> Staff ID:   <b> " .$staffnumber. " </b>SUCCESSFULLY moved 					to branch<b> ".$branchnumber."</b><p>");
		} else {
			print("<p> Staff ID:   <b> " .$staffnumber. " </b>UNSUCCESSFULLY 					moved to branch<b> ".$branchnumber."</b><p>");
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
