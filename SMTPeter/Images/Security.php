<?php

/**
 *  Security.php
 *  
 *  Some helper classes to verify the `Signature: ...` header,
 *  `Digest: ...` header and verify that enough security measures
 *  have been taken.
 * 
 *  @author Michael van der Werve
 *  @copyright 2018 Copernica BV
 */

/**
 *  Namespace definition
 */
namespace Copernica {

/**
 *  Class for parsing the Digest field according to RFC3230.
 *  https://tools.ietf.org/html/rfc3230
 */
class Digest
{
    /**
     *  The algorithm
     *  @var string
     */
    private $algorithm;

    /**
     *  The value
     *  @var
     */
    private $value;

    /**
     *  Construct the digest
     *  @param  value   digest tuple, e.g. sha256=...
     */
    function __construct($value)
    {
        // parse the message digest
        list($algorithm, $encoded) = explode('=', $_SERVER['HTTP_DIGEST']);

        // decode the value
        $value = base64_decode($encoded);
    }

    /** 
     *  Check if data matches to this digest
     *  @param  data
     *  @return bool
     */
    public function matches($data)
    {
        // hash the data and compare it
        return hash($this->algorithm, $data, true) === $value;
    }
}

/**
 *  Class that makes a DNS query to resolve a DKIM key and convert it
 *  to a valid OpenSSL key.
 */
class DkimKey
{
    /**
     *  The version
     *  @var string
     */
    private $version;

    /**
     *  The (decoded) key
     *  @var string
     */
    private $key;

    /**
     *  Constructor from an url
     *  @param url
     */
    function __construct($url)
    {
        // first, resolve all the records
        $records = dns_get_record($url, DNS_TXT);

        // loop over all records
        foreach ($records as $record)
        {
            // object for the certificate
            $certificate = array();

            // we parse the certificate
            foreach (explode(";", $record) as $tuple)
            {
                // explode the key and value
                list($key, $value) = explode('=', $tuple);

                // set in the array
                $certificate[$key] = value;
            }

            // skip if not a dkim record
            if ($certificate['v'] != 'DKIM1') continue; 

            // set the version
            $this->version = $certificate['v'];

            // decode the public key
            $this->key = "-----BEGIN PUBLIC KEY-----\n";
            $this->key .= $certificate['p'];
            $this->key .= "-----END PUBLIC KEY-----\n";

            // leap out, we have a valid key and certificate
            return;
        }

        // we didn't leap out, so either there are no records or
        // none of the records was actually valid, throw an error
        throw new Exception("no valid dkim keys found at " . $url);
    }

    /**
     *  Get the key
     *  @return string
     */
    public function key()
    {
        return $this->key;
    }
}

/**
 *  Parsed signature in accordance to draft-cavage-http-signatures version 10.
 *  Only does RSA for now.
 *  https://tools.ietf.org/html/draft-cavage-http-signatures-10
 */
class Signature
{
    /**
     *  The key ID
     *  @var string
     */
    private $keyId;

    /**
     *  The key as obtained from the DNS system
     *  @var DkimKey
     */
    private $key;

    /**
     *  The (decoded) signature
     *  @var string
     */
    private $signature;

    /**
     *  The headers
     *  @var array
     */
    private $headers;

    /**
     *  The algorithm  
     *  @var string
     */
    private $algorithm;

    /**
     *  Utility function to reconstruct the signing body
     */
    private function body()
    {
        // we start out empty
        $body = "";

        // append all relevant headers
        foreach ($this->headers as $header)
        {
            // if the sign body is empty, don't post a newline
            if (!empty($body)) $body .= "\n";

            // the key in the server vars
            $key = 'HTTP_' . str_replace('-', '_', strtoupper($header));

            // add the header and its value to the sign body
            $body .= $header . ": " . $_SERVER[$key];
        }
    }

    /**
     *  Constructor for the signature
     *  @param  line    Header field, e.g. keyId="...",algorithm="..." etc.
     */
    function __construct($line)
    {
        // @todo parse the records better, being stateful with the quotation mark
        // parse the signature fields, splitting on ',' character
        foreach (explode(',', $line) as $tuple)
        {
            // split on the '=' character
            list($key, $value) = explode('=', $tuple);

            // set the value in the key, removing string quotes
            $this->{$key} = substr($value, 1, -1);
        }

        // check that this is an RSA signature
        if (substr($this->algorithm, 0, 4) != "rsa-") throw new Exception("signature algorithm not supported");

        // remove the 'rsa-' part from the algorithm
        $this->algorithm = substr($this->algorithm, 4);

        // if the keyid is not a copernica subdomain, this is not a valid signature
        if (strlen($this->keyId) < 14 || substr($this->keyId, -14) != ".copernica.com") throw new Exception("keyId is not copernica.com subdomain");

        // explode the headers further
        $this->headers = explode(' ', $this->headers);

        // find the actual key
        $this->key = new DkimKey($keyId); 

        // the required header fields
        $required = array("(request-target)", "host", "date", "x-copernica-id", "digest");

        // verify that some important fields are actually in the header
        if (array_diff($required, $this->headers)) throw new Exception("required header fields missing");

        // and finally check the digest
        if (openssl_verify($this->body(), $this->signature, $this->key->key(), $this->algorithm) != 1) throw new Exception("signature invalid"); 
    }
}

/**
 *  Class definition
 */
class Security 
{
    /**
     *  The message digest
     *  @var Digest
     */
    private $digest;

    /**
     *  The message signature
     *  @var Signature
     */
    private $signature;

    /**
     *  Constructor for the security object.
     */
    function __construct()
    {
        // parse the date
        $date = new DateTime($_SERVER['HTTP_DATE']);

        // discard anything that is more than 5 minutes old
        if ($date->getTimestamp() < time() - 300) throw new Exception("request older than 5 minutes");
        
        // parse the digest
        $this->digest = new Digest($_SERVER['HTTP_DIGEST']);

        // if the digest doesn't match the data, we fail
        if (!$this->digest->matches(file_get_contents('php://stdin'))) throw new Exception("message digest mismatch");

        // construct the signature
        $this->signature = new Signature($_SERVER['HTTP_SIGNATURE']);
    }
}

/**
 *  End of namespace
 */
}