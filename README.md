# cybersec-docker-sandbox

FAIT:

- Conteneur Python
    - Scrape des données sur meteo.be et envoi des données vers la DB.
    - Scrape lors du build pour peupler la DB. 
- Conteneur DB Postgress
     - Création de la DB lors du build
- Conteneur Apache2
     - afficher les résultats des scrapes via CSS/HTML PHP
- Conteneur Crontab
     - Cronjobs pour executer des scripts tels que des connexions sur la DB ainsi que des curl et des pings sur le serveur Apache.
- Conteneur Suricata
     - Alertes mises en place pour le ping seulement sur le conteneur Suricata lui même. fast.log ne reprend que les alertes sur suricata. 
- Conteneur Graphana
     - GUI fonctionne sur le port 3000
     - Possibilité de rajouter prometheus avec l'adresse http://prometheus:9090 dans les data sources.
- conteneur Prometheus:
     - disponible en GUI sur le port 9090
- contenneur Suricata
     - ajout de règles dans suricata.rules 
- conteneur Evebox

 WATCHLIST SURICATA: 
    - ping: OK
    - connection DB: 
    - effectuer un SELECT: 
    - injection sql: 
    - ... 


A FAIRE:
- ...
- ...


BUGS/PROBLEMES

- lors du build du docker-compose, un dossier nomé script se crée et il contient meteo-scrape-psql.py
- Malgré le chipot sur le mode promesucouis de suricata.yml et sur rules.yml on arrive pas a voir sur le fast.log si cron-serveur se connecte sur la db ou ping. Mais fast.log est modifié lorsque l'on ping suricata en lui même. Donc les régles fonctionnenet mais pas possible de "surveiller" les logs d'autres containeurs.

IDEES: 



~                                                                                                                                                                          
~                                

