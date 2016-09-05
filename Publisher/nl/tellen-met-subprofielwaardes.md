Collecties worden dikwijls gebruikt om bijvoorbeeld producten op te
slaan. Elk product dat is aangekocht door een profiel wordt dan
opgeslagen als een subprofiel. Een regelmatig terugkerende vraag is of
het mogelijk is om het totaalbedrag van aangekochte producten door een
klant (profiel) te berekenen, en hier bijvoorbeeld een opvolgactie aan
te koppelen. Zoals het versturen van een email aan de klant wanneer deze
meer dan 1000 euro heeft besteed in jouw webshop. 

De in het voorbeeld gebruikte veldnamen en naam van de collectie kan je
natuurlijk veranderen naar iets anders. 

### Werking

Je hebt in de collectie **Products** een veld **product\_price**. Hierin
wordt per product het aankoopbedrag in opgeslagen. 

-   Voeg in de database een veld toe **Totaal. **Hierin wordt het
    totaalbedrag van aangekochte producten straks naartoe geschreven.  
-   Voeg een database opvolgactie toe aan de collectie waarin de
    producten zijn opgeslagen.
-   Kies als gevolg dat een subprofiel is toegevoegd.
-   Kies als actie dat de waarde in het veld **Totaal** in het profiel
    moet worden gewijzigd.
-   Selecteer het profielveld dat moet worden gewijzigd, en voer de
    volgende code in: \
    \
    `{ldelim}capture assign="total"{rdelim}0{ldelim}/capture{rdelim}{ldelim}foreach from=$profile.products item=sp{rdelim}{ldelim}capture assign="total"{rdelim}{ldelim}$sp.product_price+$total{rdelim}{ldelim}/capture{rdelim}{ldelim}/foreach{rdelim}{ldelim}$total{rdelim}`\
    \
-   Sla de opvolgactie op. 

Voeg een subprofiel (product) toe aan de collectie van je
standaardbestemming om de werking te testen. Controleer vervolgens of de
prijs van het product is opgeteld bij de waarde in het profiel. 

### E-mail versturen

**De e-mail kan je versturen als opvolgactie maar ook als ingeroosterde
bulkmailing. Deze laatste methode is het makkelijkst toepasbaar en wordt
hieronder toegelicht. **

-   Maak een nieuwe selectie. Geef deze de volgende condities:

**Check op veldwaarde:** de waarde in het veld Totaal is groter dan
1000.

**EN **

**Check op resultaten email campagnes:**het profiel heeft het document X
nog niet ontvangen. \
 Document X is hier natuurlijk het e-maildocument dat je verstuurt naar
aanleiding van de aangekochte producten.

-   Rooster deze e-mail **dagelijks** in naar de selectie.

Er wordt nu dagelijk een e-mail gestuurd naar profielen die meer dan
1000 euro hebben besteed. Hebben ze de mail echter al een keer
ontvangen, dan zal het profiel de mail niet meer ontvangen.

Test de campagne een aantal dagen voordat je deze aan jouw relaties gaat
versturen. 
