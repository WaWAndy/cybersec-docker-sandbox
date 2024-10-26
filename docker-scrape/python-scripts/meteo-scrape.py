from bs4 import BeautifulSoup
import requests
from time import sleep
from datetime import date

headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'}

url1 = "https://meteo.be/fr/bruxelles"
url2 = "https://www.meteo.be/fr/liege"
url3 = "https://www.meteo.be/fr/arlon"
url4 = "https://www.meteo.be/fr/hasselt"
url5 = "https://www.meteo.be/fr/ostende"

url_list = ["https://meteo.be/fr/bruxelles", "https://www.meteo.be/fr/liege", "https://www.meteo.be/fr/arlon", "https://www.meteo.be/fr/hasselt", "https://www.meteo.be/fr/ostende"]



for url in url_list:
    
    
    print(url)
    
    html_text = requests.get(f'{url}', timeout = 5,  headers=headers).text
    soup = BeautifulSoup(html_text, 'lxml') 
    # print(soup)

    observation_div = soup.find('div', class_ ='box__inner')
    observation_comp = observation_div.find('observation-comp')

    temperature = observation_comp['temp']
    vitesseVent = observation_comp['windamount']
    directionVent = observation_comp['winddirectiontxt']
    # date_observation = 
    # heure_observation = 









    # temperature = temperature_div.get_text.strip()
    print(temperature)
    print(vitesseVent)
    print(directionVent)



