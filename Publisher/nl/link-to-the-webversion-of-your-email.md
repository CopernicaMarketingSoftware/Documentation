# Webversion

Soms kan een e-mail niet goed worden weergegeven in het e-mailprogramma
van de ontvanger. Geen nood, want het meesturen van een webversie van je
email is een fluitje van een cent.

### Wat is de webversie?

De webversie gebruik je om vanuit de email te linken naar een versie van
het e-maildocument die door de ontvanger kan worden bekeken in zijn of
haar internetbrowser. Deze versie wordt automatisch door de software
aangemaakt wanneer deze via deze functie wordt opgevraagd. De webversie
wordt altijd **gepersonaliseerd** weergegeven.

De tag en het maken van de link
-------------------------------

Om de webversie mee te sturen in je Marketing Suite e-mails, gebruik je onderstaande tag:

`{$webversion}`

Als je gebruikt maakt van de Copernica Publisher ziet het er net iets anders uit:

`{webversion}`

That's it. In de email wordt de tag omgezet naar het (voor iedere
ontvanger unieke) webadres (URL) van de webversie. Deze is nog niet
klikbaar. Hiervoor gebruik je nog een beetje HTML:

`<a href="{$webversion}" title="Klik hier voor de webversie">Bekijk deze email in je favoriete browser</a>`

### Extra opties

Beide functies hebben dezelfde opties, tenzij anders aangegeven

**showheader=false**

De header (met hierin afzender- en documentinformatie) die standaard
wordt getoond bovenaan een webversie kan je verwijderen
door *showheader=false* aan de tag toe te voegen.

Voorbeeld: `{webversion showheader=false}`
