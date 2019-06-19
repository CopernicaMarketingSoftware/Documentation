# Webhooks

SMTPeter maakt het mogelijk om *Webhooks* aan te maken, die voorheen feedback loops werden genoemd. 
Deze webhooks kunnen worden gebruikt om live *event* notificaties te ontvangen. Elke keer wanneer 
er iets gebeurt op de servers van SMTPeter (zoals bijvoorbeeld een *bounce*, *failed delivery* 
of een link-click), krijg je een melding.

De feedback wordt verstuurd over het HTTP of HTTPS protocol door middel van 
het HTTP POST mechanisme. Tijdens het [aanmaken van een webhook](webhook-setup "Webhooks aanmaken") 
registreer je een web adres en geef je aan welke events moeten worden aangeleverd.
SMTPeter begint met het maken van calls als de URL is gevalideerd.  

## Pas op!

Voordat je begint met het aanmaken van een webhook, is het handig om te checken of
je server de lading van de processen aankan. Zeker wanneer de webhook wordt 
aangeroepen als [iemand een e-mail opent](webhook-opens "Webhooks voor opens"), aangezien hier vaak een grote
hoeveelheid calls mee gemoeid is.

Vind je deze optie op dit moment te gevaarlijk voor je servers of heb je geen live events
nodig? Dan kun je beter de [REST API](rest-send "Verzenden via REST") gebruiken om periodiek [de laatste logfiles](rest-logfiles "Opvragen van logfiles")
te downloaden. De REST API levert exact dezelfde informatie als de webhooks.
Echter, met de REST API hou je de controle en bepaal je zelf welke data je wilt opvragen.

## Types van de events

De volgende webhooks kunnen worden gebruikt:

* [Webhooks voor bounces](webhook-bounces)
* [Webhooks voor clicks](webhook-clicks)
* [Webhooks voor failures](webhook-failures)
* [Webhooks voor opens](webhook-opens)
