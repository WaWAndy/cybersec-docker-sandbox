#!/bin/bash

echo "Attente que la base de données soit prête..."

# Attendre que la base de données soit disponible
until PGPASSWORD=$DB_PASS psql -h $DB_HOST -U $DB_USER -d $DB_NAME -c '\q'; do
  >&2 echo "La base de données n'est pas encore prête - en attente..."
  sleep 1
done

>&2 echo "Base de données disponible - Exécution du script de scraping."

# Exécuter le script de scraping Python après que la DB soit prête
python3 /opt/python-scripts/meteo-scrape-psql.py

