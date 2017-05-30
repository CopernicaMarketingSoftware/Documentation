# Followups scripting: Data Class

De Data Class kan worden gebruikt om scalars voor je scripts op te slaan, waarbij de data in dit object verder niet door ons wordt gebruikt.
Een instantie van de **data** class is aanwezig op al onze objecten binnen het [data-script](./followups-scripting), binnen het gehele
account. Iedere unieke instantie heeft dan ook zijn eigen **data** instantie. Zo heeft bijvoorbeeld ieder uniek profiel zijn eigen
**data** instantie, maar twee instanties van *hetzelfde* profiel delen ook *dezelfde* data instantie.

## Simpel voorbeeld

Stel dat je een email hebt geschreven waar 10 aanbiedingen in
staan en je wilt opslaan welke zijn aangeklikt. In het volgende voorbeeld 
laten we je een script zien dat je in de data-script kunt zetten van
de eerste aanbieding om dit op te slaan.

    profile.data.klikopAanbieding1 = "ja";

Door een variabele aan te passen voor elke link die geklikt worden kunnen 
we nu zien welke producten het profiel heeft aangeklikt. Je kunt deze informatie
nu gebruiken in andere scripts, bijvoorbeeld bij een volgende mailing.

    if (profile.data.klikopAanbieding1 = "ja") {
        // Voeg hier een actie toe.
    } else {
        // Voeg hier een andere actie toe.
    }

Met het bovenstaande script kun je in bijvoorbeeld een volgende mail naar dezelfde bestemming
zien of deze in een voorgaande mail op de aanbieding had geklikt, om vervolgens hier weer een 
actie naar uit te voeren.

Je kan zelf in het data object bijhouden wat je wilt. Je kan bijvoorbeeld ook 
bijhouden hoeveel mensen al gebruik hebben gemaakt van je aanbieding door het aantal 
clicks per bericht op te slaan.

    message.timesClicked += 1;
    
Zelf kun je dit script natuurlijk uitbreiden, bijvoorbeeld door te checken of 
mensen niet meerdere keren op de link hebben geklikt.

## Meer informatie

* [Data-scripts](./followups-scripting)
* [Copernica data-script](./followups-scripting-copernica)
* [Database data-script](./followups-scripting-database)
* [Collection data-script](./followups-scripting-collection)
* [Profile data-script](./followups-scripting-profile)
* [Subprofile data-script](./followups-scripting-subprofile)
* [Destination data-script](./followups-scripting-destination)
* [Mailing data-script](./followups-scripting-mailing)
* [Template data-script](./followups-scripting-template)
* [Message data-script](./followups-scripting-message)
