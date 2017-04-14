# Opvragen van log files

Het loggen van data gebeurt bij SMTPeter volledig automatisch. Zo houdt SMTPeter 
onder meer de volgende *events* bij: afleveringen, *bounces*, kliks en *opens*. 
Deze *log files* zijn op te vragen via de [REST API](rest-logfiles "Opvragen van log files").
Het kan natuurlijk ook voorkomen dat je opzoek bent naar een specifiek event.
De flexibele API geeft je de mogelijkheid om het event naar keuze op te vragen.
Je doet dit middels een van de volgende URls:

```text
(1) https://www.smtpeter.com/v1/logfiles
(2) https://www.smtpeter.com/v1/logfiles/DATE
(3) https://www.smtpeter.com/v1/logfiles/FILENAME
(4) https://www.smtpeter.com/v1/logfiles/FILENAME/header
(5) https://www.smtpeter.com/v1/logfiles/FILENAME/json
(6) https://www.smtpeter.com/v1/logfiles/FILENAME/xml
```

De bovenstaande methodes kunnen worden gebruikt (1) om te zien voor welke
datums log files beschikbaar zijn, (2) om log files te bekijken voor
een specifieke datum en (3-6) om een enkele log file op te vragen.

## Beschikbare datums

Alle log files worden opgeslagen in mappen, geordend op datum. Je kunt 
een overzicht opvragen van alle 'beschikbare' datums, door de logfiles
methode aan te roepen zonder een extra paramater mee te geven 
(zie de eerste methode hierboven).Dit geeft een JSON array terug 
met alle datums:

```json
[ "2016-03-20", "2016-03-21", "2016-03-22" ]
// UTC tijd
```


## Log files per datum

Je kunt een lijst opvragen met alle log files die beschikbaar zijn voor
een specifieke datum. Hiervoor gebruik je de tweede methode. 
De datum kun je opvragen door het volgende formaat aan te houden:
"YYYY-MM-DD".

```json
[
    "attempts.2016-03-20.log",
    "clicks.2016-03-20.log",
    "opens.2016-03-20.log",
    "dmarc.2016-03-20.log"
]
```

De namen van de log files bestaan uit de volgende indeling *PREFIX.DATE.log*.
De *PREFIX* verteld je wat voor soort *event* wordt gelogd. Dit is een lijst 
met bestaande prefixes:

| Prefix                                                | Beschrijving                                                       |
| ----------------------------------------------------- | ------------------------------------------------------------------ |
| [attempts log file](get-logfiles "attempts log file") | informatie over alle beschikbare mails verzonden met SMTPeter      |
| [bounces log file](get-logfiles "bounces log file")   | informatie over het aantal bounces                                 |
| [clicks log file](get-logfiles "clicks log file")     | informatie over het aantal kliks                                   |
| [deliveries log file](get-logfiles "log-deliveries")  | informatie over de afgeleverde mails                               |
| [dmarc log file](get-logfiles "log-dmarc")            | informatie over ontvangen DMARC rapporten                          |
| [failures log file](get-logfiles "log-failures")      | informatie over gefaalde pogingen                                  |  
| [opens log file](get-logfiles "opens log file")       |  informatie over geopende mails                                    |
| [responses log file](get-logfiles "log-responses")    | informatie over response mails ontvangen door SMTPeter             |


## Downloaden van bestanden

Log files kunnen worden gedownload in CSV, JSON en XML formaat. Op deze
manier kun je zelf kiezen waar je het liefst mee wilt werken. Je kunt een 
log file downloaden als csv formaat door de een tag toe te voegen aan 
het eind van de REST API URL. 

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log/csv
```

Dit geeft een CSV bestand terug zonder variabelen. Je kunt een header 
toevoegen aan de *call* als je alle variabelen op de eerste regel van
je CSV bestand wilt hebben. 

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log/csv/header
```

Je kunt de bestanden ook downloaden in JSON formaat. Voeg in dat geval
"/json" toe aan het bestand dat je wilt downloaden.

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log/json
```

De JSON bestaat uit een array met daarin JSON objecten. De *properties*
hebben de namen van de verschillende variabelen. Deze namen worden aangegeven
door de specifieke log files (zie bovenstaande tabel).

Tot slot, het downloaden van een XML formaat werkt identiek als de bovenstaande
voorbeelden. Voeg "/xml" toe aan de bestandsnaam die je wilt downloaden.

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log/xml
```

Het XML bestand ziet er als volgt uit:

```xml
<records>
    <record>
        <NAME1>
            value1
        </NAME1>
        <NAME2>
            value2
        </NAME2>
    </record>
    <record>
        <NAME1>
            value1
        </NAME1>
        <NAME2>
            value2
        </NAME2>
    </record>
</records>
```

*De naam kun je opvragen middels de instructies in bovenstaande tabel.*
