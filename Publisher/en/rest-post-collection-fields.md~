# REST API: adding a field to a collection

Method to add a field to an existing collection. This is an HTTP 
POST call to the following URL:

`https://api.copernica.com/v1/collection/$id/fields?access_token=xxxx`

The $id should be replaced by the ID of the collection you want to add a
field to. The name of the field and other values should be added to the 
message body.

## Available parameters

The following variables can be added to the body of the message:

* **name**: name of the new field (mandatory)
* **type**: type of the new field
* **value**: default value of the new field
* **textlines**: the amount of lines to use in text fields
* **length**: maximum length for text fields
* **index**: boolean value to indicate whether or not to make an index for the field
* **displayed**: boolean value to indicate whether or not field should be displayed to the user in lists or grids
* **hidden**: boolean value to indicate that a field should never be displayed to the user interface
* **ordered**: boolean value to indicate whether profiles should be ordered by this field by default

A field can have any of the following types:

* **integer**: numerical value
* **float**: numerical floating point number
* **date**: mandatory date field
* **empty_data**: non-mandatory date field
* **datetime**: mandatory date + time field
* **empty_datetime**: non-mandatory date + time field
* **text**: regular textfield
* **email**: field with email for mailings (maximum of 1 per database)
* **phone**: phone number field
* **phone_fax**: phone number field with fax that can be used for mailings (maximum of 1 per database)
* **phone_gsm**: mobile phone number field that can be used for sms messages (maximum of 1 per database)
* **select**: multiple choice field
* **big**: large textfield
* **foreign_key**: numerical value with reference to other profile

## PHP Example

The following PHP script demonstrates how to call the API method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call
    $data = array(
        'name'      =>  'extra-veld',
        'type'      =>  'text'
    );
    
    // do the call
    $api->post("collection/1234/fields", $data);

The example above requires the [CopernicaRestApi class](rest-php).
    

## More information

* [Overview of all API calls](rest-api)
* [Get all field from collection](rest-get-collection-fields)
* [Edit field](rest-put-collection-field)
* [Delete field](rest-delete-collection-field)
