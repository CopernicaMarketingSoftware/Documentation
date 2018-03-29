# Campagne tutorial: Profiel verrijking

Profielen kunnen verrijkt worden met informatie die je uit je mailings 
haalt. Zo kunnen hun kliks en orders je vertellen wat zij belangrijk vinden 
en hoe jouw bedrijf van dienst kan zijn in de toekomst en helpen om relevantere 
emails te sturen.  

Met een handige [selectie](./selections-introduction) kun je deze informatie bijvoorbeeld 
gebruiken om doelgroepen aan te maken en hen verschillende, meer toegespitste, 
emails te sturen. Je kunt er ook voor kiezen deze informatie te gebruiken om je 
template te [personalizeren](./personalization), bijvoorbeeld door content 
afhankelijk te maken van interesse.

In deze tutorial gaan we ja laten zien hoe je je profielen verrijkt met 
follow-ups.

## Een eigen subscribe link maken

Met de "link click" trigger kun je bijvoorbeeld je eigen subscribe link maken. 
Alles wat je nodig hebt is een veld in de database. In dit geval noemen 
we het nieuwe veld "nieuwsbrief".

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
gebruiker op je link klikt. 

Tip: Je kunt een zogenaamde target instellen in het follow-up menu. Je 
selecteert hier een database of collectie zodat je de velden ervan als 
suggestie kan zien tijdens het aanmaken van de follow-up. Je kunt 
follow-ups nog sneller toevoegen onder het follow-up tabje van een 
geselecteerde link.

## Interesses uit orders afleiden

Met [collecties](./database-fields-and-collections) kun je makkelijk 
de aankopen van je klanten opslaan in je database. Wij raden je aan een 
[integratie](https://www.copernica.com/nl/integrations) met je webshop te maken 
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

In de code refereert `subprofile.fields.categorie` naar het veld "categorie" in 
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
