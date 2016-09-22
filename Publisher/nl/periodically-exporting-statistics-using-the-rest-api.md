Dankzij de kleine stortvloed aan product updates op dit blog heeft dit
artikel even op zich moeten laten wachten, maar zoals beloofd: het
laatste artikel in de REST API serie. In dit artikel laten we je zien
zien hoe je de output van je GET calls kunt verwerken om zo op een
gedetailleerde, overzichtelijke manier je mailingstatistieken op te
slaan. Om je geheugen even op te frissen, vind je
[hier](https://www.copernica.com/en/blog/dont-fear-the-api-an-introduction-to-copernicas-rest)
het eerste en [hier](./api-calls-for-dummies.md) het tweede artikel.

Exporteren van JSON naar csv
----------------------------

Hieronder vind je een voorbeeldfunctie om de JSON bestanden die uit je
GET request komen op te slaan in een csv-bestand. Csv, kort voor 'comma
separated values', is een bestandsformaat dat onder andere door
spreadsheetprogramma's te lezen is. Deze csv-bestanden kun je niet
alleen gebruiken om informatie op te slaan, ze zijn voor vele doeleinden
bruikbaar. Zo kun je ze bijvoorbeeld gebruiken in statistiekprogramma's
om berekeningen uit te voeren en kun je er je eigen datavisualisaties
van maken. De bestanden die gedownload worden, worden getiteld met de
week waar ze op slaan en opgeslagen op je computer. Om het onderstaande
script te gebruiken voor jouw data, zet je achter `$access_token=` jouw
eigen access token.

    <?php

    /*
     * Copernica REST API example script
     * Retrieves mailing statistics from the past week
     * Creates csv files with the results
     */

    // The access token as obtained from the Copernica Dashboard
    $access_token = "your_access_token";

    // All calls go through this url
    $base_url = "https://api.copernica.com";

    // Set the starttime to a week ago
    $timestamp = time() - (7*24*60*60);
    $starttime = date("Y-m-d", $timestamp);
    $week = date("W", $timestamp);

    // Which statistics do we want to retrieve?
    $statistics_types = array("impressions", "clicks");

    // retrieve all the different types, output them to files
    foreach($statistics_types as $type) {
        // Start cURL
        $ch = curl_init();
        // form the call url
        curl_setopt($ch, CURLOPT_URL, "{$base_url}/{$type}?access_token={$access_token}&fields[]=timestamp>{$starttime}");
        // store the result of the call in the return value
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        // Store the results into an array
        $result = end(explode("\n", curl_exec($ch)));
        curl_close($ch);

        // Convert the data to an array
        $arr = json_decode($result, true);

        // If there are no statistics of this type, skip it
        if(count($arr['data']) == 0) continue;

        // Create the file for this weeks report for this type
        $fh = fopen("week{$week}-{$type}", 'w');

        // Write the column names to the file
        foreach($arr['data'][0] as $col => $t) {
            fwrite($fh, "\"{$col}\",");
        }
        fwrite($fh, "\n");

        // Loop through all statistics and write them to the file.
        foreach($arr['data'] as $stat) {
            foreach($stat as $s) {
                fwrite($fh, "\"{$s}\",");
            }
            fwrite($fh, "\n");
        }
    }
    ?>

Dit voorbeeld is gemaakt om de impressions en clicks te verkrijgen, maar
je kunt uit de lijst van overall emailing methods zoveel methods kiezen
als je wilt. De overall emailing methods zijn:

-   abuses
-   clicks
-   deliveries
-   errors
-   impressions
-   unsubscribers

Om de functie de gewenste methods uit te laten voeren, voeg je ze toe
aan `$statistics_types`, zoals “impressions” en “clicks” in het
voorbeeld staan.

Als je wilt dat de bestanden die uit de functie komen in een bepaalde
map worden opgeslagen, kun je het pad naar de map meegeven aan de
functie 'fopen':
`fopen("/path/to/your/directory/week{$week}-{$type}", "w");`

PHP installeren
---------------

Om dit script uit te kunnen voeren, moet je wel PHP geïnstalleerd hebben
op je computer. Dit doe je als volgt:

### Windows

Download het onderstaande bestand en pak het uit. Je kunt PHP overal
opslaan waar je wilt, maar het is makkelijk om het op te slaan in
C:\\php.

-   Windows 32-bit:
    [http://windows.php.net/downloads/releases/php-5.6.24-nts-Win32-VC11-x86.zip](http://windows.php.net/downloads/releases/php-5.6.24-nts-Win32-VC11-x86.zip)
-   Windows 64-bit:
    [http://windows.php.net/downloads/releases/php-5.6.24-Win32-VC11-x64.zip](http://windows.php.net/downloads/releases/php-5.6.24-Win32-VC11-x64.zip)

### Mac OS X

Mac computers hebben PHP standaard geïnstalleerd staan, dus je hoeft om
scripts te kunnen runnen niets te doen als je een van deze
besturingssystemen gebruikt.

### Linux

Run het volgende commando in je terminal: \$ sudo apt-get install
php5-cli

Periodieke uitvoering van script
--------------------------------

Stel, je wil wekelijks een overzicht van de mailingstatistieken maken en
opslaan. Dit ga je natuurlijk niet iedere week op hetzelfde moment zelf
doen. Je wil je computer het gewoon voor je laten doen door hem iedere
week op hetzelfde tijdstip bovenstaand script te laten uitvoeren. De
manier waarop je dat doet verschilt tussen Windows en Mac/Linux
systemen.

### Op Windows

Op Windows is het inplannen van taken eenvoudig te doen door gebruik te
maken van de meegeleverde Taakplanner. Hiervoor volg je de volgende
stappen:

1.  Maak een batch (.bat) file dat je computer vertelt om het script uit
    te voeren: @ECHO off C\\path\\to\\your\\php.exe -f
    C:\\path\\to\\your\\file.php
2.  Open de Taakplanner en klik op 'basistaak uitvoeren'.
3.  Onder 'Trigger' vul je in wanneer en hoe vaak je je taak wil laten
    uitvoeren
4.  Onder 'Actie' kies je 'Start een programma'.
5.  Bij 'programma/script' klik je op 'Browse' en zoek je je .bat file
    op
6.  Bij 'Start in' vul je de map waarin je .bat file zit in, dus wat je
    in je .bat file als C:\\path\\to\\your\\file.php hebt ingevuld, maar
    dan zonder het '\\file.php'-gedeelte.
7.  Controleer of alles klopt, en klik op 'Finish' Je kunt je taak
    altijd nog editen, dus om te testen of hij werkt kun je de taak
    bijna meteen laten uitvoeren, bijvoorbeeld 2 minuten nadat je op
    'Finish' hebt geklikt. Zo hoef je niet een week te wachten om
    erachter te komen of hij uitgevoerd wordt.

### Mac/Linux {#mac/linux}

Voor Mac- en Linux-systemen kun je gebruik maken van Crontab. Crontab is
een voorziening in Unix-systemen om taken op de achtergrond te laten
uitvoeren in bepaalde tijdsintervallen.

Om een cron job (het periodiek uitvoeren van een commando) op te zetten,
volg je de volgende stappen:

1.  Open je terminal en typ `crontab -e`. Dit opent de vim editor zodat
    je een cron job kunt toevoegen.
2.  Druk op i om de insert modus van vim te openen
3.  Typ je cron commando in. Hierin geef je aan wanneeer je precies wilt
    dat het script wordt uitgevoerd. Bijvoorbeeld
    `* 18 * * 4 php /path/to/filename.php` om het script hierboven
    wekelijks om 18:00 op vrijdag te laten uitvoeren.
4.  Druk op escape om de insert modus te verlaten
5.  Typ ZZ (hoofdletters) om vim te verlaten en het bestand op te slaan.
6.  Verifieer je cron job door `crontab -l` (kleine L) in te typen.

Het is een goed idee om eerst te testen of je cron job werkt door hem
iedere twee minuten te laten runnen (\*/2 \* \* \* \*). Als dat werkt,
kun je je cron job aanpassen naar de tijd waarop je hem wilt runnen. Een
handig overzicht van hoe je een Crontab file opmaakt vind je
[hier](http://www.adminschoice.com/crontab-quick-reference).

Hoewel alles in dit voorbeeld toepasbaar is op jouw statistieken, is het
slechts een enkel voorbeeld van de vele toepassingen van de API. Er zijn
een hoop mogelijkheden om de methods die de Copernica REST API
ondersteunt te verwerken in toepassingen buiten de Publisher. Het doel
van deze serie was om te laten zien dat de API voor iedereen
toegankelijk en bruikbaar is en dat je geen programmeur hoeft te zijn om
je statistieken mooi te verwerken.
