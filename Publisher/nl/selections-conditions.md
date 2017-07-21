# Regels en condities

Zoals je misschien al weet kun je met Copernica selecties maken van 
profielen op basis van bepaalde eigenschappen die ze bezitten. De data 
die opgeslagen staat in je profielen kun je gebruiken voor selectie 
regels. Regels zijn opgebouwd uit condities. De volgende condities 
zijn beschikbaar:

| Conditie type                                                              | Omschrijving                                                                                                                                  |
|----------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------|
| Check op veldwaarde                                                        | Check de waarde van een veld voor een profiel, bijvoorbeeld om iedereen uit "Amsterdam" te selecteren.                                        |
| Check op interessegebied                                                   | Check of een profiel een interesse heeft, bijvoorbeeld om iedereen met de interesse "tennis" een mail hierover te sturen.                     |
| Check op datum                                                             | Check op een datum, bijvoorbeeld om een [verjaardagsselectie](./how-to-create-a-birthday-selection) te maken.                                 |
| Check op resultaten e-mailcampagnes                                        | Check op de resultaten van een Publisher e-mailcampagne, bijvoorbeeld om een selectie te maken van mensen die je laatste mail hebben geopend. |
| Check op resultaten sms-campagnes                                          | Check op de resultaten van een sms-campagne.                                                                                                  |
| Check op resultaten fax-mailings                                           | Check op de resulaten van een fax-mailing.                                                                                                    |
| Profielen selecteren gebaseerd op MarketingSuite mailing                   | Check op de resultaten van een Marketing Suite e-mailcampagne.                                                                                |
| Check op resultaten enquêtes                                               | Check op de resultaten van een enquête, bijvoorbeeld om een reminder te sturen aan mensen die hem nog niet ingevuld hebben.                   |
| Check op dubbele of unieke profielen                                       | Check op unieke of dubbele profielen, bijvoorbeeld om klanten te vragen welk profiel correct is.                                              |
| Check op contactgeschiedenis                                               | Check op contactgeschiedenis, bijvoorbeeld om profielen te emailen die al een poos niet gecontacteerd zijn.                                   |
| Check op actiepunten                                                       | Check op actiepunten, bijvoorbeeld om profielen te mailen die al gemarkeerd zijn om een mailing te ontvangen.                                 |
| Check op inhoud van miniselectie                                           | Check op inhoud van een miniselectie, bijvoorbeeld om profielen uit te sluiten die vaak errors veroorzaken.                                   |
| Check op wijziging                                                         | Check op wijziging, bijvoorbeeld om profielen te informeren dat hun recente wijzingen succesvol doorgegeven zijn.                             |
| [Sorteer en/of selecteer profielen](./selections-conditions-partcondition) | Sorteer of selecteer profielen op basis van veldwaarden.                                                                                      |
| Check inhoud andere selectie                                               | Check op inhoud van een andere selectie.                                                                                                      |
| Check op basis van eerdere exports                                         | Check op basis van eerdere exports, bijvoorbeeld om te voorkomen dat profielen meerdere keren geëxporteerd worden.                            |

## Regels vs. condities

Profielen kunnen gefilterd worden met selectie regels en condities. 
Deze worden gebruikt om te specificeren waar een profiel aan moet 
voldoen om binnen een selectie te vallen. Een regel en een conditie 
zijn twee verschillende dingen: Condities worden gebruikt om regels 
te vormen. "Vrouw" en "jonger dan 30" zijn voorbeelden van condities, 
bijvoorbeeld, terwijl ze samen de regel "Vrouw AND jonger dan 30" kunnen 
vormen.

## AND of OR

Er zijn drie relaties: AND, OR en OR NOT. Alle regels bestaan uit een 
of meer condities en om aan een regel te voldoen moeten alle condities 
gelden. De regel "Vrouw AND jonger dan 30" geldt alleen als "Vrouw" en 
"Jonger dan 30" beide ook gelden.

Als je echter de OR conditie wil gebruiken hoef je alleen meerdere 
regels aan te maken. Een profiel valt binnen een selectie als er 
aan tenminste een regel voldaan is. Als je bijvoorbeeld een selectie 
zou willen maken van alleen jonge mensen met een interesse in "wintersport" 
kun je twee regels maken: "Jonger dan 30 AND geïnteresseerd in skïen" en 
"Jonger dan 30 AND geïnteresseerd in snowboarden". In dit geval 
worden profielen toegevoegd die jonger dan 30 zijn en geïnteresseerd in 
skïen, snowboarden of beide.

Deze laatste relatie kan ook omgekeerd worden om mensen buiten te sluiten 
die aan bepaalde regels voldoen: De OR NOT relatie. Stel je voor dat je 
twee versies hebt van je nieuwsbrief: Een voor mensen geïnteresseerd in 
auto's en een voor mensen geïnteresseerd in fietsen. Je besluit om de 
auto nieuwsbrief te sturen naar iedereen met de interesse "auto's". Je 
wil wel minstens een nieuwsbrief sturen naar elk profiel, maar je wil 
mensen die geïnteresseerd zijn in beide ook beide nieuwsbrieven sturen. 
Om de fiets selectie te maken gebruik je twee regels: "geïnteresseerd in 
fietsen", OR NOT "geïnteresseerd in auto's".                                                       

## Meer informatie

* [Selecties en miniselecties](selections-introduction)
* [Beheeropties voor selecties](selections-settings)
* [Optimaliseren van selecties](selections-optimalization)
* [Sorteerconditie in detail](./selections-conditions-partcondition)

### Selectie tutorials

* [Selecties Tutorial: Bounce handling](./automatically-process-bounces) 
* [Selecties Tutorial: Dubbele opt-in aanmaken](create-a-double-optin-for-new-subscribers).
* [Selecties Tutorial: Nieuwsbriefselectie](./create-a-mailing-list)
* [Selecties Tutorial: Verjaardagsselectie](./how-to-create-a-birthday-selection)
