# cybersec-docker-sandbox

FAIT:

- Conteneur Python
    - Scrape des données sur meteo.be et envoi des données vers la DB.
    - Scrape lors du build pour peupler la DB. 
- Conteneur DB Postgress
     - Création de la DB lors du build.
- Conteneur Apache2
     - Disponible sur le port 8080.
     - Affiche les résultats des scrapes via CSS/HTML et PHP.
     - Champ de recherche par ville pour des tentatives injections SQL (insecure coding, simple POST).
- Conteneur Crontab
     - Cronjobs pour executer des scripts tels que des connexions sur la DB ainsi que des curl et des pings sur le serveur Apache.
- Conteneur Suricata
     - Alertes mises en place pour le ping seulement sur le conteneur Suricata lui même. fast.log ne reprend que les alertes sur suricata. 
- Conteneur Graphana
     - GUI fonctionne sur le port 3000.
     - Possibilité de rajouter Prometheus avec l'adresse http://prometheus:9090 dans les data sources.
- Conteneur Prometheus
     - Disponible en GUI sur le port 9090.
- Conteneur Suricata
     - Ajout de règles dans suricata.rules
- conteneur Nodeexporter
- Conteneur Evebox
- Conteneur pgadmin
    - En vue d'essayer un brute force sur la page d'acceuil.
    - disponible port 5050.
    - Connexion serveur: HOST=db, DB=scraper_db, USER=user, PASSWORD=password  

- WATCHLIST SURICATA 
    - Ping: OK
    - Connection DB: ?
    - COmmandes SQL: ? 
    - Injection SQL: ?
    - Bruteforce: ?


A FAIRE:
- ...
- ...


BUGS/PROBLEMES

- Lors du build du docker-compose, un dossier nomé script se crée et il contient meteo-scrape-psql.py
- Malgré le chipot sur le mode promesucouis de suricata.yml et sur rules.yml on arrive pas a voir sur le fast.log si cron-serveur se connecte sur la db ou ping. Mais fast.log est modifié lorsque l'on ping suricata en lui même. Donc les régles fonctionnenet mais pas possible de "surveiller" les logs d'autres containeurs.

IDEES: 



~                                                                                                                                                                          
~                                

