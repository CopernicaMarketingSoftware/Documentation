# Voorbeeldcode GET, POST, PUT en DELETE requests
Zoals eerder vermeld roep je de REST API aan met HTTP requests, waarbij het type request bepaalt wat er gedaan moet worden. GET requests halen data op, POST requests creeeren nieuwe data, PUT requests passen bestaande data aan en DELETE requests verwijderen data. Er zijn een hoop verschillende manieren om requests te versturen, maar in deze voorbeelden gebruiken we PHP met cURL.

Voor alle scripts geldt dat je ze moet aanpassen met de juiste ID's en jouw eigen access token voordat je ze kunt gebruiken.

## Een GET request
Als je informatie over een database of andere data wil verkrijgen, gebruik je een GET-request.

Het volgende script haalt informatie op over het profiel met `$profileID` 1. Je hoeft hiervoor geen Database ID in de URL op te geven, omdat ieder profiel in Copernica een uniek ID heeft, onafhankelijk van de database waar ze in zitten.

```PHP
<?php
/**
 *  Example API call
 *  GET profile information
 */

// the ID of the profile

$profileID = 2;

// the token

$token = 'your token here';

// set up the curl resource

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/profile/$profileID?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);
?>
```

### Voorbeeldantwoord op een GET request

Als je request succesvol verloopt, krijg je de data terug die je opgevraagd had. Dit ziet er in het geval van een enkel profiel als volgt uit.

```
HTTP/1.1 200 OK
Date: Fri, 14 Feb 2014 08:47:26 GMT
Server: Apache
Transfer-Encoding: chunked
Content-Type: application/json

{
    "ID": "2",
    "fields": {
        "Company": "VOC",
        "Address": "Houten Hoofd 1",
        "ZipCode": "1623AA",
        "City": "Hoorn",
        "Country": "Netherlands",
        "Phone": "",
        "Website": "",
        "Status": "Sailing",
        "AccountManager": "Bontekoe Bros",
        "Age": "22"
    },
    "interests": [],
    "database": "1",
    "secret": "4686c108d52736fb85ca10975c6f0a5e",
    "created": "2014-02-10 10:33:29"
}
```

## Een POST request

Als je een nieuw profiel aan je database wil toevoegen, kun je dat doen met een POST request. In de `$data =` array kun je alle velden die moeten worden ingevuld aangeven met een key-value paar. Dat ziet er dan ongeveer zo uit:

```PHP
<?php
/**
 *  Example API call
 *  Create a new profile in a database
 */

// the databaseID

$databaseID = 1;

$data = array (
    "Company" => "EasyREST4u",
    "City" => "Hendrik Ido Ambacht"
    );

// json encode data

$data_string = json_encode($data); 

// the token

$token = 'your token here';

// set up the curl resource
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/database/$databaseID/profiles?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string)                                                                       
));       

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources
curl_close($ch);

?>
```

### Voorbeeldantwoord op een POST request

```
 HTTP/1.1 302 Found
    Date: Thu, 30 Jan 2014 11:14:07 GMT
    Server: Apache/2.2.22 (Ubuntu)
    X-Powered-By: PHP/5.3.10-1ubuntu3.9
    Location: https://api.copernica.com/profile/157?access_token=123456
    Content-Length: 0
    Content-Type: application/json
```
Als het gelukt is om het profiel aan te maken, krijg je een header terug waarin de locatie van het nieuwe profiel staat.

## Een DELETE-request
Als je een profiel wil verwijderen, gebruik je een DELETE request. Aangezien PHP en cURL `CURLOPT_PUT` en `CURlOPT_DELETE` niet ondersteunen, gebruiken we hier een `CURLOPT_CUSTOMREQUEST`, waar we DELETE aan toewijzen.

```PHP
<?php
/**
 *  Example API call
 *  DELETE profile entirely
 */

// the profileID to be deleted

$profileID = 2;

// the token

$token = 'your token here';

// set up the curl resource

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/profile/$profileID?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);

?>
```

### Voorbeeldantwoord DELETE request
Als de request succesvol is, wordt een header teruggegeven met een `X-deleted` met daarin het type item dat is verwijderd en het ID. In dit geval is dat dus een profiel met de ID 156.

```
 HTTP/1.1 200 OK
    Date: Thu, 30 Jan 2014 11:23:52 GMT
    Server: Apache/2.2.22 (Ubuntu)
    X-Powered-By: PHP/5.3.10-1ubuntu3.9
    X-Deleted: profile 156
    Content-Length: 0
    Content-Type: application/json
```

## Een PUT request
De code hieronder demonstreert hoe je in een database alle Johns in Amsterdam de landcode 'nl_NL' kunt geven. Let ook hier weer op de `CURLOPT_CUSTOMREQUEST`.

```PHP
<?php
/**
 *  Example API call
 *  Update the profiles in a database
 */

// the databaseID

$databaseID = 756;

// find all Johns living in Amsterdam
 
$data = array(
            "name" => "John", 
            "city" => "Amsterdam" 
        );

// and update their landcode 

$update = array(
    'countrycode' => 'nl_NL'
);

// make the POST fields

$data_string = json_encode($update); 

// initialize array

$url = array();

foreach ($data as $key => $value)
{
    // make the url encoded query string
    
    $url[] = 'fields[]='.urlencode($key.'=='.$value);
}

$url = implode('&', $url);

// the token

$token = 'your token';

// set up the curl resources

$ch = curl_init();

echo ("https://api.copernica.com/database/$databaseID/profiles/?$url").PHP_EOL;

curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/database/$databaseID/profiles/?access_token=$token&$url");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // note the PUT here

curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string)                                                                       
));       

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header
 
echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);
?>
```





