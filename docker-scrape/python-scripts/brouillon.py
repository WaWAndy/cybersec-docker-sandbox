from bs4 import BeautifulSoup
import requests

url ="https://meteo.be/fr/bruxelles"

html_text = requests.get(f'{url}', timeout = 5).text

soup = BeautifulSoup(html_text, 'lxml')

print(soup)
