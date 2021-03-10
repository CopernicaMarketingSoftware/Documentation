# Exporteren van profielgegevens
Naast het importeren van gegevens is het mogelijk om (sub)profielgegevens te exporteren. Daarbij kun je de gehele database in één keer of in onderdelen exporteren (bijvoorbeeld per selectie, collectie of miniselectie). Wanneer een exportbestand is aangemaakt kun je deze downloaden of laten versturen naar een e-mailadres.

## Exportbestand voorbereiden
Je kunt een export starten door in de menubalk van een database, selectie, collectie of miniselectie te kiezen voor '**Exports**'. De exportconfiguratie bevat een aantal stappen die je moet doorlopen voordat de export gestart kan worden. Dat zijn:

**Info**  
Geef de export een naam en een eventuele beschrijving. Dat helpt je om periodieke exports beter uit elkaar te houden.

**Velden**  
Selecteer de velden die je vanuit de Copernica-omgeving wilt exporteren.

**Filter**  
Hier geef je aan of je alle (sub)profielen wilt exporteren of enkel degene die zijn aangemaakt of bewerkt sinds de vorige export.

**Bestand**  
Selecteer het bestandsformaat (XLS, TXT, CSV of XML) en de encoding (standaard UTF-8) van het bestand. Daarnaast bepaal je of het bestand ingepakt moet worden als ZIP-bestand. Dit raden wij aan bij het exporteren van een grote hoeveelheid gegevens om het bestand zo klein mogelijk te houden.

**Bestemming en interval**  
Hier geef je aan of je de export wilt downloaden in de interface of dat de export verzonden moet worden naar een (S)FTP-server of e-mailadres. Wanneer je als locatie een (S)FTP-server opgeeft kun je een schema instellen waarop periodieke exports worden uitgevoerd.

**Overzicht**  
Een overzicht met de gekozen instellingen van de export en de optie om de export aan te maken.

## Exporteren naar (S)FTP
Zoals hierboven beschreven heb je de mogelijkheid om gegevens naar een FTP- of SFTP-locatie te exporteren. Dit kun je bij het configureren van de export instellen onder '**Bestemming en interval**'. 

Bij het instellen van de (S)FTP-locatie kun je de bijbehorende URL, privacy sleutel of combinatie tussen gebruikersnaam en wachtwoord opgeven. Ook hier heb je de mogelijkheid om een periodiek schema in te stellen.

![Bestemming en interval](../images/nl/export_bestemminginterval.png)

## Opmerkingen bij het instellen van exports
Het instellen van een export kan op sommige vlakken verwarrend zijn. Onthoud hierbij de volgende zaken:

* ‘ID’, ‘Toegangscode’ en ‘Profiel aangemaakt’ zijn velden waarvan de waarde door Copernica is toegekend;
* Je kunt maximaal één collectie in een CSV-, XLS- of TXT-bestand opnemen. Wanneer je meerdere collecties tegelijk wilt exporteren kies je XML als bestandsformaat;
* UTF-8 biedt in de meeste gevallen de beste encoding voor outputbestanden gezien deze het breedste ondersteund wordt;
* Om bestanden klein te houden maak je gebruik van compressie. Dat is handig wanneer je exports via e-mail wilt versturen. In dat geval zal het bestand in ZIP-formaat worden aangemaakt.

