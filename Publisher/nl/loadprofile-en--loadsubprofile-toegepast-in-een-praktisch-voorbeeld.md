Met behulp van de functies *loadprofile* en *loadsubprofile* kan je een
document of template personaliseren met gegevens uit een tweede
*database* respectievelijk *collectie*.

De situatie
-----------

Je hebt een database met hierin internationale klantrelaties.
Afhankelijk van hun fysieke locatie (land) zijn zij onderverdeeld bij
verschillende internationale regiokantoren. Bij deze kantoren zijn
verschillende accountmanagers werkzaam, die zijn toegewezen aan de
klanten aangesloten bij dat kantoor.

Kort gezegd, de volgende gegevens wil je opslaan en gebruiken voor
personalisatie in je e-mailing

-   Klant met klantgegevens
-   Kantoor met kantoorgegevens
-   Accountmanager met contactgegevens

Nu kan je al deze gegevens in principe in 1 *profiel* kwijt, maar erg
handig is dat niet. Als je voor een kantoor een adreswijziging zou
willen doorvoeren, dan zou je dit bij iedere klant apart in het profiel
moeten doen. \
\
 Veel handiger is om de kantoren en accountmanagers in een aparte
database op te slaan, en deze vervolgens te koppelen aan het profiel.
Dan hoef je een wijziging slechts op een plek door te voeren. Dit is
mogelijk met *loadprofile* en *loadsubprofile*.

In de ideale situatie hebben we dus

-   1 database (Customers) met hierin alle klanten en hun gegevens
-   1 database (Offices) met hierin alle kantoren\
    \
     In deze database is een *collectie* aangebracht waarin per kantoor
    de aldaar werkzame accountmanagers zijn opgeslagen.

### De Customers database

De database *Customers*bevat de gegevens over alle klanten. Deze klanten
zijn ingedeeld bij een regiokantoor. De individuele regiokantoren worden
met een code (in dit voorbeeld *AA, BB, CC*) aangeduid in het
databaseveld *Area* bij ieder profiel. Op dezelfde wijze worden de
gekoppelde accountmanagers opgeslagen het databaseveld *AM* van het
profiel.

**Creeer**in deze database een **nieuw profiel**en stel deze in als
**standaardbestemming**.

![](Documentation/customersdatabase.png)

### De Offices database

De database Offices bevat gegevens over alle regiokantoren. Ieder
kantoor heeft een eigen profiel met een databaseveld *Area*met hierin de
unieke code voor het kantoor. Deze code is straks nodig om het profiel
uit de database *Customers* te koppelen aan het juiste kantoor.

![](Documentation/officesdatabase.png)

### De collectie Account

**Maak**in de database *Offices*een nieuwe collectie *Accounts*aan. Hier
worden per kantoor in een individueel subprofiel de aldaar werkzame
accountmanagers en hun contactgegevens opgeslagen. Iedere accountmanager
heeft een unieke code in het collectieveld *AM*.

![](Documentation/collection.png)

Tot zover de inrichting van de databases. Vul de databases en de
collectie met enige test data. Zorg ervoor dat je straks verschillende
situaties kan testen, dus maak enkele kantoren aan met meerdere
subprofielen.

Het e-maildocument personaliseren met klant-, kantoor- en accountmanagergegevens
--------------------------------------------------------------------------------

Het e-maildocument gaan we als volgt personaliseren:

> Beste *\<naam klant\>*,
>
> U bent aangesloten bij ons regiokantoor in *\<locatie kantoor\>*. U
> kunt dit kantoor direct bereiken door te bellen met *\<telefoonnummer
> kantoor\>*.
>
> Voor vragen kan je altijd contact met mij opnemen.
>
> Met vriendelijke groet,
>
> *\<naam accountmanager\>\
>  \<e-mailadres accountmanager\>*

Omdat de **standaardbestemming** staat ingesteld op de database
*Customers*, kan je met eenvoudige smarty code direct personaliseren met
gegevens van de klant.

> Beste {\$FirstName},

Voor het ophalen van het juiste kantoor gebruik je *loadprofile*. Met
deze functie kan je gegevens uit een andere database halen. De volgende
regel code volstaat in dit geval. Plaats deze direct onder de \<body\>
tag in je template HTML broncode.

> `{loadprofile source="Offices" Area="$Area" assign="office"} `

-   Met *source* verwijs je naar de database die je als bron wilt
    gebruiken. We kijken nu in de database *Offices*.
-   Met de veldnaamzoeker *Area="\$Area"* koppel je het juiste profiel
    (kantoor) in de database *Offices* aan de klant, aan de hand van de
    waarde die in het databaseveld *Area* is opgeslagen.
-   De gegevens uit de *Office* database wijs je met *source* toe aan de
    aanwijzer *office*.

Je kan het document nu bijvoorbeeld personaliseren met het
telefoonnummer van het kantoor uit de database Offices:
{\$offices.Phone}

### Accountmanager gegevens ophalen

De gegevens van de accountmanagers zijn bij ieder kantoor opgeslagen als
subprofielen in de collectie account. Voor het halen van gegevens uit
een collectie gebruik je de functie *loadsubprofile*. De volgende regel
volstaat in het geval van dit voorbeeld:

> `{loadsubprofile source="Offices:Account" AM="$AM" assign="account" profile="$office.id"} `

-   Met *source* verwijs je naar de database *Offices* en de collectie
    *Account*
-   Met de veldzoeker *AM* koppel je het profiel met de juiste
    accountmanager, aan de hand van de waarde die in het collectieveld
    *AM* is opgeslagen.
-   Met de toevoeging *profile="\$office.id"* zorg je ervoor dat alleen
    in de collectie van het aangeroepen profiel wordt gekeken (en dus
    niet in alle collecties).

Je het document nu personaliseren met het e-mailadres van de juiste
accountmanager middels de volgende smarty code: {\$account.Phone}

### De volledige code gebruikt in dit voorbeeld

{loadprofile source="Offices" Area="\$Area" assign="**office**"}

{loadsubprofile source="Offices:Account" AM="\$AM" assign="**account**"
profile="\$offices.id"}

> Beste {\$FirstName},
>
> U bent aangesloten bij ons regiokantoor in {\$office.City}. U kunt dit
> kantoor direct bereiken door te bellen met {\$office.Phone}.
>
> Voor vragen kan je altijd contact met mij opnemen.
>
> Met vriendelijke groet,
>
> {\$account.Firstname} {\$account.Lastname}, uw accountmanager
>
> {\$account.Email}

En het resultaat:

![](result.png)
