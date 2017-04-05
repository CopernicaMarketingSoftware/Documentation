# SMTP API

SMTPeter kan je gewoon via de SMTP API benaderen. SMTP is de taal of protocol dat e-mailprogramma’s gebruiken om e-mail van de ene computer naar de andere computer te versturen. Omdat SMTPeter een SMTP API heeft, is het eenvoudig om SMTPeter te integreren in een bestaande e-mailinfrastructuur. E-mailprogramma’s zoals Outlook, Thunderbird of mobiele apparaten kunnen dus ook berichten via SMTPeter versturen.

Om de SMTP API te gebruiken moet je jezelf authenticeren op onze servers. Je kan je applicatie verifiëren door AUTH PLAIN of AUTH LOGIN te configureren. Ook kan je verschillende SMTP logins maken via het SMTPeter dashboard. Je kan dus verschillende logins maken voor je gebruikers, maar ook specifieke functies in of uitschakelen, zoals het bijhouden van klikken voor verschillende logins.

Als je niet gebruik wilt maken van verschillende accounts kan je altijd je logingegevens van je SMTPeter account gebruiken. Echter zullen dan de meeste extra functies, zoals het registreren van klikken en opens uitgeschakeld zijn. 

## Voorbeelden
Om een voorbeeld te geven hoe makkelijk het is om een connectie te maken met SMTPeter hebben we drie voorbeelden voor je gemaakt voor verschillende e-mailclients.

* [Mozilla Thunderbird](thunderbird "Mozilla Thunderbird voorbeeld")
* [Android email app](android "Android e-mail app voorbeeld")
* [Postfix](postfix "Postfix voorbeeld")

Voordat je een connectie kan maken met SMTPeter moet je in het dashboard van SMTPeter een SMTP login maken. Bewaar goed het wachtwoord goed. Intern worden alle wachtwoorden versleuteld door SMTPeter, dus als je het wachtwoord verliest moet je een nieuw wachtwoord aanmaken.

Na het configureren van je e-mailclient kan je SMTPeter gebruiken. SMTPeter is dan je standaard SMTP-gateway. De eerste keer dat je een e-mail verstuurd zal er gevraagd worden je wachtwoord in te voeren, hierna ben je klaar.

## Parameters doorgeven

Het SMTP-protocol is nooit bedoeld om parameters door te geven. Als je specifieke SMTPeter functies wilt inschakelen voor specifieke berichten moet je gebruik maken van SMTP credentials of je moet gebruik maken van verschillende MIME header velden.

Op het SMTPeter dashboard kun je meerdere SMTP-logins aanmaken. Je kan bijvoorbeeld een login aanmaken waar “inlinecss” is ingeschakeld. Wanneer je verbinding maakt met de SMTP-API kies je gewoon de login en wachtwoord combinatie voor de functies die je nodig hebt. 
