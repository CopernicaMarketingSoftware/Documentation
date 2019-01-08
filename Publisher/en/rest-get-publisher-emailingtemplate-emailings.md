# REST API: GET emailings for a template (Publisher)

You can use the REST API to retrieve all emailings in which a template 
was used with an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailingtemplate/$id/emailings?access_token=xxxx`

Where `$id` should be replaced with the ID of the template you want to retrieve 
emailings for.

## Available parameters

The following parameters are available:

* **type**: Includes the type of mailings to include ('mass', 'individual' or 'both').
* **followups**: Indicates whether we should retrieve only mailings from follow-ups ('yes'), only 
mailings *not* from follow-ups ('no') or all mailings ('both').
* **test**: Indicates whether we should retrieve only test mailings ('yes'), only mailings that were 
not tests ('no') or all mailings ('both').

All of these parameters default to 'both', which means the result won't be 
filtered if you don't pass any of them.

## Returned fields

The method returns a JSON object with several emailings in the **data** field. 
Each emailing contains the following fields:

* **id**: The ID of the mailing.
* **timestamp**: The timestamp.
* **destinations**: The number of destinations.
* **type**: The type of mailing: mass or individual.
* **embedded**: Indicates whether the images in the mailing are embedded or not. 
* **contenttype**: The type of content in the mailing: html, text or both.
* **registerclicks**: Boolean to indicate whether clicks should be registered for this mailing or not.
* **registerimpressions**: Boolean to indicate whether impressions should be registered for this mailing or not.
* **registererrors**: Boolean to indicate whether errors should be registered for this mailing or not.
* **target**: Array containing the target type and the ID and type of its sources (for example the database a collection belongs to).

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailingtemplate/{$emailingTemplateID}/emailings"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Get Publisher emailing template](./rest-get-publisher-emailingtemplate)
