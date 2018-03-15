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
follow-ups. De JSON code voor de follow-ups kun je vinden in 
[dit artikel](./campaign-tutorial-profile-enrichment-json) zodat je 
deze ook kunt importeren.

## Informatie uit kliks

Follow-ups kunnen ook gebruikt worden om op te slaan op welke links jouw klanten 
hebben geklikt. Als je veel klik data op wilt slaan kun je het beste een 
[collectie](./database-fields-and-collections) aanmaken, maar je kunt 
klik data ook opslaan in een standaard profiel veld.

### Collectie

Om kliks op te slaan hebben we eerst een collectie nodig. Je wilt een collectie 
aanmaken in de database waarnaar je gaat emailen en deze een duidelijke naam 
geven, zoals simpelweg "Kliks". Voeg daarna alle velden toe die je nodig hebt; 
Wij raden je aan tenminste de link zelf en een naam (om hem te omschrijven) 
toe te voegen. Het is helaas nog niet mogelijk om de tijd van klikken op 
te slaan.

Nu kunnen we de follow-up aanmaken:

* Maak of open een template.
* Open het "Follow-ups" menu onder **Tools**.
* Maak een nieuwe follow-up aan en selecteer "Link click" als de trigger. 
Je kunt nu de link selecteren waar je een follow-up voor aan wilt maken. 
Je kunt ook "Any link" selecteren, waarmee je de clicks op een volledige 
template kunt opslaan.
* Voeg een "Create subprofile" box toe en klik op "edit".
* Selecteer je database en de collectie die je hebt aangemaakt.
* Voeg een duidelijke naam voor de link toe in het "naam" veld en de link 
in het "url" veld van je collectie.

Nu zal er een nieuw subprofiel worden aangemaakt in de collectie "Kliks" 
elke keer dat er een gebruiker op je link klikt. Je kunt follow-ups nog 
sneller toevoegen onder het follow-up tabje van een geselecteerde link.

### Profiel veld

Als je niet van plan bent veel kliks op te slaan kun je ook gemakkelijk 
kliks kwijt in de profiel data. Je kunt bijvoorbeeld een veld gebruiken 
om aan te geven of een gebruiker zich aangemeld heeft voor de 
nieuwsbrief. Je kunt vervolgens een link toevoegen aan de template met 
een follow-up waardoor gebruikers automatisch aangemeld worden. Om dit 
te doen moet je eerst een veld toevoegen, dat we in dit geval "nieuwsbrief" 
noemen.

Nu kunnen we de follow-up aanmaken:

* Maak of open een template.
* Open het "Follow-ups" menu onder **Tools**.
* Maak een nieuwe follow-up aan en selecteer "Link click" als de trigger. 
Je kunt nu de link selecteren waar je een follow-up voor aan wilt maken. 
Je kunt ook "Any link" selecteren, waarmee je de clicks op een volledige 
template kunt opslaan.
* Voeg een "Update destination" box toe en klik op "edit".
* Selecteer "field" en voer de naam in van het veld dat je aan wil passen. 
In dit geval vullen we dus "nieuwsbrief" in.
* Voeg een nieuwe waarde toe voor het veld en sla de follow-up op. In dit 
geval is de waarde "ja", zodat de klikker wordt ingeschreven.

Nu zal het "nieuwsbrief" veld op "ja" gezet worden elke keer dat een 
gebruiker op je link klikt. Je kunt een zogenaamde target instellen 
in het follow-up menu. Je selecteert hier een database of collectie zodat 
je de velden ervan als suggestie kan zien tijdens het aanmaken van de follow-up. 
Je kunt follow-ups nog sneller toevoegen onder het follow-up tabje van een geselecteerde link.

## Informatie uit orders

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
