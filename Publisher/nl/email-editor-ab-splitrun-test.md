# Versturen van een A/B-tests of split-run

## Verschil A/B-test of split-run 
Een A/B-test gebruik je om te testen welke (variant van een) template het beste werkt. De doelgroep
van je mailing wordt in twee gelijke groepen gesplitst. De eerste groep ontvangt template A en de 
tweede groep template B. Er zijn bij een A/B test dus twee gelijke groepen, waarbij elke groep een
ander bericht ontvangt. Je kunt daarna in de statistieken terugzien welke mailing het beste presteerde, 
en deze kennis kun je gebruiken voor je latere mailings (bijvoorbeeld door de minder presterende 
template niet meer te gebruiken).

Een split-run is net zo iets, maar dan wat geavanceerder. Bij een split-run wordt eerst naar een 
_beperkt deel_ van je verzendselectie een aantal verschillende mailings verstuurd om daarna _automatisch_
te bepalen welke versie het beste presteert. Op basis van de resultaten wordt vervolgens de beste presterende
versie naar de overige contacten verzonden. 

Omdat een split-run wat krachtiger is dan een A/B-test moet je bij het instellen van de split-run meer instellen:
- hoe groot moeten de testgroepen zijn?
- hoeveel tijd zit er tussen de testgroepen en de resterende mailing?
- op basis van welke gegevens bepaal je de definitieve groep?

## Welke onderdelen kan ik testen?
In je template of document zitten verschillende onderdelen waarmee je kunt testen:
- onderwerpsregel
- naam van de afzender
- call-to-actions (buttons)
- tone of voice
- vormgeving

