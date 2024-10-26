#!/bin/bash
# PostgreSQL test script to test database connectivity
export PGPASSWORD="password"
psql -h db -U user -d weather_db -c "SELECT * FROM weather_data;"
echo '-----------------------------------------------------------------------------------------------------------'

