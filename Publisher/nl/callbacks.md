# Callbacks
Een webhook is een manier om geïnformeerd te worden van gewijzigde gegevens door middel van een HTTP POST-request. Webhooks worden in de Publisher "Callbacks" genoemd. Callbacks kunnen aangeroepen worden bij een wijziging in een (sub)profiel.

Controleer voordat je een webhook instelt of je server de inkomende datastroom wel aankan. De webhooks die geactiveerd worden bij het openen van een mail, ontvangen vaak grote aantallen notificaties. Als je niet zeker weet of je server al deze notificaties aankan of als je geen behoefte hebt aan real-time terugkoppeling, is het beter om de "algemene statistieken" te gebruiken.

## Callbacks instellen
Op de pagina "Profielen" kun je onder het kopje "Databasebeheer" de callbacks per database of collectie beheren. Bij het aanmaken van een callback krijgt je een scherm te zien met de volgende opties:
*   URL:              De url waarnaar de callback verwijst.
*   Methode:          Format van de data die verstuurd wordt.
*   Type actie:       De actie die de callback aanroept.
*   Triggers:         Triggers die de callbacks kunnen aanroepen.

Voor de "Type actie" kan gekozen worden uit de volgende mogelijkheden:
*   [create](./callbacks-variables):      Bij het aanmaken van een nieuw (sub)profiel.
*   [update](./callbacks-variables):      Bij het wijzigen van een (sub)profiel.
*   [delete](./callbacks-variables):      Bij het verwijderen van een (sub)profiel.
*   all:                                  Bij alle bovengenoemde acties.

### Triggers
Een webhook kan op meerdere momenten aangeroepen worden, een profiel kan bijvoorbeeld gewijzigd worden door een API call. Dit is echter niet altijd wenselijk. Door middel van de triggers kunnen deze calls daarom genegeerd worden door de `rest` trigger te deselecteren. De callbacks kent de volgende triggers:
*  publisher:    Handmatige update in publisher
*  rest:         Binnenkomende rest API call
*  soap:         Binnenkomende soap API call
*  click:        Update door middel van een click
*  open:         Update door middel van een open
*  failure:      Bij de rapportage van een failure mail
*  bounce:       Bij de rapportage van een bounce
*  import:       Een database import
*  copy:         Het kopiëren van een database

## Callback condities
Het mooie van ons callback systeem is dat je condities kan toevoegen aan de callbacks. Deze condities kunnen bijvoorbeeld gebruikt worden om alleen de callbacks aan te roepen met de naam "Piet". Lees [hier](./selections-conditions-partcondition) meer over het toepassen van condities.

## Webhook beveiliging
Al onze HTTP requests bevatten een signature. Door middel van deze signature kunnen berichten afkomstig van Copernica gevalideerd worden. Een HTTP request afkomstig van Copernica bevat de volgende headers: 
*   (request-target):     De url waarna deze request verwijst (bijv. /path/to/your/script.php).
*   Host:                 De hostnaam.
*   Date:                 De datum waarop dit verzoek is gemaakt.
*   X-Copernica-ID:       Je Copernica account id.
*   Digest:               De samenvatting van het bericht.

Raadpleeg de pagina [Callback security](./callbacks-security) voor meer informatie over de beveiliging van webhooks.

# More Information
*   [Callback beveiliging](./callbacks-security)
