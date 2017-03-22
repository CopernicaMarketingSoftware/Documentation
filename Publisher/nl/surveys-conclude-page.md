# Enquêtes: De bedankt pagina

Deelnemers van een enquête worden na het invullen doorgestuurd naar de bedanktpagina.
Deze kan je natuurlijk zelf van inhoud voorzien.

* Selecteer de enquête en kies Bedanktpagina bewerken... in het enquête menu
* Gebruik de editor om je eigen tekst of afbeeldingen toe te voegen.
* Let op, er kan in dit veld geen Smarty personalisatie worden gebruikt,
maar wel HTML en de uitgebreide editor.

![Editing the conclude page](../images/editconcludepage.png)

Code om te personalizeren wordt hier niet ondersteund, maar je kunt wel 
doorverwijzen naar je eigen pagina. Zie de pagina over [gepersonalizeerde bedank pagina](./surveys-personalized-conclude-page)

## Personalizeren met profiel informatie

Wanneer je de deelnemer bedankt voor het invullen van de enquête kun je 
ook profiel gegevens gebruiken als de deelnemer ingelogd is. Voor meer 
informatie over linken kun je terecht in het artikel over [gepersonalizeerde 
links naar enquête versturen](./surveys-register-participants).
Als je ook rekening wilt houden met anonieme gebruikers kun je de onderstaande 
regel code gebruiken.

`{if $profile.id} Tekst voor ingelogde gebruikers {else} Tekst voor anonieme gebruikers {/if}`

## Doorverwijzen
Als je direct wilt doorverwijzen naar een eigen (extern gehoste) webpagina, 
dan kan dat door het volgende stukje Javascipt toe te voegen met behulp 
van de beknopte editor. De invuller gaat dan direct naar de link uit het 
stukje code.

Gebruik de beknopte editor om de volgende code toe te voegen aan de standaard bedanktpagina:

`<script type="text/javascript"> document.location = "http://www.mijnwebsite.nl/bedankt"; </script>`

## Meer informatie

* [Enquêtes overzicht](./surveys)
* [Gepersonalizeerde bedank pagina](./surveys-personalized-conclude-page)
