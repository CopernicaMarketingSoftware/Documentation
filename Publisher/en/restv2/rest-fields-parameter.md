# REST API: the fields parameter

There are several API methods that are able to use the **fields** parameter 
in the URL to select profiles and subprofiles. You could use this, for example, 
to only select profiles where "country" is "the netherlands", or profiles 
aged between 18 en 65.

The **fields** parameter is an array, which means square brackets should be 
added after the name of the variable in the URL. The variable may even be 
used multiple times. The following URL demonstrates how the variable *fields[]* 
can occur twice:

`https://api.copernica.com/v2/database/$id/profiles?fields[]=land%3D%3Dnetherlands&fields[]=age%3E16&access_token=xxxx`

## Supported values

The value of a fields parameter always has the format of "field operator value" 
like "country==netherlands" or "age>18". The following operators are available:

* **==**: equal to
* **!=** or **&lt;&gt;**: not equal to
* **&lt;**, **&gt;**: smaller than, greater than
* **&lt;=**, **&gt;=**: smaller or equal to, greater or equal to
* **=~** or **!~**: *like*, *not like*

The "like" and "not like" operators can be used to match profiles. If you use 
such an operator you can use the % and \_ wildcards. The \_ replaces exactly 
one token, regardless of what that token is. The % matches a series of tokens 
of any length. You could specifically fetch all profiles with a first name 
starting with an 'M' by adding "firstname=~M%" to the fields parameter, for 
example.

## Timestamp field

Some Publisher calls concerning statistics support the timestamp parameter. 
It can be used just like the other fields parameters and is used to gather 
the statistics for a specific period. The operators can then be used to compare 
timestamps given in YYYY-MM-DD hh:mm:ss format. The following example demonstrates 
how to use the parameter:

```php
// dependencies
require_once('copernica_rest_api.php');

// insert your access token
$api = new CopernicaRestApi("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
    'orderby'   =>  'country',
    'fields'    =>  array("timestamp>2020-01-01", "timestamp<=2020-01-31")
);

// do the call, and print result
print_r($api->get("publisher/{$emailingID}/abuses", $parameters));`
```

## Special fields

The fields you use to make comparisons with are always fields from the database.
If you make comparisons like "hometown==amsterdam" of "gender==male",
these fields should exist in your database.

However, there are three special fields that you do not have to enter to 
use. These special fields are:

* **id**: the numerical ID of the (sub)profile
* **code**: the secret code of the (sub)profile
* **modified**: timestamp of last modification of (sub)profile in YYYY-MM-DD hh:mm:ss format.

This means you can also make comparisons like "id>1000" or "modified<2017-01-01".

## Escaping variables

When you add the *fields* parameters to the URL you need to escape variables 
to keep the URL valid. The same goes for other parameters, like the 
*access_token* parameter, but this especially important for the *fields* 
parameter. This is because you always use characters that can not occur 
without interfering with the URL (for example name~=m%). 

The example earlier also escapes characters. The URL includes two field 
parameters: 'country==netherlands' and 'age>16' In the URL they have been 
replace by "country%3D%3Dnetherlands" and "age%3E16" such that the equality 
and greater than operators do not conflict with other tokens in the URL.

When using our [example PHP code](rest-php) you don't have to do this 
as escaping characters is done automatically.

## PHP example

You can also add the fields parameter when executing calls with PHP. In the 
example below it is used in the [call to retrieve profiles](./rest-get-database-profiles).

```php
// dependencies
require_once('copernica_rest_api.php');

// insert your access token
$api = new CopernicaRestApi("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
    'orderby'   =>  'country',
    'fields'    =>  array("age>16", "age<=65")
);

// do the call, and print result
print_r($api->get("database/$databaseID/profiles", $parameters));`
```

## More information

The *fields* parameter can be used within the following database API methods:

* [GET database profiles](rest-get-database-profiles)
* [GET view profiles](rest-get-view-profiles)
* [GET collection subprofiles](rest-get-collection-subprofiles)
* [GET miniview subprofiles](rest-get-miniview-subprofiles)
* [PUT database profiles](rest-put-database-profiles)

It is also available on the **timestamp** field for Publisher emailing abuses, clicks, 
deliveries, errors, impressions and unsubscribes. It's also available on the 
**timestampsent** field for the Publisher emailing destinations. You can find 
the documentation of these calls below.

* [GET emailing abuses](./rest-get-publisher-emailing-abuses)
* [GET emailing clicks](./rest-get-publisher-emailing-clicks)
* [GET emailing deliveries](./rest-get-publisher-emailing-deliveries)
* [GET emailing errors](./rest-get-publisher-emailing-errors)
* [GET emailing impressions](./rest-get-publisher-emailing-impressions)
* [GET emailing unsubscribes](./rest-get-publisher-emailing-unsubscribes)
