Gebruik maken van Smarty
------------------------

Personalisatie in Copernica Marketing Software werkt met behulp van
Smarty. Met behulp van deze code kan je elk database- of collectieveld
in je uitingen opnemen, waarbij deze wordt vervangen door de
persoonsgegevens van de lezer of geadresseerde. Smarty tags worden
gekenmerkt door het gebruik van accolades, **{** en **}**, en het
dollarteken, **\$**. Naast het invullen van persoonsgegevens, gebruik je
ook Smarty tags voor het invoeren van dynamische content in je
marketinguitingen.

Zo kan je door gebruik te maken van deze personalisatietags binnen
Copernica:

-   Persoonsgegevens van de geadresseerde opnemen in een e-mailing
-   Automatisch de webversie van de e-mailing opnemen
-   Conditionele contentblokken instellen (dynamische content)

Persoonsgegevens opnemen in een e-mailing
-----------------------------------------

Wanneer je een e-mailing personaliseert, maak je gebruik van Smarty
tags. De gegevens worden dan uit je bestaande relatiedatabase gehaald.
Alle gegevens in de database zijn te gebruiken voor het personaliseren
van e-mailings (uit je profielen en je subprofielen). Je hoeft enkel de
namen van de betreffende velden in te vullen en de software vult de
juiste gegevens in.

+--------------------------------------+--------------------------------------+
| ### Bijvoorbeeld:                    | ### Wordt omgezet naar:              |
+======================================+======================================+
| Beste                                | Beste Mr. Piet Jansen,\              |
| {\$Aanhef}{\$Voornaam}{\$Achternaam} |  Bedankt voor uw aanmelding.\        |
| ,\                                   |  Met vriendelijke groet,\            |
|  Bedankt voor uw aanmelding.\        |  Piet Kramer\                        |
|  Met vriendelijke groet,\            | \                                    |
|  {\$Accountmanager}\                 |                                      |
| \                                    |                                      |
+--------------------------------------+--------------------------------------+

Automatisch webversie opnemen
-----------------------------

Door de variabele {webversion} op te nemen in de template van je
e-mailing, wordt er automatisch een webversie van je e-mail meegestuurd
wanneer je een mailing verzendt. Voeg deze ook toe in de tekstversie van
het e-maildocument.

Naast de {webversion} voeg je met Copernica ook eenvoudig een
{unsubscribe} variabele toe aan de e-mailing. Volgens de Nederlandse
wetgeving is het verplicht een uitschrijfoptie toe te voegen aan je
e-mailings. Dat kan d.m.v. een list-unsubscribe header of door de
afmeldlink toe te voegen aan je template of e-maildocument.

Deze tags bevatten geen \$-teken omdat het hier gaat om
systeemvariabelen (variabelen die niet worden ingevuld met gegevens uit
uw database).

Conditionele contentblokken instellen
-------------------------------------

Dankzij de Smarty tags kan je ook relatiegegevens gebruiken als
voorwaarde om bepaalde content wel/niet te tonen. Dit gebeurt mbv de
‘als-dan’-statements oftewel {if} en {else}. Je gebruikt altijd { } en
\$, maar voegt hier nog extra code aan toe.

*Bijvoorbeeld:*\
 {if \$veldnaam==”dezewaarde”}toon deze tekst{else}zo niet toon deze
tekst{/if}\
 Hier staat: ALS het veld X waarde Y heeft, DAN, toon deze tekst,
ANDERS, toon deze tekst, EINDE opdracht. Veldnaam staat dan voor een
bepaalde waarde uit uw database.

Om gebruik te maken van dynamische content, kan je ook gebruik maken van
de variabele {in\_selection selection=x}. Door gebruik te maken van deze
code, toon je content alleen aan relaties uit een specifieke
(mini)selectie. Je selecteert de selectie door:

-   In de omschrijving het gehele pad naar de selectie te beschrijven: \
    {in\_selection selection=Database:mySelection:mySubSelection}
-   Het ID van de selectie te formuleren: {in\_selection selection=20}

