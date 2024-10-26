# Utiliser l'image de base officielle PostgreSQL
FROM postgres:latest

RUN apt-get update && apt-get upgrade -y && apt-get install -y net-tools iputils-ping vim at mc

# Définir les variables d’environnement pour PostgreSQL (elles seront remplacées par le fichier .env)
ENV POSTGRES_USER=${POSTGRES_USER}
ENV POSTGRES_PASSWORD=${POSTGRES_PASSWORD}
ENV POSTGRES_DB=${POSTGRES_DB}

COPY table_create_weather_data.sql ./

ENV PGPASSWORD=$POSTGRES_PASSWORD 


# Exposer le port 5432 pour PostgreSQL
EXPOSE 5432

# Lancement de PostgreSQL
# RUN ["postgres"]



# RUN sleep 30 ; psql -h localhost -U $POSTGRES_USER -d $POSTGRES_DB ./table_create_weather_data.sql

CMD ["postgres"]
