# PHP example

This example shows how you can send an email via the REST API of SMTPeter
using PHP.

The next code example shows a simple class called SMTPeter. The constructor
of the class takes your access token as its input. Currently only the `post()`
member function is implemented with which you can send an email instruction
to SMTPeter.

```php
<?php
/**
 *  SMTPeter.php
 * 
 *  Class to communicate with the SMTPeter service, and send emails to it
 *
 */

/**
 *  Class definition
 */
class SMTPeter
{
    /**
     *  The access token
     *  @var string
     */
    private $token;
    
    /**
     *  Constructor
     *  @param  string      access token
     */
    public function __construct($accesstoken)
    {
        // copy the token
        $this->token = $accesstoken;
   }
    
    /**
     *  Send a HTTP POST call to the rest API
     *  @param  string      The method to call (for example: "send")
     *  @param  array       Structure with all fields to send
     *  @return array       The returned data from the API
     */
    public function post($method, array $fields)
    {
        // construct a CURL resource
        $curl = curl_init("https://www.smtpeter.com/v1/$method?access_token=".urlencode($this->token));
        
        // set curl options
        curl_setopt_array($curl, array(
            CURLOPT_POSTFIELDS      =>  json_encode($fields),   // the data to post - JSON encoded to allow deeply nested arrays
            CURLOPT_HTTPHEADER      =>  array("content-type: application/json"),    // tell server that we send JSON
            CURLOPT_RETURNTRANSFER  =>  true,                   // let curl_exec return the result
            CURLOPT_FOLLOWLOCATION  =>  true,                   // follow 'location:' headers
            CURLOPT_MAXREDIRS       =>  10,                     // max number of redirects to follow
            CURLOPT_SSL_VERIFYPEER  =>  false                   // Enables HTTPS connections - even if wrongly configured
        ));
        
        // execute and get result
        $result = curl_exec($curl);
        
        // get the content type
        $type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        
        // close the curl handle
        curl_close($curl);
        
        // leap out on failure
        if ($result === false) return false;
        
        // if the answer from the server was json-decoded, we decode the json data
        if ($type == "application/json") return json_decode($result, true);
        
        // expose raw output
        return $result;
        
        
        // output is in json format - parse this to turn it into an actual array
        // return json_decode($result, true);
    }
    
    /**
     *  Set a HTTP GET call to the rest API
     *  @param  string      The method to call (for example "stats/2016-03-03")
     *  @param  mixed       Optional parameters
     *  @return mixed       The returned data
     */
    public function get($method, array $params = array())
    {
        // include access token in parameters
        $params["access_token"] = $this->token;
        
        // construct the curl
        $curl = curl_init($url = "https://www.smtpeter.com/v1/$method?".http_build_query($params));
        
        // url options to set
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER  =>  true,                   // let curl_exec return the result
            CURLOPT_FOLLOWLOCATION  =>  true,                   // follow 'location:' headers
            CURLOPT_MAXREDIRS       =>  10,                     // max number of redirects to follow
            CURLOPT_SSL_VERIFYPEER  =>  false                   // Enables HTTPS connections - even if wrongly configured
        ));

        // execute and get the result
        $result = curl_exec($curl);
        
        // get the content type
        $type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);

        // close the curl handle
        curl_close($curl);
        
        // leap out on failure
        if ($result === false) return false;
      
        // if the answer from the server was json-decoded, we decode the json data
        if ($type == "application/json") return json_decode($result, true);

        // expose raw output
        return $result;
    }
}
```

Using this class is easy:
```php
// Your token
$token = "00000";

// construct SMTPeter object with your token
$object = new SMTPeter($token);

// run the HTTP POST call for the "send" method
$output = $object->post("send", array(
    'envelope'  =>  'sender@example.com',           // The sending email address
    'recipient' =>  'receiver@example.com',         // The receiving email address
    'subject'   =>  'This is the mail subject',     // MIME's subject
    'from'      =>  'sender@example.com',           // MIME's sending email address
    'to'        =>  'receiver@example.com',         // MIME's receiving email addres
    'text'      =>  'This is the text version',     // Text and HTML bodies
    'html'      =>  '<html><head><style>body { font-weight: 600; }</style></head><body>This is the html version.</body></html>'
));

// run the HTTP GET call for the "text" method
$messageID = "your message id";
$dates = object->get("text/$messageID");
print_r($dates);
