<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `doctors_data` WHERE CONCAT(`Doctor_Name`, `Hospital_Name`, `Qualification`, `Location`, `Last_Updated_Date`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `doctors_data`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "Revenant.2092", "santosh");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Medinfi Healthcare Pvt Ltd </title>
		<link rel="shortcut icon" href="title.png" type="image/png">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body background="backgrod_filter.png">
        <p>
			<h1 align="center" style="font-size:300%;"> <img src="logo.png" alt="logo" style="width:40px;height:40px;"/>Medinfi Healthcare Pvt Ltd </h1>
		</p>
        <form action="data_filter.php" method="post">
			<p>
				<b>Enter a keyword to search:</b> <input type="text" name="valueToSearch" placeholder="Value To Search">
				<input type="submit" name="search" value="Filter" style="color: black;"><br><br>
            </p>
            <table>
                <tr>
                    <th bgcolor="yellow">Doctor_Name</th>
                    <th bgcolor="yellow">Hospital_Name</th>
                    <th bgcolor="yellow">Qualification</th>
                    <th bgcolor="yellow">Location</th>
					<th bgcolor="yellow">Last_Updated_Date</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td align="left"><?php echo $row['Doctor_Name'];?></td>
                    <td align="left"><?php echo $row['Hospital_Name'];?></td>
                    <td align="left"><?php echo $row['Qualification'];?></td>
                    <td align="left"><?php echo $row['Location'];?></td>
					<td align="left"><?php echo $row['Last_Updated_Date'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
