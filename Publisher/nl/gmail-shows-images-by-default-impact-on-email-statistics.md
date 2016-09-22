Bij het bekijken van je e-mailstatistieken in Copernica is het je
wellicht opgevallen dat Gmail-gebruikers sinds kort voor minder
impressies zorgen. Tegelijkertijd zie je mogelijk dat het aantal unieke
impressies bij deze ontvangers juist stijgt. Dit komt door een nieuwe
manier waarop Google inkomende e-mails afhandelt, waarbij het zijn eigen
servers gebruikt als proxy voor het tonen van afbeeldingen.

Sinds kort herschrijft Google afbeeldings-url’s van inkomende e-mails.
Als een Gmail gebruiker een e-mail opent, downloadt Google de daarin
opgenomen afbeeldingen en toont deze vervolgens aan zijn gebruikers
vanaf zijn eigen servers.

In een notendop komt dit erop neer dat:

-   Het alleen nog maar mogelijk is unieke impressies bij Gmail te meten
-   Gmail afbeeldingen in e-mails nu standaard aan zijn gebruikers toont
-   Copernica hierdoor een nauwkeuriger beeld kan geven van het aantal
    unieke keren dat Gmail-gebruikers een mail hebben geopend

Hoe meet Copernica impressies?
------------------------------

Als een ontvanger een e-mail opent, worden de afbeeldingen in dat
bericht gedownload van de servers van Copernica. Als dit gebeurt spreken
we van een impressie. Impressies geven je dus een idee over het aantal
keren dat een e-mail is geopend, alhoewel dit geen exacte benadering is
omdat niet alle gebruikers afbeeldingen in e-mails laden.

![Een gebruiker opent zijn e-mail en laadt afbeeldingen via de servers
van
Gmail](Copernica_cases/afbeeldingen-email-copernica.png "Een gebruiker opent zijn e-mail en laadt afbeeldingen")

Zelfs als je geen afbeeldingen in je e-mail opneemt, plaatst Copernica
een onzichtbare
[pixel.gif](https://www.copernica.com/nl/support/what-is-pixel-gif "Wat is pixel.gif?")
om impressies te kunnen meten. (Dit geldt niet voor HTML-vrije
[tekstversies van
e-mails](https://www.copernica.com/nl/ondersteuning/tekstversie-meesturen "Tekstversies van e-mails meesturen").)

Wat is er veranderd voor e-mails naar Gmail-adressen?
-----------------------------------------------------

Om te kunnen meten of een afbeelding is gedownload, moet deze van onze
eigen servers worden geladen. Het is uiteraard niet mogelijk om te zien
hoe vaak dit gebeurt bij servers van derden.

Wat Gmail nu echter doet is:

-   De afbeelding downloaden
-   Opslaan in eigen cache
-   De gecachete versie tonen aan gebruikers

![Een gebruiker opent zijn e-mail en laadt afbeeldingen via de servers
van
Gmail](Copernica_cases/afbeeldingen-email-copernica-google.png "Een gebruiker opent zijn e-mail en laadt afbeeldingen via de servers van Gmail")

Op [zijn
blog](http://gmailblog.blogspot.nl/2013/12/images-now-showing.html)
vertelt Gmail dat het dit doet zijn om gebruikers te beschermen “tegen
onbekende afzenders die afbeeldingen gebruiken om de veiligheid van hun
computer of mobiele apparaat in gevaar te brengen.”

Wat betekent dit voor mijn e-mailstatistieken? Kan ik nu niks meer meten voor e-mails naar Gmail?
-------------------------------------------------------------------------------------------------

Deze werkwijze betekent niet dat het helemaal niet meer mogelijk is om
impressies te meten bij Gmail. Op het moment dat een Gmail-gebruiker een
e-mail opent, worden immers nog weldegelijk afbeeldingen van onze
servers gedownload. Dat dit nu via de servers van Google verloopt, maakt
geen verschil voor het meten van unieke impressies.

Voor e-mailmarketeers is deze nieuwe manier van handelen echter niet
zonder gevolgen. Omdat Gmail niet elke keer weer de afbeelding opnieuw
downloadt, maar de gecachte versie toont, is het niet meer mogelijk om
te zien wie een bericht meerdere keren opent. Copernica kan voor
Gmail-gebruikers nu dus alleen nog maar unieke impressies meten.

Zitten hier ook nog voordelen aan?
----------------------------------

Jazeker! Er zit ook een positieve kant aan deze werkwijze van Gmail.
Voorheen moesten Gmail-gebruikers er bewust voor kiezen om afbeeldingen
in e-mail te tonen. Als iemand een e-mail bekeek zonder de afbeeldingen
te laden kon er geen impressie worden gemeten.

Omdat Gmail nu als een proxy optreedt, worden afbeeldingen nu wel
standaard getoond. Dat is op zich natuurlijk al mooi meegenomen, maar
het betekent ook dat Copernica het aantal unieke opens voor deze
ontvangers veel nauwkeuriger kan benaderen.

Het totaal aantal impressies voor Gmail is bij mij nog steeds hoger dan het unieke aantal impressies. Hoe kan dat?
------------------------------------------------------------------------------------------------------------------

Het lijkt erop dat Gmail zijn nieuwe werkwijze alleen toepast voor
e-mails die zijn ontvangen nadat het hiertoe overging. Bij oudere
e-mails is het (voorlopig) dus nog wel mogelijk om het verschil te zien
tussen het totaal aantal en het unieke aantal impressies.

Verder is het niet bekend hoe lang Gmail e-mailafbeeldingen op zijn
servers laat staan. We kunnen echter veilig aannemen dat het dit niet
eeuwig doet, aangezien het bedrijf dan wel heel veel data moeten
opslaan. Als iemand er dus geruime tijd over doet om een e-mail voor een
tweede keer of meer te openen, is het dus mogelijk dat er opnieuw een
impressie wordt gemeten.

**Lees ook:** [Gmail toont afbeeldingen standaard, gevolgen voor
statistieken
(2)](https://www.copernica.com/nl/blog/gmail-toont-afbeelding-standaard-gevolgen-voor-statistieken-2 "Gmail toont afbeeldingen standaard, gevolgen voor e-mailstatistieken (2)")
