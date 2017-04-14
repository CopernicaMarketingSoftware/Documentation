# SMTPeter instellen op Postfix

## Configureer je domeinnaam

Voordat je jouw berichten kunt relayen moet je zorgen dat de 'myhostname' parameter geconfigureerd is met de *fully qualified domain  name* (FQDM) van jouw server. Dit kun je doen in het `/etc/postfix/main.cf` door het volgende in te vullen:

`myhostname=fqdn.jouwdomein.com`

## Configureer je SMTP-username en -wachtwoord

De volgende stap is om je SMTP-gegevens in te stellen. Deze inlogegevens zitten over het algemeen in een bestand dat *sasl_passwd* heet in de `etx/postfix` directory. In dit bestand kun je ook de poort specificeren die je wilt gebruiken. Dat doe je zo:

`[mail.smtpeter.com]:587 USERNAME:PASSWORD`

Wanneer je deze gegevens toevoegt of aanpast, moet je het volgende postmap-commando runnen:

$ postmap /etc/postfix/sasl_passwd

Om veiligheidsredenen kun je het beste daarna het volgende commando runnen, zodat alleen de *root*-gebruiker het bestand kan lezen en bewerken;

`$ sudo chmod 0600 /etc/postfix/sasl_passwd /etc/postfix/sasl_passwd.db`

## Alle mail door SMTPeter versturen

Nu je jouw inloggegevens hebt ingesteld is het tijd om Postfix te configureren met SMTPeter. Open eerst je Postfix configuratiebestand *etc/postfix/main.cf* en pas het zo aan dat het er als volgt uitziet:

```
# enable SASL authentication
smtp_sasl_auth_enable       = yes

# tell Postfix where the credentials are stored
smtp_sasl_password_maps     = hash:/etc/postfix/sasl_passwd 
smtp_sasl_security_options  = noanonymous

# use STARTTLS for encryption
smtp_use_tls                = yes 

# specify SMTP relay host
relayhost                   = [mail.smtpeter.com]:587

# where to find CA certificates
smtp_tls_CAfile             = /etc/ssl/certs/ca-certificates.crt
```

Let op: als je een andere poort dan de standaard poort hebt ingevuld in je sasl_passwd file, moet je diezelfde poort ook invullen als je de *relayhost* parameter instelt.

Als je deze stappen hebt doorlopen, herstart dan Postfix en test of het werkt.
