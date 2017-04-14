# REST en DSN Messages

Als je de REST API gebruikt om e-mail te versturen, doe je dit hoogstwaarschijnlijk vanuit je website of app. Het is meestal niet wenselijk om je *bounces* zelf af te handelen. Maar, als je zelf je bounces wil afhandelen is dit mogelijk door een “*envelope*” property toe te voegen met het e-mailadres naar waar de bounces naartoe gestuurd moeten worden.

````json
{
    "envelope":     "youraddress@yourdomain.com",
    "recipient":    "example@example.com",
    "mime":         "...."
}

Door een *envelope* adres toe te voegen zorg je ervoor dat SMTPeter geen bounces registreert. De *delivery status notification messages* worden dan naar het envelope adres gestuurd.

## Speciale DSN properties

Met de “*dsn*” variabele kun je aangeven wat voor soort berichten je wilt ontvangen.

````json
{
    "envelope":     "youraddress@yourdomain.com",
    "recipient":    "example@example.com",
    "mime":         "....",
    "dsn": {
        "notify":   "FAILURE",
        "ret":      "HDRS"
    }
}
````

Met het “notify” veld kun je aangeven wanneer je een e-mail notificatie wilt ontvangen. Je kan dit op zowel “SUCCESS” of “FAILURE” zetten. Als je bounces in beide gevallen wilt ontvangen kun je “SUCCESS,FAILURE” gebruiken. De standaardwaarde is “FAILURE”.

Met het “ret” veld heb je de controle over de inhoud van de bounce, of het hele e-mailbericht is meegeleverd, of alleen de headers in de bounce. De mogelijke waarden zijn “FULL” en “HDRS”. De standaardwaarde is “HDRS”.

Hou in gedachten dat als je veel e-mails verstuurd je waarschijnlijk ook veel bounces ontvangt. Dit kan je mailbox snel doen overstromen.
