# REST en DSN Messages

Als je de REST API gebruikt om e-mail te versturen, doe je dit hoogstwaarschijnlijk vanuit je website of app. Het is meestal niet wenselijk om je *bounces* zelf af te handelen. Je kunt dit wel doen als je dat echt wilt. Voeg dan een “*envelope*” property toe met het e-mailadres waar de bounces naartoe moeten  worden verstuurd.

```json
{
    "envelope":     "youraddress@yourdomain.com",
    "recipient":    "example@example.com",
    "mime":         "...."
}
```

Door een *envelope* adres toe te voegen, zorg je ervoor dat SMTPeter geen bounces registreert. De *delivery status notification messages* worden dan naar het envelope adres gestuurd.

## Speciale DSN properties

Met de "dsn" variabele kun je aangeven wat voor soort berichten je wilt ontvangen:

```json
{
    "envelope":     "youraddress@yourdomain.com",
    "recipient":    "example@example.com",
    "mime":         "....",
    "dsn": {
        "notify":   "FAILURE",
        "ret":      "HDRS"
    }
}
```

Met het “notify” veld kun je aangeven wanneer je een e-mail notificatie wilt ontvangen. Je kunt dit op “SUCCESS” of “FAILURE” zetten. Als je bounces in beide gevallen wilt ontvangen kun je “SUCCESS, FAILURE” gebruiken. De standaardwaarde is “FAILURE”.

Met het “ret” veld heb je de controle over de inhoud van de bounce. Is het hele e-mailbericht is meegeleverd? Of alleen de headers in de bounce? 
De mogelijke waardes zijn “FULL” en “HDRS”. De standaardwaarde is “HDRS”.
Houd in gedachten dat als je veel e-mails verstuurt, je waarschijnlijk ook veel bounces ontvangt. Dit kan je mailbox snel doen overstromen.