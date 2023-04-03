# Gebruikers

Iedereen die gebruik maakt van de applicatie, heeft een eigen gebruiker
met unieke inloggegevens. Het is dus niet toegestaan om meerdere
personen te laten inloggen met dezelfde gebruiker.

Let op: Dit artikel gaat over gebruikers van de martketingsoftware.
Iemand die geregistreerd is op Copernica.com is niet automatisch een
accountgebruiker.

## Even wat feiten op een rijtje

Een account heeft minimaal 1 gebruiker. Er is geen maximum gebonden aan
het aantal gebruikers binnen een account.

De eerste gebruiker in een account is automatisch een beheerder. Een
beheerder kan bepaalde taken verrichten, zoals het toevoegen en
verwijderen van andere gebruikers, en het instellen van de individuele
toegangsrechten. De beheerder kan dus ook andere gebruikers beheerder
maken.

Afhankelijk van het type licentie zitten een of meer gebruikers bij een
licentie inbegrepen. Hierna betaal je per gebruiker een kleine toeslag
(zie licentieovereenkomst). **Partnergebruikers worden niet in rekening
gebracht.**

Een gebruiker is niet accountgebonden. Een enkele gebruiker kan dus
toegang hebben tot meerdere accounts. Binnen deze accounts kan dezelfde
gebruiker verschillende rollen hebben. Een gebruiker kan in het ene
account beheerder zijn, en in een ander account slechts beperkte toegang
hebben.

Indien een gebruiker toegang heeft tot meerdere accounts, kiest hij bij
het inloggen het account waarin hij wil werken. Eenmaal ingelogd, kan
hij desgewenst van account wisselen via het persoonlijk menu rechtsboven
in de applicatie.

## Gebruiker toevoegen

De beheerder van een account kan gebruikers toevoegen en verwijderen. Om
een gebruiker toe te voegen, ga je naar *configuratie*. 
- Kies voor 'Accountgebruikers' in het tweede kolom 'Account'.
- Kies rechts boven voor 'Gebruiker toevoegen'.
- Kies voor de knop 'Gebruiker zoeken aan de hand van het e-mailadres'.
- Vul het e-mailadres in van de gebruiker die je wilt toevoegen.
- Voeg de gebruiker toe.

Geef aan of deze gebruiker direct beheerdersrechten moet krijgen (dit kan uiteraard
ook later nog worden ingesteld). Dit doe je door op de gebruiker te klikken.
Nu kan je aan de gebruiker beheerders rechten of de rechten van een huisstijlbewaker toe kennen.

Als de gebruiker ook al actief is binnen andere accounts, vraag dan aan
deze persoon met welk e-mailadres hij of zij geregistreerd is bij
Copernica. Gebruikers die met hetzelfde e-mailadres toegang hebben tot
meerdere accounts, kunnen na het inloggen gemakkelijk overschakelen naar
de andere accounts waartoe zij ook toegang hebben.  

*\* Een gebruiker staat in de lijst met suggesties, als deze gebruiker
medegebruiker is van een van de accounts waar jij ook toegang tot hebt.
Je ziet hier dus alleen gebruikers die je (waarschijnlijk) al kent.*

### SOAP- en REST API-gebruiker

Om toegang te krijgen tot de SOAP- en REST API-koppeling van Copernica, heb je een API-token nodig. 

- Ga naar 'Configuratie'.
- Kies voor 'API access-tokens' in het tweede kolom 'Account'.
- Kies voor 'Access-token aanmaken'. 
- Kies bij het aanmaken van de token voor de optie  'REST-API','Soap API' of 'SOAP- en REST-API'.

### Partnergebruiker

