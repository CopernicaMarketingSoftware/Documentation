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
Het merendeel van de "MIME" code is in dit geval weggelaten om het voorbeeld
makkelijk te kunnen begrijpen. Je kunt de "mime" property weglaten, als je 
zelf geen "MIME" bericht wil maken. Gebruik dan wel de speciale properties 
zoals "subject", "text" en "html", zodat SMTPeter de mime data kan aanmaken 
(zie [MIME door SMTPeter laten maken](rest-send-json)).

Je hoeft enkel en alleen een *recipient adress* aan te leveren om een e-mail te
versturen. Echter, als je bekend bent met het SMTP protocol weet je dat je
normaal gesproken ook een *envelope address* moet opgeven. Dit envelope address 
is het adres waar *bounces* of momenteel-niet-op-kantoor *replies* naartoe
worden verstuurd. SMTPeter neemt alle zorgen weg omtrent het afhandelen van die 
bounces en daarom hoef je in dit geval geen envelope adres op te geven. SMTPeter 
doet dit proces helemaal zelfstandig.

Het is ook mogelijk om zelf bounces af te handelen. Dit doe je door een extra 
envelope adres toe te voegen aan de *input data*. Naast dit envelope adres
is het wellicht ook interessant om een [DSN property](rest-dsn "REST en DSN Messages") 
toe te voegen. Hiermee kun je aangeven welke soort berichten je over de bounces wilt ontvangen.

```json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

## Meer informatie

* [REST API](./rest-api)
* [Geavanceerde verzend opties](./rest-send-advanced)
* [Aangepaste DSN eigenschappen voor notificaties](./rest-dsn)
* [Aanmaken van MIME data met SMTPeter](./rest-send-json)
* [API respons](./rest-api-reaction)