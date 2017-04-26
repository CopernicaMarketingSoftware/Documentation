# Domeinnaam en poorten

De SMTP API is bereikbaar via “mail.smtpeter.com”. Alle e-mails moeten worden verstuurd via een met STARTTLS versleutelde verbinding. Alleen geauthenticeerde en encrypted verbindingen worden ondersteund. E-mails die niet geauthenticeerd zijn of over een onveilige verbinding worden verstuurd, worden geweigerd.

```text
Host:       mail.smtpeter.com
Port:       25, 587, 2525
Encryption: STARTTLS
```

Let erop dat we e-mail kunnen weigeren tijdens de “RCPT TO” fase van het SMTP, of nadat je alle data van het bericht hebt verstuurd. Soms verwerken we het hele bericht om erachter te komen wie onze systemen probeert te misbruiken, en weigeren we de mail pas als we het volledige bericht hebben gezien.

## Poorten

Je kunt poort **25**, **587** en **2525** gebruiken om e-mail te sturen met SMTPeter. Er zit geen verschil tussen deze poorten, behalve dat sommige providers poort 25, de originele SMTP-poort, hebben geblokkeerd. Poort 2525 is vooral handig voor gebruikers van Google Cloud, aangezien Google Cloud poort 25 en 587 allebei niet ondersteunt.

Als alternatief op poort 25 en 587 kun je ook verbinden met poort **465**. Deze poort opent automatisch een veilige TCP-verbinding en slaat de STARTTLS-handshake over. Hoewel deze manier van e-mail versturen nooit de standaard is geweest, wordt deze manier als verouderd bestempeld na de komst van STARTTLS. Toch is deze manier wel sneller om te communiceren over deze poort, omdat hij de STARTTLS handshake overslaat. Daarnaast is het veiliger omdat het onmogelijk is om de EHLO/HELO handshake te onderscheppen.

```text
Host:       mail.smtpeter.com
Port:       465
Encryption: SMTPS
```


