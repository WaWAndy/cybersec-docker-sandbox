# Utiliser l'image de base EveBox
FROM jasonish/evebox:latest

# Exposer le port sur lequel EveBox va tourner
EXPOSE 5636

# Démarrer EveBox et garder le conteneur actif avec tail -f /dev/null
# CMD /bin/sh -c "evebox server -D /var/log/suricata/eve.json && tail -f /dev/null"
CMD /bin/sh -c "evebox server datastore filesystem -D /var/log/suricata/eve.json && tail -f /dev/null"

CMD tail -f /dev/null
