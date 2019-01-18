# Callbacks
een webhook is een manier om, door middel van een HTTP POST request, op de hoogte gehouden te worden. In Publisher worden webhooks, Callbacks genoemd. Callbacks kunnen aangeroepen worden bij een wijziging in een (sub)profiel.

Controleer voordat je webhook instelt of je server de inkomende datastroom wel aankan. Met name de webhooks die geactiveerd worden bij het openen van een mail, ontvangen grote aantallen notificaties. Als je niet zeker weet of je server al deze notificaties aankan, of als je geen behoefte hebt aan real-time terugkoppeling, is het beter om de algemene statistieken te gebruiken.

## Callbacks instellen
op de pagina Profielen kunt je onder het kopje Databasebeheer de callbacks per database of collectie beheren. Bij het aanmaken van een callback krijgt je een scherm te zien met de volgende opties:
*   URL:                                        De url waarnaar deze callback verwijst.
*   Methode:                                    Format van de data dat verstuurd wordt.
*   Type actie:                                 De actie die de callback aanroept.
*   uitschakelijk Bij API callss (optioneel):   Dienen de callbacks aangeroepen te worden bij een [API](rest-api) call.

Voor de "Type actie" kan gekozen worden uit de volgende mogelijkheden:
*   [create]():      Bij het aanmaken van een nieuw (sub)profiel.
*   [update]():      Bij het wijzigen van een (sub)profiel.
*   [delete]():      Bij het verwijderen van een (sub)profiel.
*   all:             Bij alle boven genoemde acties.

## Callback condities
Het mooie van onze Callback systeem is dat je callbacks kunt conditioneren. De condities kunnen bijvoorbeeld gebruikt worden om alleen de callbacks aan te roepen met de naam "piet". Lees [hier](selections-conditions-partcondition) meer over het maken van condities.

## Webhook beveiliging
All onze HTTP requests bevatten een signature, door middel van deze signature kunnen berichten afkomstig van Copernica gevalideerd worden. Een HTTP request afkomstig van Copernica bevat de volgende headers: 
*   (request-target):     De url waarna deze request verwijst (bijv. /path/to/your/script.php).
*   Host:                 De hostnaam.
*   Date:                 De datum waarop dit verzoek is gemaakt.
*   X-Copernica-ID:       Je Copernica account id.
*   Digest:               De berichtsamenvatting.

Raadpleeg de pagina [Callback security](callbacks-security) voor meer informatie over de beveiliging van webhooks.

# More Information
- [Callback beveiliging](callbacks-security)
