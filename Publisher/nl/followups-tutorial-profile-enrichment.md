# Follow-up tutorial: Profiel verrijking

Profielen kunnen verrijkt worden met informatie die je uit je mailings 
haalt. Wat een gebruiker bekijkt en wat zij kopen kan aangeven wat zij 
in de toekomst zouden willen kopen, bijvoorbeeld. Met een handige 
[selectie](./selections-introduction) kun je deze informatie bijvoorbeeld 
gebruiken om doelgroepen aan te maken en hen verschillende, meer toegespitste, 
emails te sturen. Je kunt er ook voor kiezen deze informatie te gebruiken om je 
template te [personalizeren](./personalization), bijvoorbeeld door content 
afhankelijk te maken van interesse.

In deze tutorial gaan we ja laten zien hoe je je profielen verrijkt met 
follow-ups.

### Informatie uit kliks


### Informatie uit orders

Met [collecties](./database-fields-and-collections) kun je makkelijk 
de aankopen van je klanten opslaan in je database. Wij raden je aan een 
[integratie](https://www.copernica.com/en/integrations) met je webshop te maken 
om dit proces volledig te automatiseren. Je orders worden nu automatisch 
geregistreerd als subprofielen in een collectie. Let op dat je in de collectie 
velden aanmaakt voor alle informatie die je over een order wil opslaan.

Nu kunnen we een follow-up aan gaan maken voor deze collectie:

* Ga eerst naar je database en open het "Manage fields" menu.
* Voeg een nieuwe interesse groep genaamd "Orders" toe.
* Voeg alle categorieën gebruikt voor je webshop items toe. Let op de spelling!
* Selecteer de collectie met orders onder **Database & Profiles**.
* Open de follow-up editor.
* Kies de trigger "Subprofile created", die geactiveerd zal worden bij elke nieuwe order.
* Zet nu de geavanceerde modus aan en pak een Javascript execution box.
* Pas deze aan en kopieer de volgende code in het veld:

`profile.interests[subprofile.fields.categorie] = true;`

In de code refereert `subprofile.fields.category` naar het veld "categorie" in 
je database. Als jouw veld anders heeft moet je dus "categorie" vervangen 
door de naam die jij hebt gekozen. Je kunt interesses ook uitzetten op 
dezelfde manier door "true" door "false" te vervangen.

Nu kun je een nieuw subprofiel aanmaken en kijken of het werkt. Als je opvolgactie 
correct werkt wordt nu de categorie van elke aankoop toegevoegd aan de interesses 
van de klant.

## Meer informatie

Nu je informatie hebt over je klanten is het tijd om het verstandig 
te gebruiken. De artikelen hieronder kunnen je wat ideeën geven over 
hoe je doelgroepen kunt aanmaken en emails kunt personalizeren.

* [Selecties](./selections-introduction)
* [Collecties](./database-fields-and-collections)
* [Personalizatie](./personalization)
