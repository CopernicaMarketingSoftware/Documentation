# Error types en codes

Dit artikel legt het verschil tussen zogenaamde soft en hard bounces uit 
en hoe je om kunt gaan met errors van mails die niet aankomen.

## E-mail error codes

Als een email niet afgeleverd kan worden stuurt de ontvangende mailserver 
meestal een bericht terug met de error code en een korte beschrijving van 
de error. Er zijn twee belangrijke types:

-   Soft bounces: Tijdelijke errors. Error codes beginnen met een 4 (4.XX)
-   Hard bounces: Aanhoudende errors. Error codes beginnen met een 5 (5.XX)

## Een error identificeren

Het verschil tussen een hard en een soft bounce lijkt simpel, maar er kunnen 
in werkelijkheid vele redenen zijn dat een email niet aankomt, onafhankelijk 
van het soort bounce. Omdat enkel het onderscheid kunnen maken tussen deze 
types niet genoeg is om alle errors op te lossen kijken we liever naar 
waar in het verstuurproces de error zich voor heeft gedaan.

We delen het verwerken en afleveren van een email in vijf stappen:

-   Stap 1: Domein naam wordt omgezet naar een IP adres.
-   Stap 2: Er wordt een connectie gemaakt met het IP adres.
-   Stap 3: Er wordt een connectie gemaakt met de ontvangende mailserver, bijvoorbeeld Hotmail.
-   Stap 4: De email wordt geaccepteerd door de ontvangende mailserver of stuurt een error terug.
-   Stap 5: Als zich hierna nog een error voordat wordt de email teruggestuurd 
naar ons, vaak inclusfief error code. Meer informatie over deze error codes 
kun je [hier](http://www.emailaddressmanager.com/tips/codes.html) vinden.

Soms worden alle errors binnen stappen 1-3 als een hard bounce beschouwd, 
maar sommigen beschouwen ook een error in stap 4 nog als een hard bounce. 
Dit laat stappen 4 en 5 over als mogelijke stappen waarin een soft bounce 
zich voordoet. Het is echter ook mogelijk de stappen buiten beschouwing te 
laten en afhankelijk van de error iets een soft bounce of hard bounce te noemen.

Je kunt de errors van je mailings ook terug vinden onder het tabje **Error**. 
Hier wordt ook de error gespecificeerd, indien mogelijk. Je kunt deze 
ook laten aanleveren aan een script op je eigen server met [WebHooks](./webhooks).

## Errors oplossen

Hoe een error opgelost wordt hangt af van de gebruiker van de software 
en van de ontvanger van de mail. Als er bijvoorbeeld andere contactinformatie, 
zoals een telefoonnummer, bekend is kan er op deze wijze contact opgenomen 
worden. Zo kan bijvoorbeeld het correcte emailadres opgevraagd worden.

Als emails nooit aankomen bij een specifiek adres is het beter om deze 
gebruikers niet meer te mailen, door ze buiten je maillijst te laten of 
geheel uit je database te verwijderen. Het is mogelijk een selectie te maken 
gebaseerd op errors met het selectie type "Check op resultaten e-mailcampagnes". 
Hier kun je dan instellen dat gebruikers die errors veroorzaken niet meer 
gemaild mogen worden.

## Meer informatie

* [Statistieken](./statistics)
* [Webhook voor bounces](./webhook-bounces)
