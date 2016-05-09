# Retrieving the current DKIM key

If you follow our DNS recommendations, email receivers can see in your
DNS records that all your emails must have valid DKIM signatures, and that 
messages without valid signatures should be blocked. The easiest way to
achieve this is by ensuring that you send all your messages right through
SMTPeter.com.

However, if you are unable to route all your mail through SMTPeter.com,
you must make sure yourself that your other messages get signed as well.
You can either do this by publishing an additional DKIM key in your own 
DNS, and use that keys for signing your email, or you can use the same
private key that SMTPeter is using.

If you want to use the same key as is used by SMTPeter.com, you can
use one of the following REST API calls. These calls return the private key
and selector that is currently in use by SMTPeter.com:

````txt
https://www.smtpeter.com/v1/dkimkey/yourdomain.com?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkey/yourdomain.com/privatekey?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkey/yourdomain.com/publickey?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkey/yourdomain.com/algorithm?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkey/yourdomain.com/selector?access_token=YOUR_API_TOKEN
````

The first method returns a JSON object holding the current key that is in use:

````json
{
    "selector":     "zero",
    "algorithm":    "sha256"
    "public":       "-----BEGIN PUBLIC KEY-----\n...\n-----END PUBLIC KEY-----",
    "private":      "-----BEGIN PRIVATE KEY-----\n...\n-----END PRIVATE KEY-----",
}
````

The other four methods return the same information, but using content-type
text/plain instead of JSON.

