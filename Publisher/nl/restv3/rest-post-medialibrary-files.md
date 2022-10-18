# REST API: POST medialibrary files

Je kunt een bestand/afbeelding toevoegen aan een mediabibliotheek door een HTTP POST-request te sturen naar de volgende URL:

`https://api.copernica.com/v3/medialibrary/$id/files?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier of de naam van de mediabibliotheek waar je het bestand of afbeelding in wilt opslaan. 

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// the file to upload (with absolute path)
$file = "/home/path/naar/bestand.jpg";
 
// ID of the media library we want to upload the file to
$ID = 4;
 
// the access token 
$token = 'xxx';
 
// the API endpoint for file uploads
$url = "https://api.copernica.com/v3/medialibrary/{$ID}/files?access_token={$token}";
 
// create the cURL file instance and set the name of the file
$cFile = curl_file_create($file, mime_content_type($file), 'naam_van_je_bestand.png');
 
// open cURL session
$ch = curl_init($url);
 
// set POST type
curl_setopt($ch, CURLOPT_POST, 1);

// set content-type to multipart/form-data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
 
// append the file
curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => $cFile]);
 
// execute the request
curl_exec($ch);
 
// close the cURL handle
curl_close($ch);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
