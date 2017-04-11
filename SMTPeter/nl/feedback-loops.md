# Feedback loops

SMTPeter maakt het mogelijk om 'feedback loops' aan te maken. Deze 'feedback loops'
kunnen worden gebruikt om live 'event' notificaties te ontvangen. Elke keer wanneer 
er iets gebeurt op de servers van SMTPeter (zoals bijvoorbeeld een 'bounce', 'failed delivery' 
of een link klik), krijg je een melding.

De feedback wordt verstuurd over het HTTP of HTTPS protocol door middel van 
het HTTP POST mechanisme. Tijdens het [aanmaken van een 'feedback loop'](feedback-setup) 
registreer je een web adres en geef je aan welke 'events' moeten worden aangeleverd.
SMTPeter begint met het maken van 'calls' als de URL is gevalideerd.  


## Pas op!

Voordat je begint met het aanmaken van een 'feedback loop', is het handig om te checken of
je server de lading van de processen aankan. Zeker wanneer de 'feedback loop' wordt 
aangeroepen als [iemand een mail opent](feedback-opens), aangezien hier vaak een grote
hoeveelheid 'calls' mee gemoeid is.

Vind je deze optie op dit moment te gevaarlijk voor je servers of heb je geen live events
nodig? Dan kan je beter de [REST API](rest-api) gebruiken om periodiek [de laatste 'log files'](rest-logfiles)
te downloaden. De REST API levert exact dezelfde informatie als de 'feedback loops'.
Echter, met de REST API hou je de controle en bepaal je zelf welke data je wilt opvragen.


## Types van de 'events'

De volgende 'feedback loops' kunnen worden gebruikt:

* ['Feedback loops' voor 'bounces'](feedback-bounces)
* ['Feedback loops' voor 'failures'](feedback-failures)
* ['Feedback loops' voor 'clicks'](feedback-clicks)
* ['Feedback loops' voor 'opens'](feedback-opens)
