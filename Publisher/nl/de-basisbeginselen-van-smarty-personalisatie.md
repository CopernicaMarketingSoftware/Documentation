Mailings, webpagina's, sms-berichten en PDF-bestanden kunnen worden
gepersonaliseerd door gebruik te maken van speciale codes. Deze codes
worden automatisch vervangen door de bijbehorende gegevens van de
geadresseerde. De speciale codes komen uit een scripttaal genaamd
*Smarty*. Ga naar
[http://www.smarty.net/docs/en/](http://www.smarty.net/docs/en/) voor
een complete handleiding van de mogelijkheden van Smarty.

Formulering van personalisatie
------------------------------

Personalisatie in Copernica werkt middels
scripttaal [Smarty](http://www.smarty.net/). Je kan elk database- of
collectieveld opnemen in je templates, documenten en teksten, waarbij
deze wordt vervangen door de persoonsgegevens van de lezer of
geadresseerde.

De code wordt gekenmerkt door het gebruik van **accolades**, { en }, en
het **dollarteken**, \$.

### **Veldnamen**

Personalisatie op basis van relatiegegevens doe je middels de database
en collectie veldnamen uit *'Profielen'*. Het werkt alleen wanneer je de
naam van het veld exact overneemt in de code.

-   Smarty is **hooflettergevoelig**. {\$name} is dus wat anders dan
    {\$NAME}
-   het moet duidelijk zijn of het
    een [profiel of subprofiel](./personalisatie-uit-een-profiel-of-subprofiel.md) veld
    betreft.

Voorbeeld: je hebt een databasevelden met de namen
*email*en*voornaam.*In een e-maildocument gebruik je de volgende tekst:

> *Hallo {\$voornaam}, je hebt je ingeschreven met het e-mailadres
> {\$email}.*

Wanneer het document gepersonaliseerd wordt weergegeven, krijg je als
resultaat:

> *Hallo Jean-Jacques, je heb je ingeschreven met het e-mailadres
> jean.jacques23@hotmail.com*

(gegeven dat de geadresseerde Jean-Jacques heet en eigenaar is van dit
e-mailadres).

### **Accolades**

Wanneer je tekst tussen accolades plaatst herkent de applicatie dit als
code die vervangen moet worden door gegevens uit jouw database.

-   Gebruik alleen de echte karakters: { *en* }
-   Voor gebruik van accolades als tekst, zonder dat deze
    gepersonaliseerd wordt, kan je **{ldelim}** (links) en **{rdelim}**
    (rechts).
-   Als je veel accolades nodig hebt, zonder deze te willen
    personaliseren, plaats alles dan tussen **{literal}** tags
    **{/literal}**. Gebruik dit bijvoorbeeld als je Javascript code wilt
    toevoegen aan je webtemplate.

Zie ook: [Probleem: Blokhaken en accolades veroorzaken
personalisatiefouten](./probleem-blokhaken-en-accolades-veroorzaken-personalisatiefouten.md)

### **Dollarteken**

Het dollarteken gaat vooraf aan **elke variabele** uit uw database.

**Let op:**Copernica-eigen functies
zoals **{webversion}**, **{linkemail}** en **{unsubscribe}** zijn geen
personalisatievariabelen en hebben dus **nooit** een dollarteken.

### Personalisatie testen

Je kan in Copernica direct de uitvoer van je personalisatie testen.
Hiervoor worden de gegevens uit de
[standaardbestemming](./standaardbestemming-instellen-of-wijzigen.md)
gebruikt. Deze kan je zelf instellen. Zorg er altijd voor dat de
standaardbestemming zich bevindt in dezelfde database waaraan je je
mailing of andere uiting wilt richten.

### Waar kan je smarty personalisatie gebruiken?

Vrijwel overal kan je Smarty personalisatie toepassen

-   De onderwerpregel van een email
-   In email en webdocumenten
-   Andere e-mail headers (zoals afzenderadres, CC, BCC, X-Mailer)
-   Gepersonaliseerde website content
-   Webformulieren (standaardwaardes, labels, et cetera)
-   Hyperlinks and mailto: links
-   Opvolgacties
-   Et cetera...

### Waar kan je het niet gebruiken?

-   In enquetes
-   In Content feeds

 
