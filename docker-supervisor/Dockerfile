# Utiliser une image de base légère comme Ubuntu
FROM ubuntu:22.04

# Mise à jour et installation de Cron, Ping, Curl, PostgreSQL client
RUN apt-get update && apt-get install -y cron iputils-ping curl postgresql-client

# Copier les fichiers crontab pour planifier les tests
COPY crontab-supervisor /etc/cron.d/crontab-supervisor

# Donner les permissions appropriées au fichier crontab
RUN chmod 0644 /etc/cron.d/crontab-supervisor

# Copier les scripts de test dans le conteneur
COPY scripts/*.sh /usr/local/bin/

# create the log file to be able to run tail

RUN touch /var/log/cron.log

# Donner les permissions d'exécution aux scripts
RUN chmod +x /usr/local/bin/*.sh

# Commande pour démarrer le service cron et suivre les logs dans le conteneur
CMD cron && tail -f /var/log/cron.log

