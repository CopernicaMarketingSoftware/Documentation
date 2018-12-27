# REST API voorbeeld

Hieronder vind je een REST API script, geschreven in PHP.
Met dit voorbeeld kun je gemakkelijk een HTTP request doen.
Alle calls worden ondersteund. Je kunt dus gebruik maken
van: GET, POST, PUT en DELETE calls.

```php
<?php
/**
 *  Class to deal with the REST API
 */
class CopernicaRestAPI
{
    /**
     *  The access token
     *  @var string
     */
    private $token;

    /**
     *  The version
     *  @var int
     */
    private $version;

    /**
     *  Constructor
     *  @param  string      Access token
     */
    public function __construct($token, $version = 1)
    {
        // copy the token
        $this->token = $token;
        
        // copy the version
        $this->version = $version;
    }

    /**
     *  Do a GET request
     *  @param  string      Resource to fetch
     *  @param  array       Associative array with additional parameters
     *  @return array       Associative array with the result
     */
    public function get($resource, array $parameters = array())
    {
        // the query string
        $query = http_build_query(array('access_token' => $this->token) + $parameters);

        // construct curl resource
        $curl = curl_init("https://api.copernica.com/v{$this->version}/$resource?$query");

        // additional options
        curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => true));

        // do the call
        $answer = curl_exec($curl);

        // clean up curl resource
        curl_close($curl);

        // done
        return json_decode($answer, true);
    }

    /**
     *  Do a POST request
     *  @param  string      Resource name
     *  @param  array       Associative array with data to post
     *  @return mixed       False on failure or the id of the created item           
     */
    public function post($resource, array $data = array())
    {
        // the query string
        $query = http_build_query(array('access_token' => $this->token));

        // construct curl resource
        $curl = curl_init("https://api.copernica.com/v{$this->version}/$resource?$query");

        // data will be json encoded
        $data = json_encode($data);

        // additional options
        curl_setopt_array($curl, array(
            CURLOPT_POST            =>  true,
            CURLOPT_HEADER          =>  true,
            CURLOPT_RETURNTRANSFER  =>  true,
            CURLOPT_HTTPHEADER      =>  array('content-type: application/json'),
            CURLOPT_POSTFIELDS      =>  $data
        ));

        // do the call
        $answer = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // clean up curl resource
        curl_close($curl);

        // bad request
        if (!$httpCode || $httpCode == 400) return false;

        // try and get the X-Created id from the header
        if (!preg_match('/X-Created:\s?(\d+)/i', $answer, $matches)) return true;

        // return the id of the created item
        return $matches[1];
    }

    /**
     *  Do a PUT request
     *  @param  string      Resource name
     *  @param  array       Associative array with data to post
     *  @param  array       Associative array with additional parameters
     *  @return bool
     */
    public function put($resource, array $data = array(), array $parameters = array())
    {
        // the query string
        $query = http_build_query(array('access_token' => $this->token) + $parameters);

        // construct curl resource
        $curl = curl_init("https://api.copernica.com/v{$this->version}/$resource?$query");

        // data will be json encoded
        $data = json_encode($data);

        // additional options
        curl_setopt_array($curl, array(
            CURLOPT_CUSTOMREQUEST   =>  'PUT',
            CURLOPT_HTTPHEADER      =>  array('content-type: application/json', 'content-length: '.strlen($data)),
            CURLOPT_POSTFIELDS      =>  $data
        ));

        // do the call
        $answer = curl_exec($curl);

        // clean up curl resource
        curl_close($curl);

        // done
        return $answer;
    }

    /**
     *  Do a DELETE request
     *  @param  string      Resource name
     *  @return bool
     */
    public function delete($resource)
    {
        // the query string
        $query = http_build_query(array('access_token' => $this->token));

        // construct curl resource
        $curl = curl_init("https://api.copernica.com/v{$this->version}/$resource?$query");

        // additional options
        curl_setopt_array($curl, array(
            CURLOPT_CUSTOMREQUEST   =>  'DELETE'
        ));

        // do the call
        $answer = curl_exec($curl);

        // clean up curl resource
        curl_close($curl);

        // done
        return $answer;
    }
}
```

## Use in your own application

Just copy and paste the script in your own application. 
The script below lets you call the API from every script. The version 
variable should be replaced with a '2' for the newest version of the API. 
It will default to the older version 1 for backwards compatibility with 
existing scripts.

```php
<?php
// required code
require_once('copernica_rest_api.php');

// create an api object (add your own access token!)
$api = new CopernicaRestApi("my-access-token", $version);

// do the call
$result = $api->get("databases");

// print the result
print_r($result);
```

## Gebruik in eigen applicatie

Het bovenstaande script kun je gemakkelijk kopiëren en plakken, zodat je het kunt
gebruiken in je eigen applicatie. Door onderstaande code te implementeren kun je 
vanuit andere scripts ook de API aanroepen. De variabele $versie kun je 
vervangen door een '2' om de nieuwste versie van de API te gebruiken. Wanneer 
deze variabele niet wordt gebruikt zal automatisch de oude versie van de 
API gebruikt worden om compatibel te blijven met bestaande scripts.

```php
<?php
// required code
require_once('copernica_rest_api.php');

// create an api object (add your own access token!)
$api = new CopernicaRestAPI("my-access-token", $versie);

// do the call
$result = $api->get("databases");

// print the result
print_r($result);
```

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
