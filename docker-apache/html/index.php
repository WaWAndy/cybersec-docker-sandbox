
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Data</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Adding some inline CSS for spacing */
        form, #city-results { margin-top: 20px; }
        table { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Weather Data</h1>

    <?php
    // Display original data table at the top
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASS');

    try {
        $dsn = "pgsql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $stmt = $pdo->query("SELECT city, temperature, wind_speed, wind_direction, observation_date, observation_time FROM weather_data ORDER BY observation_date DESC, observation_time DESC");

        echo "<table><tr><th>City</th><th>Temperature</th><th>Wind Speed</th><th>Wind Direction</th><th>Date</th><th>Time</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>{$row['city']}</td><td>{$row['temperature']}°C</td><td>{$row['wind_speed']} km/h</td><td>{$row['wind_direction']}</td><td>{$row['observation_date']}</td><td>{$row['observation_time']}</td></tr>";
        }
        echo "</table>";

    } catch (PDOException $e) {
        echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
?>


<div>

<span> Injection sql (SELECT * FROM weather_data) ----->  </span>
<span> ' OR '1'='1' -- </span>


</div>

    <!-- Form to filter by city -->
    <form method="POST" action="">
        <label for="city">(CASE SENSITIVE) Enter City:</label>
        <input type="text" id="city" name="city">
        <input type="submit" value="Submit">
    </form>

    <!-- Div to show search results -->
    <div id="city-results">
        <?php
        try {
            // Check if form is submitted and city input is provided
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['city'])) {
                $city = $_POST['city'];

                // Vulnerable SQL Query for Testing SQL Injection
                $query = "SELECT city, temperature, wind_speed, wind_direction, observation_date, observation_time 
                          FROM weather_data 
                          WHERE city = '$city' 
                          ORDER BY observation_date DESC, observation_time DESC";

                $stmt = $pdo->query($query);

                // Display city results in this div
                echo "<h2>Results for " . htmlspecialchars($city) . ":</h2>";
                if ($stmt->rowCount() > 0) {
                    echo "<table><tr><th>City</th><th>Temperature</th><th>Wind Speed</th><th>Wind Direction</th><th>Date</th><th>Time</th></tr>";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><td>{$row['city']}</td><td>{$row['temperature']}°C</td><td>{$row['wind_speed']} km/h</td><td>{$row['wind_direction']}</td><td>{$row['observation_date']}</td><td>{$row['observation_time']}</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No results found for " . htmlspecialchars($city) . ".</p>";
                }
            }

        } catch (PDOException $e) {
            echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
        ?>
    </div>
</body>
</html>
