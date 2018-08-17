# Headers

Headers worden gebruikt om informatie mee te geven aan een email. 
Er zijn gestandaardizeerde headers zoals "From" en "Subject", maar je 
kunt ook zelf zogenaamde "x-headers" gebruiken.

In Marketing Suite vind je al deze editors bovenaan de Template Editor 
bij het aanmaken van een email. In Publisher kun je deze vinden bij het 
aanmaken van een mailing onder het **E-mailings** menu.

## BCC header

De BCC (Blind Carbon Copy) kan gebruikt worden om kopieën van emails te 
versturen naar een of meerdere adressen, zonder dat deze elkaars e-mailadres 
te zien krijgen. Zo is er minder kans dat de adressen bij spammers 
belanden, of dat er per ongeluk een lange ketting van "Allen beantwoorden" 
emails ontstaat. Ook kunnen de adressen niet gebruikt worden door virussen 
die zichzelf door adressen verspreiden.

## X-headers

X-headers zijn extra headers die toegevoegd worden naast de gebruikelijke 
headers als "From", "Subject" en dergelijke. De "X-" in X-header staat voor 
eXperimenteel of eXtensie. Je kunt hier je eigen waarden voor gebruiken 
om extra informatie mee te geven aan je email. Je kunt dus helemaal zelf 
bepalen welke X-headers je gebruikt of wat je meegeeft. Je kan bijvoorbeeld 
de naam van je selectie of campagne meegeven voor je eigen statistieken.

Met Copernica kun je hier ook Smarty [personalisatie](./personalization) 
gebruiken. Zo kun je bijvoorbeeld aan elke email een "X-PF-ID" meegeven, 
waar je de ID van een profiel meegeeft (bijvoorbeeld omdat deze anders 
is in je eigen database). Als de email vervolgens niet aankomt kun je 
dit profiel zo terug zoeken in je eigen database en contacteren om het 
probleem op te lossen.

## Unsubscribe

Je kunt ook altijd de *list unsubscribe* header toevoegen. Hiermee 
kunnen sommige emailclienten meteen een unsubscribe link bovenaan de 
email plaatsen. Wij raden je aan altijd minstens een uitschrijflink te 
plaatsen. Dit komt ten goede aan je [reputatie als verzender](./sender-reputation) 
en je kan het [uitschrijfgedrag](./database-unsubscribe-behavior) zelf 
instellen. 

## Meer informatie

* [Templates](./templates)
* [Templates in Marketing Suite](./templates-marketing-suite)
* [Templates in Publisher](./templates-publisher)
* [Tips, tricks en achtergrond](./tips-and-tricks)
