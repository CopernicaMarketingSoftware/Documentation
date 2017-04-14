# SPF email validatie - een korte introductie

E-mail wordt al een flinke tijd gebruikt voor alledaagse communicatie, 
wat spammers heeft aangelokt die neppillen verkopen en mensen geld 
afhandig maken door zich voor te doen als een Nigeriaanse prins. Daders 
kunnen verzend adressen gebruiken die zij niet bezitten. Voor een phishing 
mail kunnen zij bijvoorbeeld het doen lijken alsof de e-mail van het adres 
van jouw bank komt. Om te voorkomen dat mensen deze mails binnenkrijgen 
zijn er verschillende technieken ontwikkeld, waaronder SPF.

Dit artikel is bedoeld om achtergrond te geven over SPF of die controle 
willen hebben over de SPF archieven die wij bijhouden. Als je alleen 
SPF op wilt zetten voor je *sender domein* kun je [dit artikel](./sender-domains "Sender Domains") 
bekijken.

## Wat is SPF?

SPF is een tool om te specificeren welke web servers op het internet 
e-mail mogen versturen met jouw adres. In werkelijkheid gebruiken mensen vaak 
een tussenserver van hun provider om hun e-mails te versturen, hoewel elke 
computer dat ook zelf zou kunnen.

Het is echter niet waarschijnlijk dat een laptop in een stad waar jij 
nog nooit van hebt gehoord een directe verbinding maakt met Gmail om een 
e-mail te versturen met jouw domeinnaam. In dit geval kun je er vanuit gaan 
dat deze persoon misbruik maakt van jouw domeinnaam en slechte intenties heeft.
Dit soort situaties kunnen voorkomen worden met SPF records.

Een SPF record is een instelling in DNS. Als je een domeinnaam hebt kun je 
DNS gebruiken om het IP adres van je website op te slaan, maar ook een lijst 
bij te houden van welke IP adressen jij gebruikt om email te versturen.
Als een ontvanger een bericht krijgt van een server of een computer die 
jou claimt te vertegenwoordigen kan het dit DNS record bekijken. Als deze 
IP hier inderdaad in voorkomt weet de ontvanger zeker dat deze e-mail uit 
een valide bron komt (jou namelijk).
Als je IP hier echter niet in voorkomt zal de ontvanger veel voorzichtiger 
zijn met jouw e-mail of deze zelfs volledig afwijzen.

Met SPF records in je DNS voorkom je dat willekeurige computers op het 
internet e-mail versturen via jouw domein. Daarnaast komt het professioneel 
over om een valide SPF record te hebben voor de ontvanger. Dit kan een positief 
effect hebben op de plaatsing van je bericht in de inbox van de gebruiker.

## Sender Domain aanbevelingen

Als je het dashboard gebruikt om een [Sender Domains](sender-domains "Sender Domains") op 
te zetten dan regelen wij het hosten van je SPF records. Je hoeft ze dus 
niet zelf op te zetten. Je moet wel zelf het SPF record toevoegen aan je DNS 
door het door te geven aan je provider of door het op je eigen server te zetten.

Het SPF record bevat alleen SMTPeter's eigen e-mailadressen. Als je ook op 
andere manieren e-mail verstuurt moet je de adressen hiervan zelf toevoegen. 
Je kunt dan zelf de record maken of op het dashboard specificeren welke 
andere adressen je gebruikt (makkelijker). Als je onze aanbevelingen nauw 
volgt ontvang je misschien al DMARC rapportages, waardoor wij ook weten 
waar je mail vandaan verstuurt.

## Eigen SPF records opzetten

Als je niet de aanbevolen SPF records op wilt zetten kun je zelf een SPF 
record maken met de adressen waar je mail mee verstuurt. Zorg dan wel 
dat je ook SMTPeter's IP adressen gebruikt door "include:smtpeter.com" 
toe te voegen aan je record.

Als je alleen SMTPeter gebruikt ziet je file er zo uit.

```text
v=spf1 include:smtpeter.com -all
```
