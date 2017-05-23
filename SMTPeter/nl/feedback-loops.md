# Feedbackloops

SMTPeter maakt het mogelijk om *feedbackloops* aan te maken. Deze feedbackloops
kunnen worden gebruikt om live *event* notificaties te ontvangen. Elke keer wanneer 
er iets gebeurt op de servers van SMTPeter (zoals bijvoorbeeld een *bounce*, *failed delivery* 
of een link-click), krijg je een melding.

De feedback wordt verstuurd over het HTTP of HTTPS protocol door middel van 
het HTTP POST mechanisme. Tijdens het [aanmaken van een feedbackloop](feedback-setup "Feedbackloops aanmaken") 
registreer je een web adres en geef je aan welke events moeten worden aangeleverd.
SMTPeter begint met het maken van calls als de URL is gevalideerd.  


## Pas op!

Voordat je begint met het aanmaken van een feedbackloop, is het handig om te checken of
je server de lading van de processen aankan. Zeker wanneer de feedbackloop wordt 
aangeroepen als [iemand een e-mail opent](feedback-opens "Feedbackloops voor opens"), aangezien hier vaak een grote
hoeveelheid calls mee gemoeid is.

Vind je deze optie op dit moment te gevaarlijk voor je servers of heb je geen live events
nodig? Dan kun je beter de [REST API](rest-send "Verzenden via REST") gebruiken om periodiek [de laatste logfiles](rest-logfiles "Opvragen van logfiles")
te downloaden. De REST API levert exact dezelfde informatie als de feedback loops.
Echter, met de REST API hou je de controle en bepaal je zelf welke data je wilt opvragen.


## Types van de events

De volgende feedbackloops kunnen worden gebruikt:

* [Feedbackloops voor bounces](feedback-bounces "Feedbackloops voor bounces")
* [Feedbackloops voor failures](feedback-failures "Feedbackloops voor failures")
* [Feedbackloops voor clicks](feedback-clicks "Feedbackloops voor kliks")
* [Feedbackloops voor opens](feedback-opens "Feedbackloops voor opens")
