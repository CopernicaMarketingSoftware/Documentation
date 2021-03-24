# Configuratie
Je beheert de algemene instellingen van je bedrijf, account of gebruiker door naar __'[Configuratie](https://ms.copernica.com/#/admin)'__ te navigeren.

De configuratie-pagina is opgedeeld in drie kolommen. Die indeling reflecteert de licentiestructuur van Copernica. 
Een licentie is gekoppeld aan een bedrijf maar kan meerdere accounts bevatten. Binnen een account kunnen meerdere gebruikers toegangsrechten hebben.

![Copernica-configuratie](../images/nl/copernicaconfiguratie.png)

## Jouw bedrijf
Bevat praktische informatie over jouw bedrijf, bijvoorbeeld met betrekking tot facturatie, licenties of accounts.

## Account 
Bevat informatie over het account waarop je momenteel actief bent, bijvoorbeeld met betrekking tot senderdomains, verbruik of accountgebruikers.

## Gebruiker
Bevat informatie over de gebruiker. Denk daarbij aan persoonsgegevens, het wachtwoord en notificatie-instellingen.

# Jouw bedrijf 
## Bedrijfsgegevens
Hier bekijk of wijzig je de algemene bedrijfsgegevens.

## Verbruik
Toont het verbruik van het gehele bedrijf. Wanneer je licentie uit meerdere accounts bestaat wordt het gezamenlijke verbruik van alle accounts weergegeven.

## Bedrijfsmedewerkers
Toont alle medewerkers die gekoppeld zijn aan jouw bedrijf. Ook medewerkers die geen toegang hebben tot een account zijn hier zichtbaar. 
Denk daarbij aan medewerkers die inzage hebben in facturen of in het verleden tickets hebben ingediend via de Support-module.

### Facturatie
Toont alle facturen die gekoppeld zijn aan jouw bedrijf. Het inzien van deze pagina vereist toegang tot facturen in de gebruikersrechten.

## Licentie
Toont de huidige licentieovereenkomst tussen jouw bedrijf en Copernica. 

## Accounts
Toont accounts die gekoppeld zijn aan de licentie van jouw bedrijf. Daarnaast kun je hier een nieuw account aanmaken of een bestaand account deactiveren.

## Beveiligingsinstellingen
Hier pas je de beveiligingsinstellingen van je bedrijf aan. 
Je kunt bijvoorbeeld aangeven hoelang een loginsessie maximaal inactief mag zijn voordat deze wordt afgebroken. 
Ook kun je collega's verplichten tot het gebruik van twee-factor-authenticatie of een toegangsbeperking instellen op basis van IP-adres.

