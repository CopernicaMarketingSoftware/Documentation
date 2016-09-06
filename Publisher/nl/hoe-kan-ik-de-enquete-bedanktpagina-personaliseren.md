De pagina die getoond wordt nadat iemand een enquête heeft ingevuld,
noemen wij de bedanktpagina. Deze stel je in in via Enquête \>
**Bedanktpagina aanpassen...** Je kan hier de beknopte of de uitgebreide
editor gebruiken om content toe te voegen.

Het is helaas (nog) niet mogelijk om personalisatiecode te gebruiken op
de standaard getoonde bedanktpagina. Als je toch een persoonlijke noot
wilt toevoegen aan deze pagina, kan je de standaard bedanktpagina
overslaan, en de gebruiker direct doorverwijzen naar een andere pagina.

Als je direct wilt doorverwijzen naar een eigen (extern gehoste)
webpagina, dan kan dat door het volgende stukje Javascipt toe te voegen
met behulp van de beknopte editor. De invuller gaat dan direct naar de
link uit het stukje code.

Gebruik de beknopte editor om de volgende code toe te voegen aan de
standaard bedanktpagina:

`<script type="text/javascript">   document.location = "http://www.mijnwebsite.nl/bedankt";   </script>`

**Let op:** als je de pagina wilt personaliseren met gegevens uit het
profiel, dan moet het profiel ingelogd zijn als hij/zij de enquête
invult.

Als de enquête zowel kan worden ingevuld door ingelogde en anonieme
gebruikers, dan kan je op de volgende wijze de bedanktpagina afstemmen
op het type gebruiker (en voorkomen dat een anonieme gebruiker lege
personalisatie ziet):

`{if $profile.id}Toon dit aan ingelogde profielen {else} Toon dit aan aan anonieme gebruikers {/if}`
