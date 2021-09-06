
<?php require 'config.php'?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	/* CSS for all fields of the form */
input[type=text], select, textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=date] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 30px;
}
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 80px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>
</head>
<body>
<form action="" method="post">
<div class="container" style="width:800px; margin:0 auto;">
<h2 style="margin-left:350px">Animal Information</h2>
	<table align="center">
		<tr>
			<td>
				<label align="center">Name of the animal:</label>
			</td>
			<td>
				<input type="text" name="a_name"  required>
			</td>
		</tr>
		
		<tr>
			<td>
				Category:
			</td>
			<td>
				<select name="a_category" name="a_category" required>
						<option></option>
						<option value="herbivores">Herbivores</option>
						<option value="ominivores">Ominivores</option>
						<option value="carnivores">Carnivores</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Image:
			</td>
			<td>
				<input type="file" name="a_image" id="fileToUpload" required>
			</td>
		</tr>
		<tr>
			<td>  
				Description:
			</td>
			<td>
				<textarea id="description" name="a_description" rows="4" cols="50" required></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Life Expectancy:
			</td>
			<td>
				<select name="a_lifeexpentancy" name="a_lifeexpentancy" required>
					<option></option>
					<option value="0-1">0-1 year</option>
					<option value="1-5">1-5 years</option>
					<option value="5-10">5-10 years</option>
					<option value="10+">10+ years</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Date:
			</td>
			<td>
				<input type="date" id="date" name="a_date" required>
			</td>
		</tr>
	</table>
	<div class="g-recaptcha" data-sitekey="6LfmSkccAAAAAHwojnC3IiWBACo8tepOEMHaR5Lj" style="margin-left:280px" >
	</div>
	<br>
	<input type="submit" name="submit" style="margin-left:400px" >
</div>		

    </form>	
	<?php 
	//inserting data 
if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] != ""){
	//recaptcha checking response and validation
	$secret="6LfmSkccAAAAALx4e1HelfVt9BfHQ518HVZUncJ4";
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='. $secret .'&response=' . $_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);
	if($responseData->success){
	// Fetching variables of the form which travels in URL
	$a_name = $_POST['a_name'];
    $a_category = $_POST['a_category'];
    $a_image = $_POST['a_image'];
	$a_description = $_POST['a_description'];
	$a_lifeexpentancy = $_POST['a_lifeexpentancy'];
	$a_date = $_POST['a_date'];

    $sql = "INSERT INTO animal (name,category,image,description,expectancy,date) VALUES ('$a_name','$a_category','$a_image','$a_description','$a_lifeexpentancy','$a_date')";

    if(mysqli_query($conn,$sql)){
		//  To redirect form on a particular page
        echo "<script> alert('New Record Created Successfully');</script>";
		header("Location:/assignment/animals.php");

    } else{
        echo "Error" . $sql . "<br>" . mysqli_error($conn);
    }
	} 
    
}
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>


