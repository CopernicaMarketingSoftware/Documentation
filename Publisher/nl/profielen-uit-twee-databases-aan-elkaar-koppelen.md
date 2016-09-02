Met [multidimensionale
databases](http://www.copernica.com/nl/ondersteuning/personaliseren-met-behulp-van-multidimensionale-databases)
kan je twee of meer databases aan elkaar koppelen. Voor de
totstandbrenging van deze koppeling maak je een referentieveld aan in de
database die je onderliggend wilt maken van de andere database.

Vul je bij een profiel uit database A in het referentieveld het ID in
van een profiel uit database B, dan zijn de twee profielen aan elkaar
gekoppeld. Het profiel uit database B is nu een kind geworden van het
profiel in database A en kan (net zoals een subprofiel in een collectie)
worden opgevraagd in een nieuw tabblad (met de naam van de gekoppelde
database) bij het profiel.

De multidimensionale databases zijn helaas nog niet op een wijze
geïmplementeerd zodat deze voor de gebruiker handig op te zetten/in te
richten zijn.

Als je twee bestaande databases hebt die je aan elkaar wilt koppelen,
dan kan je dit het snelste doen met behulp van een **import** en
**export**.

In dit voorbeeld gaan we uit van twee databases.

-   Een database met bedrijven.
-   Een database met gegevens van de medewerkers.
-   De enige vereiste is dat zowel in het bedrijfsprofiel als in het
    werknemersprofiel een waarde aanwezig is waarmee de twee profielen
    aan elkaar kunnen worden gekoppeld. Het meest voordehandliggend is
    natuurlijk de **bedrijfsnaam**.

**Referentieveld maken**
------------------------

Met het referentieveld leg je de link tussen de profielen uit de
verschillende databases.

-   Selecteer de database met de werknemers en ga naar *Databasebeheer
    \> Velden wijzigen*
-   Maak een nieuw veld aan van het type *Referentieveld*. Geef het veld
    een naam (bijvoorbeeld *Referentieveld*) en selecteer de database
    die je wilt koppelen. Laat de standaardwaarde leeg. Klik op
    *Opslaan*. \
    ![Het referentieveld maken](referentieveld_maken.png)

Ieder profiel in de database met bedrijven heeft nu een extra tabblad
vernoemd naar de database waarin je het referentieveld hebt aangemaakt.

**Exporteren van profielen uit de bedrijfsdatabase**
----------------------------------------------------

Exporteer de profielen uit database waarin je het referentieveld niet
hebt aangebracht. In dit voorbeeld is dit de database met de bedrijven.
Exporteer alleen de velden die je nodig hebt bij de import: het veld met
hierin de bedrijfsnaam, én het ID.

![Exporteren van de bedrijven](multidim_export.png)

**Importeren van de bedrijfsgegevens naar de database met medewerkers**
-----------------------------------------------------------------------

Selecteer de database met hierin de medewerkers. Kies voor importeren,
en selecteer het exportbestand uit de bedrijfsdatabase.

-   Koppel het veld met hierin de bedrijfsnaam aan het veld met de
    bedrijfsnaam in de bedrijfsdatabase. Maak dit veld het sleutelveld.
-   Koppel het veld *ID* van het importbestand aan het referentieveld in
    de medewerkersdatabase. Dit is geen sleutelveld.\
    ![Velden koppelen, sleutelvelden
    aanwijzen](import_linking_fields.png)
-   Ga naar het tabblad *Instellingen*. Kies bij type: *zoek naar
    matches op basis van de sleutelvelden. Gevonden profielen moeten
    worden bijgewerkt met een maximum van 999 profielen*. \
    \
    ![Import instellingen ](import_settings_multidim.png)\
    \
     Zo zorg je ervoor dat *alle* 999 eventueel bij een bedrijf werkzame
    medewerkers aan hetzelfde bedrijf worden gekoppeld (in plaats van
    1).
-   De rest van de importinstellingen staan automatisch goed.
-   Start de import. Het referentieveld in de medewerkers database wordt
    nu gevuld met de corresponderende bedrijfsprofielen uit de
    bedrijfsdatabase.

Wanneer de import is afgerond heeft ieder bedrijf in de
bedrijvendatabase een tabblad met hierin de medewerkers van het bedrijf.
\
 Je kan vanuit dit tabblad de profielen beheren. Een nieuw profiel voegt
een nieuwe medewerker toe. Dit profiel wordt toegevoegd aan de
medewerkers database; het referentieveld krijgt automatisch de juiste
gegevens.

![De medewerkers uit de medewerkersdatabase zijn nu gekoppeld aan het
bedrijf in de bedrijfsdatabase](multidim_resultaat.png)
