# PHP voorbeeld voor de REST API

Als je de REST API met PHP wilt aanspreken, dan kun je daar goed de *curl*
functies van PHP voor gebruiken. Deze functies zijn in nagenoeg elke PHP
omgeving beschikbaar en stellen je in staat om HTTP requests te doen. Je
kunt met curl zowel gewone HTTP GET calls doen, maar ook POST, PUT en DELETE.

## Voorbeeldklasse

Om het leven wat makkelijker te maken hebben we een voorbeeldklasse gemaakt
die je kunt gebruiken om API calls uit te voeren. Je hoeft dat niet zelf alle
relevante CURL functies aan te roepen, maar je kunt gewoonweg deze klasse 
gebruiken om de API aan te roepen.

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
            $curl = curl_init("https://api.copernica.com/$resource?$query");
            
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
         *  @return bool
         */
        public function post($resource, array $data = array())
        {
            // the query string
            $query = http_build_query(array('access_token' => $this->token));
        
            // construct curl resource
            $curl = curl_init("https://api.copernica.com/$resource?$query");
            
            // data will be json encoded
            $data = json_encode($data);
            
            // additional options
            curl_setopt_array($curl, array(
                CURLOPT_POST            =>  true,
                CURLOPT_HTTPHEADER      =>  array('content-type: application/json'),
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
            $curl = curl_init("https://api.copernica.com/$resource?$query");
            
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
            $curl = curl_init("https://api.copernica.com/$resource?$query");
            
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

Je kunt het beste bovenstaande code kopieëren en opslaan op je server, bijvoorbeeld
onder de naam "copernica_rest_api.php". Vanuit andere PHP scripts kun je nu heel
makkelijk API calls uitvoeren.

## Voorbeeld API calls

Als je een API call wilt doen, bijvoorbeeld om de lijst met databases op te
vragen, kun je heel eenvoudig van de hierboven getoonde klasse gebruik maken.

    // required code
    require_once('copernica_rest_api.php');

    // create an api object (add your own access token!)
    $api = new CopernicaRestApi("my-access-token");

    // do the call
    $result = $api->get("databases");
    
    // print the result
    print_r($result);


## Meer informatie

* [Overzicht van alle API calls](rest-api)

