# REST API: POST medialibrary files

Je kunt een bestand/afbeelding toevoegen aan een mediabibliotheek door een HTTP POST-request te sturen naar de volgende URL:

`https://api.copernica.com/v3/medialibrary/$id/files?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier of de naam van de mediabibliotheek waar je het bestand of afbeelding in wilt opslaan. 

## Bestand uploaden
Om een bestand te uploaden moet je gebruik maken van [cURL](https://www.php.net/manual/en/curl.examples-basic.php) in PHP. 
Aan je PHP-script moet je een aantal instellingen meegeven:

**$file**: hier vul je het absolute path in waar het bestand op je lokale computer te vinden is.  
**Content-Type**: in het script geef je het juiste content-type op. Voor bestanden, niet-ASCII en binaire gegevens is het voorkeurstype _multipart/form-data_.  
**mime_content_type**: om het bestand in het juiste formaat in de mediabibliotheek te plaatsen, moet de mime_content_type meegegeven worden. Hiervoor gebruik je de PHP-functie `mime_content_type($file)`.

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
