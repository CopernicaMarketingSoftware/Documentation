# MIME data versturen

Je hebt tenminste twee properties nodig om een e-mail te kunnen versturen. Het
"recipient" adres dat gebruikt gaat worden in het *RCPT TO* gedeelte van de SMTP
protocol en de algehele "MIME" data.

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```
Om alles leesbaar te maken, hebben we het merendeel van de "MIME" code van het 
voorbeeld verwijderd. Als je zelf geen "MIME" bericht wil maken, kun je de 
property weglaten. Gebruik dan wel de [special MIME properties](rest-mime "MIME data versturen")
zoals "subject", "text" en "html" zodat SMTPeter de mime data kan aanmaken.

Je hoeft enkel en alleen een "recipient" adress aan te leveren om een e-mail te
versturen. Echter, als je bekend bent met het SMTP protocol weet je dat je
normaal gesproken ook een *envelope address* moet opgeven. Dit envelope address 
is het adres waar *bounces* of momenteel-niet-op-kantoor *replies* naartoe
worden verstuurd. SMTPeter neemt alle zorgen weg omtrent het afhandelen van die 
bounces en daarom hoe je in dit geval geen envelope adres op te geven. SMTPeter 
doet dit proces helemaal zelfstandig.

Het is ook mogelijk om zelf bounces af te handelen. Dit doe je door een extra 
envelope adres toe te voegen aan de *input data*. Naast dit envelope adres
is het wellicht ook interessant om een [DSN property](rest-dsn "REST en DSN Messages") toe te voegen.
Hiermee kun je aangeven welke soort berichten je over de bounces wilt ontvangen.

```json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```