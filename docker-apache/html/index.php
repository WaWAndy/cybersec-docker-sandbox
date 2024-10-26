<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Weather Data</h1>

    <?php
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
        echo "Error: " . $e->getMessage();
    }
    ?>

</body>
</html>