## API-applicaties
De [API](./apis) van Copernica is te gebruiken door middel van een [OAuth-procedure](./rest-oauth) of accesstoken. 
Voordat je een [token kunt aanmaken](https://ms.copernica.com/#/admin/account/access-tokens) is het nodig om eerst een API-applicatie aan te maken onder jouw organisatie. 
Je kunt deze API-applicatie vervolgens aan meerdere accounts (tokens) koppelen. Ook kun je de toegang tot deze applicatie beperken via een IP-restrictie.

De API-applicaties-pagina toont een overzicht van alle API-applicaties die binnen jouw bedrijf zijn aangemaakt. Alleen bedrijfsbeheerders kunnen de pagina inzien.

## Jouw partner
Hier vind je alle Copernica-partners die ondersteuning bieden bij het opzetten van accounts, e-mailcampagnes of koppelingen. 
Je kiest een partner door op de bijbehorende tegel te klikken. Daarmee geef je de partner toegang tot je account. 
__Let op:__ de partner kan hierbij kosten in rekening brengen.

# Account
## Senderdomains
Hier stel je [senderdomains](./sender-domains) in die tot het account behoren. Een senderdomain is nodig voor het instellen van een afzenderadres, bijvoorbeeld wanneer je werkt met templates en documenten.

__Voorbeeld__: Je wilt een e-mail versturen vanuit het afzenderadres info@domeinnaam.nl. Als senderdomain voeg je het domein 'domeinnaam.nl' toe. Vervolgens krijg je een configuratieoverzicht te zien. Hier configureer je de instellingen van de DNS-server. Zodra je het DNS-record hebt ingesteld en alle vinkjes groen zijn kun je dit domein gebruiken als afzenderadres.

## Webhooks
[Webhooks](./webhooks) zijn processen die in real-time een notificatie naar een opgegeven adres versturen door middel van een HTTP POST-verzoek. Een webhook kan worden toegepast op databasewijzigingen of resultaten van verzonden mailings. In dit menu beheer je webhooks die aan het account gelinkt zijn.

## Verbruik
Toont het verbruik van een account. 

## IP-restrictie
Biedt mogelijkheden voor het instellen van een IP-restrictie. Dat kan op basis van IP-adressen of IP-reeksen. Zodra je een IP-restrictie hebt ingesteld kun je enkel in het account inloggen vanaf één van de opgegeven IP-adressen.

## IPs en Blacklists
Een account verzendt standaard vanuit meerdere IP-adressen. Deze IP-adressen worden door meerdere accounts gebruikt. Op deze pagina vind je een overzicht van de gebruikte IP-adressen. Je kunt per IP inzien of deze op een specifieke blacklist staat.

## Accountgebruikers
Toont een overzicht van gebruikers die toegang hebben tot het account met daarbij de bijbehorende gebruikersrechten. Als beheerder van het account wijzig je rechten van andere gebruikers door op een gebruiker te klikken. Ook kun je gebruikers toevoegen of verwijderen.

## API-accesstoken
Je maakt hier handmatig een API-accesstoken aan zonder gebruik te hoeven maken van een OAuth-procedure. Ook geef je aan of deze geschikt is voor de [SOAP-API](./soap-api-documentation) of [REST-API](./rest-api).

## Bewaartermijn gegevens
Hier stel je de bewaartermijn van gegevens binnen je account in. Het gaat daarbij om alle mailings, kliks, impressies, fouten en veranderingen aan profielen of subprofielen. De bewaartermijn staat standaard ingesteld op 'eeuwig'.

# Gebruiker
## Persoonsgegevens
Hier wijzig je de persoonsgegevens van een gebruiker. Denk daarbij bijvoorbeeld aan het e-mailadres of de tijdzone.

## Wachtwoord
Hier wijzig je het wachtwoord van je gebruiker.

## Authenticatie
Je voorziet je gebruikersaccount hier van extra beveiliging door twee-factor-authenticatie in te schakelen. Zo kan er uitsluitend worden ingelogd door middel van een speciale app (bijvoorbeeld Google Authenticator of Authy) op de mobiele telefoon.

## Nieuwsbrieven
Op deze pagina abonneer je je op onze nieuwsbrieven. Zo blijf je op de hoogte van de laatste productupdates, trainingen, evenementen en ontwikkelingen op het gebied van e-mailmarketing.

## Interface-instellingen
Je past het uiterlijk van enkele software-elementen hier aan. Zo kun je de zijbalken links of rechts positioneren of de zichtbaarheid van het Publisher-menu aanpassen.

## Bètamodules
In dit menu activeer je bètamodules die nog in ontwikkeling zijn. Hoewel deze modules nog niet klaar zijn voor gebruik kunnen enkele functies alsnog van pas komen.

## Notificaties
Je stelt hier notificaties in om op de hoogte te blijven van activiteiten binnen jouw bedrijf, account of gebruiker. Denk bijvoorbeeld aan notificaties met betrekking tot fouten in een database-import, het verkrijgen van toegang tot een account of reacties op een ticket. 

Er bestaan drie soorten notificaties:

* In-app-notificatie: Genereert een melding via het bel-icoontje in de bovenbalk;
* E-mailnotificatie: Genereert een melding via e-mail;
* Pushnotificatie: Genereert een melding via het notificatiesysteem van je computer.
