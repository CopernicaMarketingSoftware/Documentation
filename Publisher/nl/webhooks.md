# Webhooks

Onder het `CONFIGURATIE` tabblad in de Marketing Suite kun je het 
Webhook menu vinden onder het 'Account' kopje. Voorheen werden Webhooks 
Feedback Loops genoemd. Webhooks zijn processen die in real-time een 
notificatie naar gebruikers versturen door middel van een HTTP POST verzoek. 
Hierdoor kun je altijd de meest recente resultaten van je mailing gereed hebben. 
Deze functionaliteit is exclusief voor de Marketing Suite.

Hoewel Webhooks erg nuttig kunnen zijn moeten deze wel met zorg gebruikt worden 
aangezien Webhooks grote hoeveelheden verzoeken kunnen versturen. Als je 
niet zeker bent van de capaciteit van je servers of geen real-time statistieken 
nodig hebt kun je ook de [logfiles](./logfiles-ms "Opvragen van Marketing Suite logfiles") 
of [statistieken](./statistics "Statistieken bekijken") inzien of een van 
[Copernica's API's](./apis "Copernica's SOAP en REST API's") gebruiken.

Er zijn verschillende types voor Webhooks. De onderstaande artikelen 
gaan dieper in op deze types:

* [Webhooks for bounces](webhook-bounces)
* [Webhooks for failures](webhook-failures)
* [Webhooks for deliveries](webhook-deliveries)
* [Webhooks for clicks](webhook-clicks)
* [Webhooks for opens](webhook-opens)
* [Webhooks for (sub)profile creations](webhook-creates)
* [Webhooks for (sub)profile updates](webhook-updates)
* [Webhooks for (sub)profile removals](webhook-deletes)

## Webhooks met Marketing Suite

Webhooks kunnen bijvoorbeeld gebruikt worden om data van Copernica 
te synchronizeren met je eigen applicatie. Webhooks vereisen echter wel een 
script op je eigen server om de juiste handelingen uit te voeren wanneer er 
informatie wordt aangeleverd door de Webhook. Je kunt hiervoor verschillende 
trigger instellen, waaronder kliks, opens, profielen die worden aangepast, etc.

De data die terug wordt gestuurd is uitgebreid en is ontworpen om makkelijk 
te kunnen linken met data in je eigen systeem. Copernica ontvangt het IP adres 
en de HTTP headers van het verzoek en voegt het e-mailadres, de profiel 
data en de gelinkte tags toe om naar jou te verzenden. Met deze informatie 
kun je deze makkelijk linken met bijvoorbeeld een profiel in je eigen database.

Door te navigeren naar een database of collectie kun je ook makkelijk de 
Webhooks inzien die erop van toepassing zijn, zodat het duidelijk is 
wat voor data hier vandaan kan komen.

## Webhooks configureren

De eerste stap voor het opzetten van een Webhook is om naar het `CONFIGURATIE` 
menu te navigeren, waar je het Webhook menu kan vinden onder het account 
'kopje'. Bij het aanmaken van een Webhook kies je hier eerst een type voor 
en een URL, de callback URL genoemd. Naar deze callback URL wordt straks de 
data verzonden.

De volgende stap is om het webadres te verifiëren. Door deze extra 
stap wordt voorkomen dat de mogelijke vertrouwelijke data in de verkeerde 
handen valt. In de Marketing Suite vind je hierna een link waarmee je het 
verificatie bestand kunt downloaden. Deze zal verschillend zijn voor elke 
nieuwe Webhook. Dit bestand kun je vervolgens in de root van je webserver plaatsen 
of op de plek waar het script staat dat de HTTP POST verzoeken zal afhandelen. 
Als dit dus de locatie van je script is:

```text
"https://example.com/dir/script.php"
```

Zou het tekst bestand, dat een naam zal hebben als "smtpeter-xxxxx.txt", 
in dezelfde folder geplaatst moeten worden:

```text
"https://example.com/dir/smtpeter-xxxxx.txt"
```

Je kunt nu de callback URL verifiëren door op de link in de Marketing Suite 
te klikken. Hierna mag het tekstbestand verwijderd worden. Je kunt je 
Webhook testen door het menu voor de Webhook te openen en de tool onder 
de callback URL te gebruiken om te testen. Het is ook mogelijk al je Webhooks 
te testen in het Webhook menu.

## Veiligheid

Om jouw script te behoeden voor misbruik en incorrecte informatie voegt Copernica 
[signatures](./webhook-security) toe aan het verzoek. Door de juiste checks 
te implementeren kun je zo verzekeren dat alleen data van Copernica 
jouw systeem binnenkomt.

## Meer informatie

* [Statistieken](./statistics)
* [Logfiles](./logfiles-ms)
* [REST API](./rest-api)
* [SOAP API](./soap-api-documentation)
* [Webhooks voor bounces](webhook-bounces)
* [Webhooks voor failures](webhook-failures)
* [Webhooks voor kliks](webhook-clicks)
* [Webhooks voor opens](webhook-opens)
* [Webhooks voor aangemaakte (sub)profielen](webhook-creates)
* [Webhooks voor geüpdatete (sub)profielen](webhook-updates)
* [Webhooks voor verwijderde (sub)profielen](webhook-deletes)