Indien je gebruik maakt van de diensten van een van de [geregistreerde
partners](https://www.copernica.com/nl/support/partners),
dan kan je de gekoppelde partner gratis toegang geven tot jouw account.
Hiervoor doorloop je dezelfde stappen als voor het toevoegen van normale
gebruikers.

De partnergebruiker krijgt de rechten die een nieuwe gebruiker
automatisch krijgt. 

### **Zelfde gebruiker in meerdere accounts**

Iemand kan met dezelfde inloggegevens toegang hebben tot meerdere
accounts. Als je zowel toegang hebt tot **Account A** en **Account B**,
dan kies je direct na het inloggen naar welk account je wilt inloggen.

Nadat je bent ingelogd in een account, kan je desgewenst overschakelen
naar je andere accounts via het persoonlijke menu rechtsboven
(Welkom *naam…*). Klik op *Account wisselen* om over te schakelen naar
een ander account.

## Toegangsrechten gebruikers

Per gebruiker kan worden ingesteld welke rol hij of zij heeft binnen het
account. In Copernica maken we onderscheid tussen vier verschillende
rollen.

Alleen een beheerder kan de toegangsrechten van anderen wijzigen. Een
beheerder kan zijn of haar eigen toegangsrechten niet veranderen.

### Gebruiker is beheerder van het account

Een beheerder heeft de meeste rechten. Ieder account heeft minstens 1
beheerder. Eén enkel account kan meerdere beheerders hebben.

-   De gebruiker krijgt binnen het account alle kijk-, bewerk-, verzend-
    en verwijderrechten op alle databases en documenten. 
-   Een beheerder kan gebruikers toevoegen en verwijderen
-   Een beheerder kan de individuele toegangsrechten van andere
    gebruikers wijzigen.
-   Een beheerder kan de verzendinstellingen (afleverlimiet, pic server
    domein, et cetera) wijzigen.
-   Een beheerder is automatisch ook huisstijlbewaker. Zie onder.
-   Een beheerder kan nieuwe accounts aanmaken en accounts verwijderen

### Gebruiker is huisstijlbewaker

De huisstijlbewaker is de beheerder van de content binnen een account.
Hij of zij mag bijvoorbeeld templates wijzigen, maar kan ook bepalen
welke documenten mogen worden verstuurd in een bulkmailing. De
huisstijlbewaker kan normale gebruikers het recht geven of ontnemen om
templates, stylesheets en andere vormen van publicaties te laten
wijzigen, verwijderen, aanmaken, et cetera. 

Een huisstijlbewaker kan dus geen ‘echte’ beheerderstaken uitvoeren,
zoals het verwijderen en toevoegen van gebruikers.

### Gebruiker heeft toegang tot de API

Elke gebruiker kan gebruik maken van de SOAP- en REST API-koppeling van Copernica.

### Gebruiker heeft toegang tot de gebruikersinterface

Dit is een normale eindgebruiker van de software. Per publicatie moet
(door de beheerder of huisstijlbewaker) worden aangegeven of hij of zij
deze mag bewerken via *Toegangsrechten* in configuratie van het
template. 

### Individuele toegangsrechten per account

Een gebruiker die toegang heeft tot meerdere accounts kan in deze
accounts een verschillende rol hebben. De gebruiker kan dus in account A
beheerder zijn, en in account B een normale gebruiker zijn.  

### Individuele toegangsrechten

Een beheerder kan individuele rechten toekennen: 

1.  Geen individuele toegangsrechten.

Voer de volgende stappen uit, als je de optie 'Individuele toegangsrechten' volledig uit wil schakelen:

- Ga naar 'configuratie'.
- Kies voor 'Accountgebruikers' in het tweede kolom 'Account'.
- Vink de optie 'Individuele toegangsrechten (toegangsrechten zijn per gebruiker in te stellen)' uit. 
- Sla dit op.

2. Wel individuele rechten behouden.

Dit moet op database niveau worden ingericht:

- Ga naar Profielen.
- Klik op de betreffende database waar je toegang tot wilt geven.
- Klik op de blauwe knop 'Configuratie'.
- Kies voor 'Toegangsrechten' in de blauwe deel van het scherm.
- Vink aan welke toegangsrechten je wilt toewijzen.

## Gebruiker verwijderen

Beheerders kunnen gebruikers toevoegen en verwijderen. Het verwijderen
van een gebruiker heeft geen invloed op gegevens binnen het account.
Publicaties gemaakt door de gebruiker blijven behouden.

Om een gebruiker te verwijderen 

### Gebruiker tijdelijk deactiveren

Een gebruiker kan tijdelijk worden gedeactiveerd. Dit kan op twee
verschillende wijzen:

1.  Een gebruiker kan tijdelijk worden gedeactiveerd door alle
    toegangsrechten voor deze gebruiker uit te vinken. De gebruiker
    wordt nog wel gefactureerd.
2.  Een andere mogelijkheid is om de gebruiker tijdelijk te verwijderen.
    Een gebruiker wordt alleen gefactureerd voor de periode dat deze
    actief is in het account. Je kan de gebruiker op een later tijdstip
    altijd weer rehabiliteren door de gebruiker opnieuw toe te voegen.
3.  De toegangsrechten van een gebruiker weer intrekken.

## Individuele gebruikersstatistieken

Van iedere gebruiker wordt bijgehouden hoeveel e-mailberichten,
sms-berichten, API-calls et cetera hij of zij heeft verstuurd /
gebruikt. Deze gegevens blijven bewaard en zijn inzichtelijk vanuit het
tabblad **Statistieken *gebruikersnaam***. Om dit in te zien ga je naar: 
- Kies voor 'Configuratie'. 
- Kies voor 'Verbruik', in het tweede kolom. 



