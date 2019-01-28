# Callbacks
Een webhook is een manier om op de hoogte gehouden te worden door middel van een HTTP POST-request. In de Publisher worden webhooks, Callbacks genoemd. Callbacks kunnen aangeroepen worden bij een wijziging in een (sub)profiel.

Controleer voordat je een webhook instelt of je server de inkomende datastroom wel aankan. Met name de webhooks die geactiveerd worden bij het openen van een mail, ontvangen grote aantallen notificaties. Als je niet zeker weet of je server al deze notificaties aankan of als je geen behoefte hebt aan real-time terugkoppeling, is het beter om de "algemene statistieken" te gebruiken.

## Callbacks instellen
Op de pagina "Profielen" kun je onder het kopje Databasebeheer de callbacks per database of collectie beheren. Bij het aanmaken van een callback krijgt je een scherm te zien met de volgende opties:
*   URL:              De url waarnaar de callback verwijst.
*   Methode:          Format van de data dat verstuurd wordt.
*   Type actie:       De actie die de callback aanroept.
*   Triggers:         Triggers die de webhooks kunnen aanroepen.

Voor de "Type actie" kan gekozen worden uit de volgende mogelijkheden:
*   [create](./callbacks-variables):      Bij het aanmaken van een nieuw (sub)profiel.
*   [update](./callbacks-variables):      Bij het wijzigen van een (sub)profiel.
*   [delete](./callbacks-variables):      Bij het verwijderen van een (sub)profiel.
*   all:                                  Bij alle bovengenoemde acties.

### Triggers
Een webhook kan op meerdere momenten aangeroepen worden. een profiel kan bijvoorbeeld gewijzigd worden door een API call. Dit is niet altijd wenselijk, door middel van de triggers kunnen deze calls genegeerd worden door de `rest` trigger te deselecteren. De callbacks kent de volgende triggers:
*  publisher:    Handmatige update in publisher
*  rest:         Binnenkomende rest API call
*  soap:         Binnenkomende soap API call
*  click:        Update door middel van een click
*  open:         Update door middel van een open
*  failure:      Bij het de rapportage van een failure mail
*  bounce:       Bij het de rapportage van een bounce
*  import:       Een database import
*  copy:         Het kopiëren van een database

## Callback condities
Het mooie van ons callback systeem is dat je callbacks kunt conditioneren. De condities kunnen bijvoorbeeld gebruikt worden om alleen de callbacks aan te roepen met de naam "piet". Lees [hier](./selections-conditions-partcondition) meer over het maken van condities.

## Webhook beveiliging
All onze HTTP requests bevatten een signature, door middel van deze signature kunnen berichten afkomstig van Copernica gevalideerd worden. Een HTTP request afkomstig van Copernica bevat de volgende headers: 
*   (request-target):     De url waarna deze request verwijst (bijv. /path/to/your/script.php).
*   Host:                 De hostnaam.
*   Date:                 De datum waarop dit verzoek is gemaakt.
*   X-Copernica-ID:       Je Copernica account id.
*   Digest:               De samenvatting van het bericht.

Raadpleeg de pagina [Callback security](./callbacks-security) voor meer informatie over de beveiliging van webhooks.

# More Information
*   [Callback beveiliging](./callbacks-security)
