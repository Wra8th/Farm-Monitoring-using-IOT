<?php
// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$dbname = "iot_farm_monitoring";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT * FROM dht_new ORDER BY id DESC LIMIT 1";

// Execute query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - Humidity: " . $row["humidity"]. " - temperature: " . $row["temperature"]. " - moisture " . $row["moisture"] . "<br>";
        $column1 = $row["humidity"];
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "<h1> $column1 </h1>" ?>
</body>
</html>