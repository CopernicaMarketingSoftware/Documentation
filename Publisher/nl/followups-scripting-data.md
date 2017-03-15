# Followups: **data** variabele

De data variable kan gebruikt worden om informatie voor je data-scripts 
op te slaan en is leeg tot je hem gebruikt. De variabele werkt vergelijkbaar 
met de fields parameter in een [profiel](./followups-scripting-profile) en kan strings en getallen opslaan,
maar geen arrays of andere objecten.

## Simpel voorbeeld

Stel dat je een email hebt geschreven aan een user waar 10 aanbiedingen in
staan en je wilt opslaan welke zijn aangeklikt. In het volgende voorbeeld 
laten we je een script zien dat je in de data-script kunt zetten om dit op 
te slaan.

    profile.data.clickedSaleItem1 = "yes"

Door een variabele aan te passen voor elke link die geklikt worden kunnen 
we nu zien welke producten het profiel heeft aangeklikt. Je kunt deze informatie
nu gebruiken in andere scripts.

    if (profile.data.klikopAanbieding1 = "ja") {
        // Voeg hier een actie toe.
    }

## Meer informatie

* [Het data-script object](./followups-scripting)
* [Copernica/Account variable](./followups-scripting-copernica)
* [Database variabele](./followups-scripting-database)
* [Collectie variabele](./followups-scripting-collection)
* [Profiel variabele](./followups-scripting-profile)
* [Subprofiel variabele](./followups-scripting-subprofile)
* [Bestemming variable](./followups-scripting-destination)
* [Mailing variabele](./followups-scripting-mailing)
* [Template variabele](./followups-scripting-template)
* [Message variabele](./followups-scripting-message)
