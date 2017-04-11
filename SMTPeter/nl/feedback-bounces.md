# Feedback loops voor 'bounces'

SMTPeter bewerkt normaal gesproken het 'envelope' adres van alle e-mails
die middels SMTPeter worden verstuurd. Dit wordt gedaan om 'bounces' te
traceren en ook om andere 'events' te kunnen onderscheppen.
Naast dat SMTPeter alles automatisch ontvangt, kan je er voor kiezen om
zelf ook meldingen over 'feedback loops' te ontvangen.


## Type meldingen

De 'feedback loop' voor 'bounces' traceert letterlijk _alle_ meldingen
die terug worden gestuurd naar het 'envelope' adres. Dit betekent ook 
dat reguliere 'delivery status notifications', 'out-of-office replies' 
en foutmeldingen worden teruggestuurd. Al deze type meldingen kun je 
ontvangen door de 'feedback loop' voor 'bounces' op te zetten.


## 'Bounces versus Delivery Status Notifications'

SMTPeter verstuurt e-mails door middel van het SMTP protocol. Dit
protocol staat 'remote servers' toe om een bericht te accepteren of
te weigeren. Geweigerde e-mails worden bijgeschreven op de 'failure logfile' 
en respectievelijk ook toegevoegd aan de 'failure feedback loop' (zie diagram 1).

**Diagram 1**
<img style="float: center; max-width: 50%; max-height: 50%; margin-bottom: 10px;" src="Images/smtpeter-diagram-send-email.svg">

Echter, het is mogelijk dat een bericht initieel geaccepteerd wordt, 
maar dat de server achteraf toch nog een 'bounce' e-mail verstuurd 
waarin meded wordt gedeeld dat het bericht toch is geweigerd. 
Deze vorm van 'bounces' duiden op een 'Delivery Status Notification'
en hebben een speciaal formaat. SMTPeter herkent ook deze type van 'bounces
en schrijft ze naar de 'log files'. Ook de ['failure feedback loop'](feedback-failures)
wordt aangeroepen (zie diagram 2).

**Diagram 2**
<img style="float: center; max-width: 50%; max-height: 50%; margin-bottom: 10px;" src="Images/smtpeter-diagram-bounce.svg">

Naast deze standaard 'Delivery Status Notifications' zijn er nog vele andere
berichten die terug worden gestuurd naar het 'envelope' adres. Dit zijn 
bijvoorbeeld 'out-of-office' e-mails, maar ook fout meldingen over het 
feit dat de mailbox vol zit of het e-mailadres niet bestaat. Deze meldingen
komen van servers die het officiële 'Delivery Status Notification' niet
respecteren. SMTPeter pakt deze meldingen ook gewoon op.

SMTPeter herkent dat deze meldingen niet naar de reguliere 'error log file'
moeten worden geschreven en stuurt ze dus naar de 'bounce log file' en 
consequent ook naar de 'bounce feedback loops'.


## Formaat

De 'bounce feedback loop' wordt door middel van het HTTP POST mechanisme verstuurd. 
De volgende variabelen worden dan ingevoerd:

```html
<table>
    <tr>
        <td>id</td>
        <td>original message id to which the bounce is associated</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>email address to which the original mail was sent</td>
    </tr>
    <tr>
        <td>mailfrom</td>
        <td>"MAIL FROM" address that was used for delivering the incoming bounce</td>
    </tr>
    <tr>
        <td>rcptto</td>
        <td>"RCPT TO" address that was used for delivering the incoming bounce</td>
    </tr>
    <tr>
        <td>mime</td>
        <td>The MIME data that was sent during, this is the actual received bounce message</td>
    </tr>
</table>
```

De 'id' en 'recipient' variabelen stellen je in staat om de inkomende 'bounce'
te linken aan het oorspronkelijke bericht dat werd verstuurd. De 'mailfrom', 
'rcptto' en 'data' velden bevatten de melding die door SMTPeter is ontvangen.
