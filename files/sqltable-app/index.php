<!-- PHP code to establish connection with the localserver -->
<?php
 
// Username is root
$user = 'sa';
$password = 'RedHat2020!';
 
// Database name is geeksforgeeks
$database = 'pubs';
 
// Server is localhost with
// port number 3306
$servername='dev.home.local, 1443';
$connectionInfo = array( "Database"=>"$database", "UID"=>"$user", "PWD"=>"$password");
$conn = sqlsrv_connect( $servername, $connectionInfo);

if( $conn ) {
     #echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
// SQL query to select data from database
$query = "SELECT [stor_id],[stor_name],[stor_address],[city],[state],[zip] FROM [pubs].[dbo].[stores];";
$result = sqlsrv_query($conn, $query);
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #FE0000;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #FBEEE6;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        <h1>Northwind Pubs</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Store Id</th>
                <th>Store Name</th>
                <th>Store Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['stor_id'];?></td>
                <td><?php echo $rows['stor_name'];?></td>
                <td><?php echo $rows['stor_address'];?></td>
                <td><?php echo $rows['city'];?></td>
                <td><?php echo $rows['state'];?></td>
                <td><?php echo $rows['zip'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>