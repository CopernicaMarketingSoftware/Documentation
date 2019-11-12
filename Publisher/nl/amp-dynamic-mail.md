# Dynamische en interactieve mailings
AMP maakt e-mails krachtiger door de mogelijkheid te bieden ze dynamisch en interactief te maken. Een dynamische e-mail kan zijn content updaten terwijl de e-mail al verstuurd is. Een interactieve e-mail daarentegen laat de gebruiker informatie updaten. Denk hierbij aan het tonen van de meest recente voorraad en het versturen van feedback door middel van een formulier.

Praktische voorbeelden kun je vinden in de [Gmail AMP playground](https://amp.gmail.dev/playground/), kijk hier vooral bij <amp-list> en <amp-form>. Om dit in combinatie met Copernica te laten werken, moet er een endpoint opgezet worden die communiceert met de Copernica API. Zo kan een POST request worden doorgestuurd naar een endpoint, welke deze verwerkt en een API call naar Copernica doet om informatie te updaten. Daarnaast kan een endpoint een GET request doen met behulp van de Copernica API om dit als feed te exporteren welke gebruikt kan worden door AMP.

## CORS headers
Om dynamische en interactieve e-mails te versturen maken we gebruik van externe content. Zo gebruiken we feeds voor het updaten van content en wordt er gecommuniceerd met een endpoint om formulieren te versturen. Het communiceren met de externe content gebeurt vanaf de servers van de ontvangende e-mailclient.

Niet alle e-mailclients laten het standaard toe om te communiceren met een ander domein, een zogenaamd Cross-Origin Resource Sharing (CORS) request. Om CORS requests te kunnen verwerken, moeten er een aantal headers en parameters ingesteld worden. Op deze manier weet de e-mailclient dat er op een juiste manier gecommuniceerd wordt. 

Deze headers en parameters hoeven momenteel alleen voor Gmail, de Publisher en Google's testomgeving te worden ingesteld. Het instellen kan onder andere via PHP en Javascript. De makkelijkste manier is echter om dit server breed te doen met behulp van een .htaccess bestand. Plaats dit bestand op je server in een bovenliggende map van de plek waar de externe content staat.

Een voorbeeld van een .htaccess bestand met de juiste headers vind je hieronder. Let erop dat ADRES en DOMEIN.NL vervangen moeten worden door het verzend adres.

```
SetEnvIf Origin "https://mail.google.com" AccessControlAllowOrigin=$0$1
SetEnvIf Origin "https://publisher.copernica.com" AccessControlAllowOrigin=$0$1
SetEnvIf Origin "https://amp.gmail.dev" AccessControlAllowOrigin=$0$1

RewriteEngine On

RewriteCond %{QUERY_STRING} __amp_source_origin=ADRES@DOMEIN.NL [NC]
RewriteRule ^ - [E=AMPAccessControlAllowSourceOrigin:ADRES@DOMEIN.NL]

RewriteCond %{QUERY_STRING} __amp_source_origin=ADRES%40DOMEIN.NL [NC]
RewriteRule ^ - [E=AMPAccessControlAllowSourceOrigin:ADRES@DOMEIN.NL]

RewriteCond %{QUERY_STRING} __amp_source_origin=amp%40gmail.dev [NC]
RewriteRule ^ - [E=AMPAccessControlAllowSourceOrigin:amp@gmail.dev]

RewriteCond %{QUERY_STRING} __amp_source_origin=amp&gmail.dev [NC]
RewriteRule ^ - [E=AMPAccessControlAllowSourceOrigin:amp@gmail.dev]

Header add Access-Control-Allow-Credentials true
Header add Access-Control-Allow-Origin %{AccessControlAllowOrigin}e env=AccessControlAllowOrigin
Header add AMP-Access-Control-Allow-Source-Origin %{AMPAccessControlAllowSourceOrigin}e env=AMPAccessControlAllowSourceOrigin
Header add Access-Control-Expose-Headers AMP-Access-Control-Allow-Source-Origin
```

Meer informatie over de CORS headers vind je in de officiële [AMP](https://amp.dev/documentation/guides-and-tutorials/learn/amp-caches-and-cors/amp-cors-requests/) en [Gmail](https://developers.google.com/gmail/ampemail/security-requirements) documentatie.

## Testen
Om te testen of de headers goed zijn ingesteld kan je het beste gebruik maken van het AMP-list voorbeeld in de Gmail playground.

1. Ga naar de Gmail playground en selecteer rechtsboven <amp-list> #1.
2. Kopieer de src uit de amp-list en sla dit bestand op, op je eigen server.
3. Verander de src naar de locatie op je eigen server.

Als de headers goed zijn ingesteld zie je de lijst weer in het voorbeeld verschijnen, als je niks ziet staat er ergens nog iets fout. Om dit te onderzoeken selecteer je (in Chrome) inspect via de rechtermuis knop. Vervolgens open je de console, waarin de CORS gerelateerde foutmeldingen worden weergeven. Daarin kan je zien of er headers en parameters missen.

Bij de volgende stappen is dit ook telkens de manier om te kijken of alles goed ingesteld staat.

4. Verstuur een test e-mail naar Gmail en kijk of de lijst in de e-mail wordt weergeven.
5. Kopieer de code naar de Publisher en kijk of de preview goed wordt weergeven.
6. Verstuur een test e-mail naar Gmail via de Publisher en kijk of de lijst in de e-mail wordt weergeven.





