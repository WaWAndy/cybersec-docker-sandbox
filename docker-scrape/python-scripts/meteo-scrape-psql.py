from bs4 import BeautifulSoup
import requests
from time import sleep
from datetime import datetime
import psycopg2
import time

DB_HOST = 'db'
DB_NAME = 'weather_db'
DB_USER = 'user'
DB_PASS = 'password'

headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'}

# url1 = "https://meteo.be/fr/bruxelles"
# url2 = "https://www.meteo.be/fr/liege"
# url3 = "https://www.meteo.be/fr/arlon"
# url4 = "https://www.meteo.be/fr/hasselt"
# url5 = "https://www.meteo.be/fr/ostende"

url_list = [
        {"url": "https://meteo.be/fr/bruxelles", "city": "Bruxelles"},
        {"url": "https://www.meteo.be/fr/liege", "city": "Liege"},
        {"url": "https://www.meteo.be/fr/arlon", "city": "Arlon"},
        {"url": "https://www.meteo.be/fr/hasselt", "city": "Hasselt"},
        {"url": "https://www.meteo.be/fr/ostende", "city": "Ostende"}

]

def connect_db():
    conn = psycopg2.connect(
            host = DB_HOST,
            dbname=DB_NAME,
            user = DB_USER,
            password=DB_PASS
        )
    return conn

def insert_data(conn, city, temperature, wind_speed, wind_direction, observation_date, observation_time):
    cursor = conn.cursor()
    insert_query = """
    INSERT INTO weather_data (city, temperature, wind_speed, wind_direction, observation_date, observation_time)
    VALUES (%s, %s, %s, %s, %s, %s)
    """
    cursor.execute(insert_query, (city, temperature, wind_speed, wind_direction, observation_date, observation_time))
    conn.commit()
    cursor.close()


def scrape_weather():
    conn = connect_db()

    for item in url_list:
        url = item["url"]
        city = item["city"]
        
        html_text = requests.get(url, timeout=5, headers=headers).text
        soup = BeautifulSoup(html_text, 'lxml')
        
        observation_div = soup.find('div', class_='box__inner')
        observation_comp = observation_div.find('observation-comp')

        # Extracting data
        temperature = observation_comp['temp']
        wind_speed = observation_comp['windamount']
        wind_direction = observation_comp['winddirectiontxt']
        
        # Timestamps
        observation_date = datetime.now().date()
        observation_time = datetime.now().time()

        # Insert data into the database
        insert_data(conn, city, temperature, wind_speed, wind_direction, observation_date, observation_time)
        print(f"Data for {city} inserted.")


    conn.close()

if __name__ == "__main__":
    while True:
        scrape_weather()
        print("Scraping and insertion completed")
        time.sleep(900)


