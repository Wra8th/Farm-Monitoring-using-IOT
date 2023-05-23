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
        // echo "id: " . $row["ID"]. " - Humidity: " . $row["humidity"]. " - temperature: " . $row["temperature"]. " - moisture " . $row["moisture"] . "<br>";
        // $column1 = $row["humidity"];
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- <?php echo "<h1> $column1 </h1>" ?> -->
    <div class="nav-bar">

        <div><a href="/">Home</a></div>
        <div><a href="/temp">T&H</a></div>
        <div><a href="/rain">Rain</a></div>
        <div><a href="/gas">Gas</a></div>

    </div>
    
    <h1>WELCOME TO FARM WATCH</h1>
    <div class="flex-container">
        <div class="splash-image">
            <img src = "images/main.png">
        </div>
        <div class="splash-button">
            <button>CLICK TO CONTINUE</button>
        </div>
        <div id ="content">
</div>  
    </div>
    
    




    <script src="script.js"></script>
</body>
</html>