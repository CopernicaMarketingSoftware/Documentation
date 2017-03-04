# PHP example for the REST API

The *CURL* functions of PHP are very useful if you want to access the REST API using PHP.
These functions are available in practically every PHP environment
and allow you to make HTTP requests from within a PHP script.

## Example class

For your convenience we have already prepared the following example class that can be used to perform API calls.
Instead of calling the specific CURL functions yourself, you can use the *get*,
*post*, *put* and *delete* functions of this class to access the API.

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
         *  @return bool
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

It is recommended that you copy the above code and store it in a file called "copernica_rest_api.php".
This makes it very simple to perform API calls from within your other PHP scripts.

## Example API call

As an example, the following code retrieves the list of databases via an API call.

    // required code
    require_once('copernica_rest_api.php');
    
    // create an api object (add your own access token!)
    $api = new CopernicaRestApi("my-access-token");
    
    // do the call
    $result = $api->get("databases");
    
    // print the result
    print_r($result);
