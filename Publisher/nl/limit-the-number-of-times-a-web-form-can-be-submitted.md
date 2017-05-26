# Webformulieren: Limiet stellen op aantal keer invullen.

Stel, je hebt een situatie waarbij je wilt dat iemand een webformulier
maar 3 keer mag invullen. Je kunt dit dan bereiken door middel van 
[Smarty personalizatie](./personalization). In dit artikel wordt 
uitgelegd hoe.

Let op: Het aantal wordt per profiel bijgehouden. Er wordt dus niet
bijgehouden hoe vaak het webformulier in totaal (door alle bezoekers) is
ingevuld.

## Database

Je hebt nodig: een veld in de database (noem dit veld 'huidigaantal';
een numeriek veld met standaardwaarde = 0).

### Webformulier

Maak een webformulier met bovenaan een tekstblok. Plaats de volgende
regel code in het tekstblok:

`{capture assign=aantal}{$huidigaantal}{/capture}`

Maak een nieuw webformulier veld: onzichtbaar veld, standaardwaarde is

`{math equation="x+y" x=$aantal y=1}`

Maak nog een formulierveld, bijvoorbeeld e-mailadres. Maak dit
een **sleutelveld**.

Instelling webformulier: check sleutelveld, wijzig profiel, inloggen
als profiel in [database](./database-introduction).

De waarde in het veld 'huidigaantal' wordt nu iedere keer wanneer het
webformulier wordt verwerkt met 1 verhoogd.

-   Plaats het webformulier in een webpagina. 

Op de bedanktpagina van het webformulier kan je tot slot het volgende
doen:

`{if $huidigaantal > 3}Helaas, u heeft het formulier te vaak ingevuld{else}Probeer het nog een keer.{/if}`

[Terug naar webformulieren](./webforms)
