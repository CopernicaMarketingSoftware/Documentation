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
<img style="float: right;" src="Images/smtpeter-diagram-send-email.svg">
![Diagram 1](Images/smtpeter-diagram-send-email.svg)

Echter, het is mogelijk dat een bericht initieel geaccepteerd wordt, 
maar dat de server achteraf toch nog een 'bounce' e-mail verstuurd 
waarin meded wordt gedeeld dat het bericht toch is geweigerd. 
Deze vorm van 'bounces' duiden op een 'Delivery Status Notification'
en hebben een speciaal formaat. SMTPeter herkent ook deze type van 'bounces
en schrijft ze naar de 'log files'. Ook de [failure feedback loop](feedback-failures)
wordt aangeroepen (zie diagram 2).

**Diagram 2**
[Diagram 2](Images/smtpeter-diagram-bounce.svg)

Besides these standardized Delivery Status Notifications, there 
are many more messages that are sent back to the envelope address. These 
are for example out-of-office mails or vacation mails, but also error 
messages (like "mailbox full" or "email address does not exist") from
servers that do not respect the official Delivery Status Notification
format. These messages are also picked up by SMTPeter.

Because such messages do not follow the official standard for
Delivery Status Notifications, they can not be recognized by SMTPeter and
are not written to the error log file or are sent to failure feedback loops.
Such incoming bounces are only written to the bounce log file, and are 
sent to the bounce feedback loops. The bounce feedback loop thus receives
two sort of messages: official Delivery Status Notifications, *and*
bounces and out-of-office replies that could not be recognized.


## Format

The bounce feedback loop is sent over HTTP POST, and the following
variables are submitted:

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

The "id" and "recipient" variables allow you to link the incoming bounce
to the original outgoing message that was sent. The "mailfrom", "rcptto"
and "data" fields hold the message that was received by SMTPeter.

