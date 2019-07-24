# REST API: paging

Many REST methods, e.g. the method to [fetch databases](rest-get-databases)
and the method to [fetch profiles](rest-get-profile), return lists of objects.
In order to reduce the amount of time a REST API call takes and to prevent a
single call from overtaxing our API servers, the output of these methods is
restricted. You are able to set a limit up to 1000 objects. This means you 
might need to execute a call several times to retrieve all objects if you 
have many.

## Returned data

Whenever a method returns a list of objects, this list is always wrapped in a JSON object.
This object has a number of properties that can be used to determine whether
the list is complete or whether the output was limited and more entries are available.

```
    {
        "start":    50,
        "limit":    100,
        "count":    100,
        "total":    335,
        "data":     [ .... ]
    }
```

The most important property is *data*, which contains an array with the requested objects;
e.g. an array of databases or an array of profiles.
The other properties contain numerical values that indicate how many objects were returned
and how many are available.

## Paging parameters

The property *start* is the numerical identifier from which to start the list,
and the *limit* property states the maximum number of objects to be returned.
The *count* property contains the number of objects actually returned.
In the above example, 100 objects were returned whose identifiers range from 50 to 149. 
If you don't add a limit to your call the default value of 100 will be used.

The property *total* contains the total number of available objects.
In the above example the total is 335, which means it takes at least 4 calls
to retrieve all of the objects. Please note that printing the total is completely 
optional and choosing not to do so might speed up your calls a lot.

# PHP example

The following example demonstrates how to retrieve only the second set of five items from a list of databases.

```php
    // required code
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestAPI("your-access-token", 2);
    
    // parameters to be passed to the api
    $parameters = array(
        'start'             =>  5,
        'limit'             =>  5,
        'total'             =>  false
    );
    
    // fetch and print the databases
    print_r($api->get("databases", $parameters));
```

You need the [CopernicaRestApi class](rest-php) to run the example.

# More information

* [Introduction to the REST API](./rest-introduction.md)
* [Overview of all API calls](./rest-api.md)
