# REST API: POST medialibrary files

Je kunt een bestand/afbeelding toevoegen aan een mediabibliotheek door een HTTP POST-request te sturen naar de volgende URL:

`https://api.copernica.com/v3/medialibrary/$id/files?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier of de naam van de mediabibliotheek waar je het bestand of afbeelding in wilt opslaan. 

## Bestand uploaden
Om bestanden te uploaded naar de REST API kunt je HTTP POST-requests gebruiken. Maar let op, het content-type van de calls moet, in tegenstellng tot de andere POST-calls, staan ingesteld op "multipart/form-data". De body data van het request moet ook in dit multipart formaat worden verstuurd (en dus niet in JSON of application/x-www-form-urlencoded formaat zoals bij de andere POST-calls).

De naam die je aan de variabelen geeft is niet relevant. In onze voorbeelden gebruiken we "file", maar dit kan dus van alles zijn. Het
content-type dat je meegeeft aan het bestand kan wel relevant zijn, omdat afbeeldingen anders kunnen worden verwerkt dan reguliere bestanden. Dit is met name relevant bij uploads naar een media library.

Indien je gebruik maakt van PHP en CURL dan regelt CURL dit allemaal voor je. Door een CURL-call te doen waar CURLFile objecten in worden
gebruikt, schakelt PHP/CURL vanzelf over op de multipart-encoding.

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// the file to upload (with absolute path)
$file = "/home/path/naar/bestand.ext";
 
// ID of the media library we want to upload the file to
$ID = 4;
 
// the access token 
$token = 'xxx';
 
// the API endpoint for file uploads
$url = "https://api.copernica.com/v3/medialibrary/{$ID}/files?access_token={$token}";
 
// open cURL session
$ch = curl_init($url);
 
// set POST type
curl_setopt($ch, CURLOPT_POST, 1);

// set content-type to multipart/form-data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
 
// append the file
curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => new CURLFile($file, mime_content_type($file)]);

// execute the request
curl_exec($ch);
 
// close the cURL handle
curl_close($ch);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
