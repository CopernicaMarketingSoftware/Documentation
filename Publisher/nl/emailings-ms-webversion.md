# De webversielink voor drag-and-drop-templates (oud)

**Let op:** dit artikel geldt voor templates van het type 'drag-and-drop-templates (oud)'. In [dit artikel](./email-editor-unsubscribelink-webversion) leggen we uit hoe je dit kunt instellen voor nieuwe drag-and-drop-templates en HTML-templates en -documenten.

## Webversie in de Marketing Suite
Soms kan een e-mail niet goed worden weergegeven in het e-mailprogramma
van de ontvanger. Geen nood, want het meesturen van een webversie van je
e-mail is een fluitje van een cent.

### Wat is de webversie?
De webversie gebruik je om vanuit een e-mail te linken naar een versie van
het e-maildocument die door de ontvanger kan worden bekeken in zijn of
haar internetbrowser. Deze versie wordt automatisch door de software
aangemaakt wanneer de webversie via deze functie wordt opgevraagd. De webversie
wordt altijd **gepersonaliseerd** weergegeven.

### De tag en het maken van de link
Om de webversie mee te sturen in je Marketing Suite e-mails, gebruik je de
onderstaande tag:

`{$webversion}`

In een HTML e-mailtemplate kun je dit binnen de href plaatsen:

`<a href="{$webversion}" title="Klik hier voor de webversie">Bekijk deze email
in je favoriete browser</a>`

That's it. In de email wordt de tag omgezet naar het (voor iedere ontvanger
unieke) webadres (URL) van de webversie.
