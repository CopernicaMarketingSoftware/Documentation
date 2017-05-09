# Meerdere ontvangers

Het kan voorkomen dat je dezelfde e-mail naar meerdere ontvangers wilt versturen. 
Bijvoorbeeld wanneer er meerdere "to" of "cc" headers zijn, of wanneer je dezelfde 
e-mail wilt bcc-en. Je hoeft niet per se voor elke ontvanger een POST request te sturen.
Je kunt in zo'n geval alle recipients, die de e-mail moeten ontvangen, in de
mee te zenden JSON specificeren. Je doet dit bij de "recipients" property. 

Hieronder staat een voorbeeld van een JSON waarbij de e-mail naar meerdere ontvangers wordt verstuurd:

```json
{
    "recipients": [
        "alice@example.com",
        "bob@example.com",
        "charles@example.com"
    ],
    "from": "info@example.com",
    "to": [
        "alice@example.com",
        "bob@example.com"
    ],
    "subject": "Dit is het onderwerp",
    "text": "Hoi Alice en Bob!"
}
```

In het bovenstaande voorbeeld ontvangt SMTPeter een JSON van een gebruiker. 
SMTPeter constateert dat er twee "to" velden zijn. Deze e-mail wordt vervolgens
naar Alice, Bob en Charles gestuurd. Alice en Bob kunnen niet zien dat ook Charles 
het bericht ontvangt. Charles wordt in dit geval dus ge-bcc'd.

SMTPeter biedt ook de mogelijkheid om een gepersonaliseerde e-mail naar meerdere 
ontvangers te versturen. Wil je weten hoe je dat kunt doen? 
[Personalisatie van e-mails](rest-send-personalize)

## Meer informatie

* [REST API](./rest-api)
* [Aanmaken van MIME data met SMTPeter](./rest-send-json)
* [Personalizatie](./rest-send-personalize)