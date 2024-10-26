#!/bin/sh

# Exécute le script Python une seule fois
python3 /opt/python-scripts/meteo-scrape-psql.py

echo 'Bonjour depuis le script bash first_scrape.sh '

# Ensuite, exécute la commande que l'utilisateur veut (par exemple, une commande par défaut ou un shell)
# exec "$@"
