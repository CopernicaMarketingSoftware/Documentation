# Webforms: Beperk aantal inzendingen

Stel je voor dat je een formulier hebt waarbij je het aantal inzendingen 
wil beperken, bijvoorbeeld voor een prijsvraag. Je kan dit bereiken met 
[Smarty Personalizatie tags](./emailings-publisher-personalization). In dit artikel leggen 
we haarfijn uit hoe.

Let op: In dit geval houden we alleen het aantal keren invullen per profiel 
bij. Je kan met deze tutorial dus geen limiet stellen aan het totale aantal 
inzendingen.

## Database

In je database moet je een veld aanmaken ('submits') met standaard waarde 
0. Hier ga je het aantal keer invullen per profiel in bijhouden.

### Webformulier

Eerst moet je een webformulier maken met een tekst blok bovenaan. Plaats 
de volgende regel code in het blok:

`{capture assign=submits}{$currentsubmits}{/capture}`

Maak nu een nieuw veld aan voor het webformulier dat onzichtbaar is met 
de volgende standaard waarde:

`{math equation="x+y" x=$submits y=1}`

Maak nog een veld dat je kunt gebruiken om te linken aan het profiel, 
bijvoorbeeld het e-mailadres. Zorg ervoor dat dit een *key field* is. 

Stel het webformulier in om op *key fields* te checken, pas het profiel 
aan en log in als het profiel in de [database](./database-introduction).

Als je alles goed hebt gedaan zal het aantal inzendingen nu omhoog gaan 
elke keer dat het formulier verzonden wordt door de formule die je hebt 
geplaatst in het onzichtbare veld. Je kunt het webformulier nu op je 
pagina zetten.

Om je invullers te laten weten dat ze het maximale aantal inzendingen 
gebruikt hebben gebruik je de volgende code:

`{if $currentnumber > 3}You have submitted the form too many times{else}Please try again.{/if}`
