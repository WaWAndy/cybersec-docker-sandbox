CREATE TABLE IF NOT EXISTS  weather_data (
    id SERIAL PRIMARY KEY,
    city VARCHAR(50),
    temperature FLOAT,
    wind_speed FLOAT,
    wind_direction VARCHAR(50),
    observation_date DATE,
    observation_time TIME
);

