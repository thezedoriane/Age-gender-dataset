import requests  
from bs4 import BeautifulSoup 

def getdata(url):  
    '''Renvoie les données .txt du site web dont l'url est donnée en paramètre.'''
    r = requests.get(url)  
    return r.text  
    
#demande à l'utilisateur de l'adresse de la page wikipedia    
print('donner une adresse URL')
htmldata=getdata(str(input()))   
soup = BeautifulSoup(htmldata, 'html.parser') 

#récupération de la date de naissance: année
ch9=soup.get_text()           #récupération du texte
deb=ch9.index("Naissance en") #recherche l'emplacement de "Naissance en"
naissance=ch9[deb:deb+40]
naissance.strip(' ')          #retire les espaces au début et à la fin du texte sélectionné

def fin_date(date):
    '''Renvoie le nombre de caractère avant les guillemets.'''
    n=0
    while date[n]!='"':
        n+=1
    return n
    
dnait=naissance[13:fin_date(naissance)]
date_naissance=dnait.strip(' ')
date_naissance=date_naissance.split(' ') #créer une liste contenant chaque mot
date_naissance=date_naissance[1]         #on récupère l'année de naissance
print(date_naissance)

#image de la personne
image_interet=None
for item in soup.find_all('img'):        
    #on récupère le premier lien finissant par .jpg qui correspond à la photo souhaité
    if image_interet==None and item['src'].endswith('.jpg'):
        image_interet=item['src']
        print(image_interet)
        
#date photo: année
fin=ch9[5000:10000].index("Nom de naissance")  #on recherche l'indice de "Nom de naissance"
date_photo=ch9[5000+fin-21:5000+fin-17]        #récupération de l'année où a été prise la photo
print(date_photo)

age=int(date_photo)-int(date_naissance) #calcul de l'âge de la personne sur la photo
