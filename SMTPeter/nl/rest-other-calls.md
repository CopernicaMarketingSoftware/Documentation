# Overige REST calls

De REST API biedt naast de vele verzendopties ook nog een aantal andere opties.
Deze 'calls' zijn heel erg handig om inzicht te krijgen in de processen rondom
je verstuurde e-mails. Je kunt dit doen door het opvragen van 'events', 'log files' 
of 'DMARC reports'. Daarnaast kun je ook 'templates' beheren. De REST API is 
flexibel en geeft je alle opties die je nodig hebt.


## Opvragen van berichten

Allereerst kun je met de REST API berichten opvragen. De e-mails die je in het
verleden verstuurd hebt met SMTPeter, worden allemaal opgeslagen in de database.
De e-mails kun je opvragen in het formaat naar keuze. Bijvoorbeeld in HTML of text.
SMTPeter maakt bij het loggen slimme keuzes en slaat alleen e-mails op die verschillen
ten opzichte van de andere e-mails. Je kunt in het 'dashboard' altijd nagaan hoeveel
data wordt ingenomen door je account en waarnodig weggooien. Vraag nu direct je eerste
berichten op door [hier](rest-events) te klikken.


## Opvragen van 'events'

SMTPeter houdt constant in de gaten wat er met je verstuurde e-mails gebeurt. Door middel
van de 'log files' kun je alle data inzien. Echter, soms wil je liever een bepaald 'event'
bekijken. SMTPeter maakt precies dat mogelijk. Je kunt precies zien welke 'calls' je moet
aanroepen om het gewenste resultaat te krijgen door [hier](rest-events) te klikken.


## Opvragen van 'log files'

Het opvragen van de 'log files' is hierboven al kort toegelicht. Je kunt ook bij de 'log files'
specificeren welke data je precies wilt ontvangen. Voor de algehele info kun je [hier](rest-logfiles)
klikken.


## Opvragen van 'DMARC reports'

De 'DMARC reports' kunnen ook worden opgevraagd middels de REST API. De informatie omtrent 
alle DMARC 'calls' kan [hier](rest-dmarc) worden gevonden.



## Templates beheren

Tot slot helpt de API je ook bij het beheren van 'templates'. Je kunt binnen SMTPeter
'templates' ontwerpen met de 'drag-and-drop' editor. Het is ook mogelijk om met de 
REST API je 'templates' te beheren. Dit betekent dat je 'templates' kunt aanmaken, opvragen 
en versturen. Hoe dit precies werkt, lees je [hier](rest-templates).