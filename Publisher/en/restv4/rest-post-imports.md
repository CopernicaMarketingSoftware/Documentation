# REST API: POST imports

By sending an HTTP PUT request to the following URL it is possible to import data:

`https://api.copernica.com/v4/imports?access_token=xxxx`

## Available parameters

The following parameters are available for the method. 

* **database**: The ID of the database.
* **name**: Name of the import.
* **followups**: Do we need to execute followups on (sub)profiles in the import? (true/**false**)
* **autostart**: Do we need to execute the import immediately? (**true**/false)
* **rebuild**: Do we need to rebuild the selections after the import? (true/**false**)
* **action**: What is the action of the import? Options: add, update, update or add, ignore or add, delete.
* **keyFields**: Array of key fields that are used in the import. 
* **ignoreEmptyFields**: Do we need to ignore empty fields in the import and keep the original values? (true/**false**)
* **removeMissing**: Do we need to remove (sub)profiles from the database that are not in the import file? (true/**false**)
* **deleteTarget**: When the action is *delete* you can define here what you want to remove. (**profile**/subprofile)
* **location**: URL to the external location of the import file. 
* **source**: The data of the import if the import is not at an external location (string of array).
* **format**: Optional parameter where you can set the format of the source when this is a string. (csv/json)
* **delimiter**: Delimiter of the data. Required for CSV and non-array input. ("\t", ",", ";")

**Note**: default value is bold. 

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
  "database": 1,
  "name": "import_name",
  "followups": true,
  "autostart": true,
  "rebuild": "false",
  "action": "update or add",
  "keyFields": ["email"],
  "ignoreEmptyFields": false,
  "removeMissing": false,
  "format": "json",
  "source": [
      {
          "email": "email@example.com",
          "name": "John"
      },
      {
          "email": "email2@example.com",
          "name": "Jane"
      }
  ]
}
```

## PHP example

The following PHP script demonstrates how to use this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
	"database"	=> 1,
	"name"		=> "TestImport",
	"rebuild"	=> true,
	"action"	=> "update or add",
	"keyFields"	=> array("Email"),
	"format"	=> "json",
	"source"	=> '[
		{ 
			"Email": "support@copernica.com", 
			"Contactpersoon": "Jeroen" 
		}, 
		{ 
			"Email": "info@copernica.com", 
			"Contactpersoon": "Danny" 
		}
	]'
);

// do the call
$api->post("imports/", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## Important
The order of the fields used in the 'source' parameter must be in the same order for all profiles. Based on the example above, this **will not** work:
 
```
{ 
	"Email": "support@copernica.com", 
	"Contact": "Jeroen" 
},
{ 	
	"Contact": "Danny",
	"Email": "info@copernica.com"
}
```

## PHP example with subprofiles

The following example demonstrates how to use this method in combination with subprofiles:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
	"database"	=> 1,
	"name"		=> "TestImport",
	"rebuild"	=> true,
	"action"	=> "update or add",
	"keyFields"	=> array("Email", "Order.OrderID"),
	"format"	=> "json",
	"source"	=> '[
		{ 
			"Email": "support@copernica.com", 
			"Contactpersoon": "Jeroen",
			"Order.OrderID": "00001", 
			"Order.Status": "Completed" 
		}, 
		{ 
			"Email": "info@copernica.com", 
			"Contactpersoon": "Danny",
			"Order.OrderID": "00001", 
			"Order.Status": "Completed" 
		}
	]'
);

// do the call
$api->post("imports/", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## Important
The order of the fields used in the 'source' parameter must be in the same order for all (sub)profiles. Based on the example above, this **will not** work:
 
```
{ 
	"Email": "support@copernica.com", 
	"Contact": "Jeroen",
	"Order.OrderID": "00001", 
	"Order.Status": "Completed" 
}, 
{ 
	"Email": "info@copernica.com", 
	"Contact": "Danny",
	"Order.Status": "Completed",
	"Order.OrderID": "00001" 
}
```

## More information

* [Overview of all REST API methods](rest-api)
