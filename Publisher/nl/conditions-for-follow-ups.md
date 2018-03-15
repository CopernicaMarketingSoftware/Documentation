# Follow-up Manager: Condities

Opvolgacties kun je instellen in de [Publisher](./follow-up-manager-publisher), 
[Marketing Suite](./follow-up-manager-ms) of met 
[data-scripts](./followups-scripting). Binnen al deze methoden kun je 
condities verbinden aan de uitvoering hiervan. Er wordt dan op basis van 
je data op het aangegeven moment gekeken hoe de opvolgactie zich moet gedragen. 
Maak hiervoor eerst een opvolgactie aan en voeg dan een conditie toe.

De condities kunnen worden ingesteld voor zowel het inroosteren en het
uitvoeren van de opvolgacties. We onderscheiden hierbinnen twee soorten condities:

1.  Activeringsconditie (A)
2.  Uitvoeringsconditie (B)

Het grote verschil ligt hem in wanneer de conditie geëvalueerd wordt: 
De activatieconditie evalueert de data op het moment van het aanmaken van 
de conditie, de uitvoeringsconditie evalueert de data op het moment dat 
de opvolgactie daadwerkelijk wordt uitgevoerd.

## A. Activeringsconditie

Wanneer je een activeringsconditie instelt wordt de betreffende data 
meteen gecontroleerd. Als dit nodig is wordt de opvolgactie hierdoor 
meteen uitgevoerd, maar het kan ook zijn dat je deze voor maanden later 
ingeroosterd hebt. Hou er dus ook rekening mee dat de data die je gebruikt 
hebt inmiddels kan zijn veranderd.

Stel je voor dat je bijvoorbeeld een email hebt verstuurd waarin je naar 
verschillende artikelen hebt gelinkt. Je slaat daarnaast op in elk profiel 
op welke links geklikt zijn. Een van de artikelen is op het moment in 
de aanbieding en je besluit de klanten die al op een link naar dit artikel 
hebben geklikt (dus mogelijk geïnteresseerd!) op de hoogte te brengen met 
een email. Je kunt dan een opvolgactie instellen met een activeringsconditie. 
Deze kijkt op het moment dat de conditie wordt geactiveerd naar wie er 
al op deze link geklikt hebben en stuurt een nieuwe mail naar deze mensen. 
Je gebruikt hier de activeringsconditie omdat je alleen mensen wil mailen 
die op dit moment geïnteresseerd zijn. Als je dit niet zou doen zou iemand 
later op de link kunnen klikken en een mail kunnen ontvangen over een 
actie die op dat moment misschien niet meer geldt.

## B. Uitvoeringsconditie

De uitvoerings conditie checkt de betreffende data op het moment dat je 
opvolgactie wordt uitgevoerd. De data op het moment van het instellen 
van de conditie wordt hier dus niet gebruikt.

Stel je voor dat je een email hebt ingeroosterd over een wijnproeverij 
waar je je klanten voor uit wil nodigen. Je weet echter dat niet iedereen 
geïnteresseerd is in wijn en om niet-geïnteresseerden niet lastig te vallen 
wil je mail alleen versturen naar mensen met "wijn" in hun interesses. 
Interesses van mensen kunnen veranderen, dus het is handiger om pas bij 
het versturen van de mail te kijken wie er geïnteresseerd zijn. Hier 
gebruik je de uitvoeringsconditie, zodat je op het moment dat de mail 
ingeroosterd staat deze alleen verstuurd naar mensen met de interesse "wijn". 
Als je hier de activeringsconditie zou gebruiken zou je bijvoorbeeld mensen 
kunnen missen die "wijn" toegevoegd hebben in de tussentijd, of mensen 
kunnen emailen die op dat moment aangegeven geen interesse meer te hebben 
in wijn.

## Meer informatie

* [Follow-up Manager Publisher](./follow-up-manager-publisher)
* [Follow-up Manager Marketing Suite](./follow-up-manager-ms)
* [Opvolgactie scripting](./followups-scripting)
