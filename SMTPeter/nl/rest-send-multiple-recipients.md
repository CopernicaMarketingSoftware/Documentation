# Een mail naar meerder ontvangers versturen

Wanneer je dezelfde mail naar meerdere ontvangers wilt versturen, bijvoorbeeld
wanneer er meerdere "to" of "cc" headers zijn, of wanneer je dezelfde mail wilt
bcc-en, dan hoef je niet voor elke ontvanger een POST request te sturen.
Je kunt in zo'n geval alle recipients die de mail moeten ontvangen in de
mee te zenden JSON specificeren onder property "recipients". 

Een voorbeeld van een JSON waarbij de mail naar meerdere ontvangers verstuurd
wordt is:

```json
{
    "recipients": [
        "alice@example.com",
        "bob@example.com",
        "charles@example.com"
    ]
    "from": "info@example.com",
    "to": [
        "alice@example.com",
        "bob@example.com"
    }
    "subject": "Dit is het onderwerp",
    "text":    "Hoi Alice en Bob!",
}
```

Wanneer een bovenstaand bericht ontvangen wordt door SMTPeter dan wordt een mail
geconstrueerd met daarin twee "to" velden. Deze mail wordt naar Alice, Bob
en Charles gestuurd. Alice en Bob kunnen niet zien dat ook Charles het bericht
ontvangt. Charles wordt in dit geval dus ge-bcc'd.

Als je een mail naar meerdere mensen wilt sturen, maar je wilt elke mail
er wel persoonlijk uit laten zien, dan wil je waarschijnlijk onze 
[Personalisatie van e-mails](rest-send-personalize) documentatie lezen.