In de [statistieken](https://ms.copernica.com/#/results) zie je per variant de geregistreerde opens en kliks. 
Als je ziet dat een onderdeel betere resultaten oplevert kan je deze verbetering permanent doorvoeren in je templates.  

## Versturen van een A/B test of split-run
Om een A/B test of split-run te versturen kies je binnen je [(mini)selectie](https://ms.copernica.com/#/profiles/) voor **Mailing versturen**. 
Vanuit een template of document maak je gebruik van de optie **Bulkmailing** onder de knop **Verzendopties** in de toolbar.

### Type mailing
Er zijn drie verschillende type mailings:
- Reguliere mailing
- A/B-test
- Split-run

**Reguliere mailing**  
Met een reguliere mailing kun je een template of document naar de gehele bestemming sturen.

**A/B-test**  
Met een A/B-test kun je twee templates of documenten met elkaar vergelijken. De bestemming wordt in twee groepen gesplitst om zo te kijken welk document of template het beste presteert.

Standaard staat er een verdeling van 50% (groep A) en 50% (groep B) ingesteld. Om dit percentage te wijzigen sleep je de slider tussen de twee groepen.

![Slider](../images/nl/slider.png)

**Split-run**   
Met een split-run kun je twee of meer mailings met elkaar vergelijken die naar een beperkt deel van de verzendselectie worden verzonden. De best presterende mailing wordt vervolgens automatisch naar het resterende deel van de verzendselectie verzonden.

Bij een split-run staat de verdeling van de groepen standaard op 25% (groep A), 25% (groep B) en 50% (definitieve groep) ingesteld. Ook hier is het mogelijk om met de slider de grootte van de groepen aan te passen. 

Je kunt tot 5 verschillende groepen toevoegen aan je split-run.

### Groepen instellen
Bij een A/B-test of split-run krijg je de optie om per groep een template of document te kiezen. Deze groepen worden verzonden op het ingestelde tijdstip van de mailing.

![Voorbeeld van groepen](../images/nl/emaileditor_groepen.png)

### Definitieve groep instellen (split-run)
Split-runs bestaan naast minimaal twee groepen ook uit een definitieve groep. Op basis van de ingestelde vergelijking wordt naar deze groep het winnende template of document verzonden.  

De volgende vergelijksmogelijkheden zijn beschikbaar:
- De meeste impressies
- De meeste unieke impressies
- De meeste kliks
- De meeste unieke kliks
- Eigen javascript

#### Voorbeeld
In onderstaand voorbeeld ontvangt het resterende deel van de verzendselectie (50%) het template of document waarop in de afgelopen drie uur de meeste unieke impressies zijn geregistreerd.
![Voorbeeld van definitieve groep](../images/nl/definitievegroep.png)

## Statistieken
De statistieken van de losse groepen zijn terug te vinden in de [resultaten-module](https://ms.copernica.com/#/results/sentmailings).

## Opvolgacties A/B-testen
### Stap 1 - Opvolgactie aanmaken
Om een A/B-test uit te voeren via een opvolgactie ga je naar de gewenste locatie voor de opvolgactie. Dit kan bijvoorbeeld in je database zijn, maar ook op een template of mailing.
Vervolgens maak je de opvolgactie aan zoals je dat normaal gesproken ook zou doen.

### Stap 2 - Geavanceerde modus aanzetten
Als je het scherm 'Opvolgactie aanpassen' open hebt, controleer je eerst of de 'Geavanceerde modus' aangevinkt staat. Dit kun je helemaal onder de tussenblokken, acties en annotaties zien. Als deze modus nog niet aangevinkt staat, zet je deze eerst aan. Een pop-up met de vraag of je de geavanceerde modus wilt activeren zal dan verschijnen, hier kies je voor de optie 'Schakel de geavanceerde modus in'.

### Stap 3 - JavaScript code toevoegen
Nu we zeker weten dat de geavanceerde modus aangevinkt staat, zie je ook opties voor JavaScript, namelijk 'Evalueren' en 'Uitvoeren'. Kies voor de optie 'Evalueren' en begin met het bewerken van dit blok.

In het lege invoergedeelte kun je de JavaScript code toevoegen. De code voor een A/B-test is:
```
var testVar = profile.id;
if (testVar % 2 == 1) {
    return true;
} else {
    return false;
}
```

Deze code zorgt ervoor dat profielen onder worden verdeeld in profielen waarvan het ID eindigt op een even of een oneven getal waardoor je twee willekeurig gesorteerde groepen krijgt als het ware.

Als je deze code hebt gekopieerd en in het invoergedeelte hebt geplakt, kun je onderin op de blauwe knop 'Testen' klikken om te controleren of de code werkt. Als je onder 'Resultaat' true of false ziet, werkt de code naar behoren en kun je de op de groene knop 'Opslaan' klikken.

### Stap 4 - Splitsing maken
Na het opslaan kom je weer terug in het scherm 'Opvolgactie aanpassen'. Hier klik je op de Javascript evaluatie box die je zojuist hebt aangemaakt en kies je voor de optie 'Link aanmaken'. In het scherm voor 'Een nieuwe link aanmaken' wat je nu open hebt, kies je onder 'Link' voor '==' en rechts waar 'De waarde om te vergelijken...' staat kies je voor 'true', daarna klik je op de groene knop 'Aanmaken'.

Nu kies je nog een keer voor 'Link aanmaken' en net zoals in de vorige stap kies je voor '==' maar nu vul je rechts 'false' in en klik je weer op de groene knop 'Aanmaken'.

Je hebt nu twee verschillende links aangemaakt, een voor resultaat 'true' en een voor resultaat 'false'.

### Stap 5 - Verzenden e-mail voorbereiden
Aan beide links verbind je een actieblok 'Verzend e-mail'. waar je bij het ene blok kiest voor template A en bij het andere blok kiest voor template B.

Bij het aanpassen van deze blokken kies je voor 'Verstuur de e-mail naar het (sub)profiel dat de opvolgactie geactiveerd heeft'. Verder kies je bij een van de blokken voor template A en bij het andere blok kies je voor template B.

Als alles goed staat ingesteld, kun je de opvolgactie opslaan en kun je gebruik maken van de A/B-test via een opvolgactie.
