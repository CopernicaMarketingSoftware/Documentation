# Headers
Headers worden gebruikt om informatie mee te geven aan een e-mail.
Er zijn gestandaardiseerde headers zoals "From" en "Subject", maar je
kunt ook zogenaamde "X-headers" gebruiken.

In de Marketing Suite vind je al deze headers bovenaan de Template Editor
bij het aanmaken van een e-mail. In Publisher kun je deze vinden bij het
aanmaken van een mailing onder het **E-mailings** menu.

## BCC-header
De BCC (Blind Carbon Copy) kan gebruikt worden om kopieën van e-mails te
versturen naar een of meerdere adressen, zonder dat deze elkaars e-mailadres <
te zien krijgen. Zo is er minder kans dat de adressen bij spammers
belanden, of dat er per ongeluk een lange ketting van "Allen beantwoorden"
e-mails ontstaat. Ook kunnen de adressen niet gebruikt worden door virussen
die zichzelf door adressen verspreiden.

## X-headers
X-headers zijn extra headers die toegevoegd worden naast de gebruikelijke
headers als "From", "Subject" en dergelijke. De "X-" in X-header staat voor
eXperimenteel of eXtensie. Je kunt hier je eigen waarden voor gebruiken
om extra informatie mee te geven aan je e-mail. Je kunt dus helemaal zelf
bepalen welke X-headers je gebruikt of wat je meegeeft. Je kan bijvoorbeeld
de naam van je selectie of campagne meegeven voor je eigen statistieken.

Met Copernica kun je hier ook personalisatie gebruiken. Zo kun je bijvoorbeeld
aan elke e-mail een "X-PF-ID" meegeven, waar je de ID van een profiel meegeeft
(bijvoorbeeld omdat deze anders is in je eigen database). Als de e-mail
vervolgens niet aankomt kun je dit profiel zo terug zoeken in je eigen database
en contacteren om het probleem op te lossen.

## List-Unsubscribe header
De list-unsubscribe header is extra informatie die wordt toegevoegd aan een e-mail, 
met daarin instructies om een uitschrijfknop te tonen bij de e-mail. Als iemand 
van de knop gebruik maakt, gaat  er een bericht terug naar Copernica zodat de 
afmelding verwerkt kan worden. Hierbij wordt gebruik gemaakt van het ingestelde 
[uitschrijfgedrag](./database-unsubscribe-behavior) op de bestemming.

In de geavanceerde headers van je template vind je de optie 'Uitschrijfheader'. 
Deze header staat standaard aan omdat dit belangrijk is voor een goede 
[verzendreputatie](./send-reputation). Daarnaast worden spamfilters positief 
beïnvloed als ze een list-unsubscribe header bij je e-mail zien, waardoor zij 
eenvoudiger je e-mail doorlaten naar de inbox. Het is een soort garantie dat je 
een legitieme verzender bent. En het maakt het eenvoudiger om je reputatie te 
monitoren voor de waakhonden van het e-mailverkeer (Return Path, Lashback, Listbox
, e.a.).

De list-unsubscribe header is geen vervanger voor de eigen uitschrijflink in het
template of doument.

## Meer informatie
* [Templates in Marketing Suite](./emailings-ms-templates)
* [Templates in Publisher](./emailings-publisher-templates)
* [Tips, tricks en achtergrond](./tips-and-tricks)
