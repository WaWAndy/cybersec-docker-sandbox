FROM python:3.10-bookworm 

COPY requirements.txt ./
# COPY .bashrc /root/.bashrc
RUN pip install --upgrade pip
RUN pip3 install lxml
RUN pip install psycopg2
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

RUN mkdir -p /opt/python-scripts
COPY python-scripts/ /opt/python-scripts/

RUN apt-get update && apt-get upgrade -y && apt-get install -y net-tools iputils-ping vim at mc postgresql postgresql-contrib 

# WORKDIR /opt

RUN mkdir -p /app/data
WORKDIR /app/data

# Add the wait-for-db script
COPY wait-for-db.sh /usr/local/bin/wait-for-db.sh
RUN chmod +x /usr/local/bin/wait-for-db.sh

COPY first_scrape.sh /app/first_scrape.sh
RUN chmod +x /app/first_scrape.sh

# Command to run the wait-for-db script before starting the scraper
CMD ["/usr/local/bin/wait-for-db.sh"]
CMD ["/app/first_scrape.sh" ]

# COPY /home/andy/.docker/docker-python-net/python-src/* /opt/python-src
# CMD [ "bash"]
ENTRYPOINT ["python3","/opt/python-scripts/meteo-scrape-psql.py"]

CMD tail -f /dev/null




