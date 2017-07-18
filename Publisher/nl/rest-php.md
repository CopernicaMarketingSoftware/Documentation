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
     *  Constructor
     *  @param  string      Access token
     */
    public function __construct($token)
    {
        // copy the token
        $this->token = $token;
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
        $curl = curl_init("https://api.copernica.com/v1/$resource?$query");

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
        $curl = curl_init("https://api.copernica.com/v1/$resource?$query");

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
     *  @param  array       Associative array with additional parameters
     *  @param  array       Associative array with data to post
     *  @return bool
     */
    public function put($resource, array $parameters = array(), array $data = array())
    {
        // the query string
        $query = http_build_query(array('access_token' => $this->token) + $parameters);

        // construct curl resource
        $curl = curl_init("https://api.copernica.com/v1/$resource?$query");

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
        $curl = curl_init("https://api.copernica.com/v1/$resource?$query");

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

## Gebruik in je eigen applicatie

Het bovenstaande script kun je gemakkelijk kopiëren en plakken, zodat je het kunt
gebruiken in je eigen applicatie. Door onderstaande code te implementeren kun je 
vanuit andere scripts ook de API aanroepen. 

```php
<?php
// required code
require_once('copernica_rest_api.php');

// create an api object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

// do the call
$result = $api->get("databases");

// print the result
print_r($result);
```

## Meer informatie

* [REST API](./rest-api)
