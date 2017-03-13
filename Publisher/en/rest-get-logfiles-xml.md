# Download a log file as XML

If you want to download a logfile as XML you can send an HTTP GET
request to the following URL:

`https://api.copernica.com/v1/logfiles/$filename/xml?access_token=xxxx`

## Returned value

An XML representation of the requested log file.

```xml
<records>
    <record>
        <id>XXXXXXXXXX1</id>
        <time>2016-11-04 11:01:00</time>
        <mailingid>12345</mailingid>
        <profileid>1111111</profileid>
        <subprofileid>2</subprofileid>
        <databaseid>133</databaseid>
        <collectionid>0</collectionid>
        <senderdomain>copernica.com</senderdomain>
        <templateid>1234</templateid>
        <tags></tags>
        <email>employee1234@copernica.com</email>
    </record>
    <record>
        ...
    </record>
    ...
</records>
```



## PHP Example

The following PHP script demonstrates how to use the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("logfiles/cdm-attempts.2016-11-04.log/xml"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Log file information](rest-logfiles-names)
