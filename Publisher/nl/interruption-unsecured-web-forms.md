**Vrijdag 2 november 2012, 15.34 uur (CET) - **Door een verkeerde
instelling zijn ingevulde webformulieren tussen gisteravond 19.00 en
vanmiddag 13.00 uur (CET) niet verwerkt. Dit is overigens niet van
toepassing op webformulieren die gegevens over het beveiligde https
verzenden. \
\
**UPDATE: **Deze storing was ook niet van toepassing op webformulieren
die zijn aangemaakt in het 'Content'-tabblad in de Copernica-applicatie.
Alleen overige formulieren, bijvoorbeeld die zijn gegenereerd onder de
tab 'Websites', die het onbeveiligde http gebruikten, ondervonden hinder
van deze onderbreking. **\
 \
 Wat is er gebeurd?\
**Gegevens, die tussen gisteravond 19.00 en vanmiddag 13.00 uur via
webformulieren werden verzonden, zijn niet in de software verwerkt.
Mensen die een webformulier invulden werden bovendien niet doorgestuurd
naar een bedanktpagina maar kwamen op de inlogpagina voor Copernica
Marketing Software terecht. \
 \
 **Was dit probleem van toepassing op iedereen?**\
 Nee. Gebruikers die webformuliergegevens verzenden over een beveiligde
https-verbinding hadden geen last van deze storing. Ook webformulieren
die zijn aangemaakt onder de tab 'Content' ondervonden geen hinder van
de onderbreking. \
 \
 **Waar werd dit probleem door veroorzaakt?\
**Met de release van [versie
12.43](http://www.copernica.com/nl/over-ons/nieuws/copernica-versie-12-43-gelanceerd)
van de applicatie, [stapte Copernica over op het beveiligde
https](http://www.copernica.com/nl/over-ons/nieuws/copernica-stapt-over-naar-https-en-adviseert-jou-hetzelfde-te-doen)
in plaats van http. Het grote verschil tussen https en http is dat die
eerste ons in staat stelt gegevens versleuteld te versturen, zonder dat
derden deze kunnen monitoren of stelen. Eerder had een gebruiker de
keuze tussen https en http, nu redirecten we iedereen automatisch door
naar https.\
 \
 Ook als gebruikers hun webformulieren zo instelden dat gegevens over
het onbeveiligde http werden verzonden, gebeurt dat in Copernica nu
automatisch alsnog over https. Door een verkeerde instelling in de
applicatie werden deze verbindingen tussen gisteravond 19.00 uur en
vanmiddag 13.00 echter niet geredirect en gingen deze gegevens verloren.
\
 \
 **Zijn er reeds bestaande gegevens verloren?\
**Nee. Alle reeds bestaande gegevens in je database zijn bewaard
gebleven, ongeacht of deze werden verzonden over https of http. \
 \
 **Hoe kan ik controleren of webformuliergegevens wel of niet over https
worden verzonden?\
**Daar komt een beetje technische kennis bij kijken. Je kunt controleren
of webformuliergegevens over https worden verzonden door een
webformulier te openen, en de html-broncode te bekijken. \
 \
 Dit kun je doen door in je webbrowser op een webformulier te klikken
met rechter muisknop en afhankelijk van je browser ‘Broncode weergeven,’
‘Toon paginabron’ of iets soortgelijks te kiezen.

Als je de broncode voor je hebt, kun je zoeken op het woord form of
 action, tot je een soortgelijke code vindt:\
 \

`<form name="subscribe" method="post" action="http://publisher.copernica.nl/">`\
 \
 Als je daar een https-adres ziet, wordt je formulier via https
verzonden en is deze storing op jouw formulieren niet van toepassing.\
\
 **Vragen?\
**Heb je hulp nodig met bovenstaande of heb je andere vragen over deze
productupdate? Neem dan gerust contact op met onze supportafdeling.
