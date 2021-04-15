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
#récupération du texte
ch9=soup.get_text()        
#recherche l'emplacement de "Naissance en"
deb=ch9.index("Naissance en") 
naissance=ch9[deb:deb+40]
#retire les espaces au début et à la fin du texte sélectionné
naissance.strip(' ')          

def fin_date(date):
    '''Renvoie le nombre de caractère avant les guillemets.'''
    n=0
    while date[n]!='"':
        n+=1
    return n
    
dnait=naissance[13:fin_date(naissance)]
date_naissance=dnait.strip(' ')
#créer une liste contenant chaque mot
date_naissance=date_naissance.split(' ') 
#on récupère l'année de naissance
date_naissance=date_naissance[1]        
print(date_naissance)

#image de la personne
image_interet=None
for item in soup.find_all('img'):        
    #on récupère le premier lien finissant par .jpg qui correspond à la photo souhaité
    if image_interet==None and item['src'].endswith('.jpg'):
        image_interet=item['src']
        print(image_interet)
        
#date photo: année
#on recherche l'indice de "Nom de naissance"
fin=ch9[5000:10000].index("Nom de naissance") 
#récupération de l'année où a été prise la photo
date_photo=ch9[5000+fin-21:5000+fin-17]        
print(date_photo)

#calcul de l'âge de la personne sur la photo
age=int(date_photo)-int(date_naissance) 

#demande du genre et de l'ethnie de la personne à l'utilisateur et ransformation en str
print('Quel est le genre ? Noter: H ou F')
genre=str(input())
print("Quel est l'ethnie ? Entrer Blanc, Noir, Indien, Asie de l'Est, Asie du Sud-Est, Moyen-Orient ou Latino")
ethnie=str(input())

#création de l'entête du fichier csv
entetes=[u'photo', u'age', u'gender', u'ethnie'] 
valeurs=[]
#on crée une ligne de valeur contenant l'url de l'image, l'age de la personne son genre et son etnhie, chaque donnée est un str
valeurs.append([image_interet, str(age), genre, ethnie])

#on ouvre le fichier dataset qui se crée s'il n'existe pas, pour écrire à la suite des données déjà insérées
dataset=open('dataset.csv','a')             

for valeur in valeurs:
    #on insère la ligne écrite dans valeurs dans le fichier csv
     ligne = ";".join(valeur) + "\n"
     dataset.write(ligne)

#fermeture du fichier csv
dataset.close()
