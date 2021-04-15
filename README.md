# Age-gender-dataset

This is a school project where we have to create a database containing the photo, the age, the gender and the ethnie of people. This database could be used by shops to target what could most interest a customer.
So we have to collect these data on the internet and create a csv file.
We decided to push the project further by creating a website. 
This website enables people to choose which photo they wanted to see according to some criteria as the age or the gender. It also enables to change the gender or the ethnie because, as it can't be defined by a computer, it's to human to enter it. So it will be easier to correct these data if there are mistakes or just to enter them.

To do this project we used :
  - Python
  - HTML5
  - CSS
  - PHP 7.4.14

How to use the code :
  To do the data collection by yourself you will need to use the code from collect.py and so import the Request and Beautiful Soup libraries. You only have to run the code and you will be asked for a URL in the console. This URL have to be the URL from a french wikipedia page respecting some conditions. Indeed, only pages with a photo, a description of the photo containing the year of the photo and whose box containing the person's information begins with "Nom de Naissance" can be added to the database.
The organisation of the page have to look like this example. ![image](https://user-images.githubusercontent.com/72499343/114832047-5633ef00-9dce-11eb-9040-675e0dd0fecb.png)
Once the URL is entered, the program will ask you for the gender and then the ethnicity. If the csv file 'dataset.csv' doesn't exist yet it will be created in the same folder where your python file is saved and the person will be added in it. If it already exist, the person will be added in this file. 

  If you don't want to create the database by yourself you can use the one we give in the github 'dataset.csv'. 
