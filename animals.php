<?php require 'config.php'?>
<!DOCTYPE html>
<html>
<head>
<style>
/* CSS for List View and Fields   */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 30px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align:center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2 style="margin-left:600px">Animal Details</h2>
<?php 
        //getting sortable data by date of submission and alphabetically
        $sql = "SELECT id, name, category, image, description, expectancy, date FROM animal order by date, expectancy ASC";
        $result = mysqli_query($conn,$sql);
?>
<div class="container" style="width:1200px; margin:0 auto;">
        
        <table>
            <tr>
                <th>Id</th>
                <th>Animal Name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Description</th>
                <th>Life Expectancy</th>
                <th>Date of Submission</th>
            </tr>
            
                <?php
                    //fetching data from database
                            if(mysqli_num_rows($result)>0){
                                while($animal = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                    <td><?php echo $animal['id'];?></td>
                                    <td><?php echo $animal['name'];?></td>
                                    <td><?php echo $animal['category'];?></td>
                                    <td><img src="images/<?php echo $animal['image'];?>" width="50" height="50"></td>
                                    <td><?php echo $animal['description'];?></td>
                                    <td><?php echo $animal['expectancy'];?></td>
                                    <td><?php echo $animal['date'];?></td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo "0 result";
                            }
                ?>
        </table>
    
</div>
</body>
</html>
