# Een mail naar meerder ontvangers versturen

Wanneer je dezelfde e-mail naar meerdere ontvangers wilt versturen, bijvoorbeeld
wanneer er meerdere "to" of "cc" headers zijn, of wanneer je dezelfde mail wilt
bcc-en, dan hoef je niet voor elke ontvanger een POST request te sturen.
Je kunt in zo'n geval alle recipients die de e-mail moeten ontvangen in de
mee te zenden JSON specificeren onder property "recipients". 

Een voorbeeld van een JSON waarbij de mail naar meerdere ontvangers verstuurd
wordt is:

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
    "text": "Hoi Alice en Bob!",
}
```

In het bovenstaande voorbeeld ontvangt SMTPeter een JSON van een gebruiker. 
SMTPeter constateert dat er twee "to" velden zijn. Deze e-mail wordt vervolgens
naar Alice, Bob en Charles gestuurd. Alice en Bob kunnen niet zien dat ook Charles 
het bericht ontvangt. Charles wordt in dit geval dus ge-bcc'd.

SMTPeter biedt ook de mogelijkheid om een gepersonaliseerde e-mails naar meerdere 
ontvangers te versturen. Wil je weten hoe je dat kunt doen? 
[Personalisatie van e-mails](rest-send-personalize)
