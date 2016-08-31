A profile is a single record in a database. Using this method you can
request or update the data stored in a specific profile, namely the
profile with identifier \$profileID.

Request url

Methods

Parameters

https://api.copernica.com/profile/\$profileID/fields

GET, POST

none

GET profile field values
------------------------

Use the GET method to request the data stored in a specific profile,
namely the profile with identifier \$profileID. You will receive an
object containing the actual values stored in the profile.

### Example output

~~~~ {.language-javascript}
{
    "Company": "ABCWidgets",
    "Address": "666 Station Road",
    "ZipCode": "BW66 7UE",
    "City": "London",
    "Country": "United Kingdom",
    "Phone": "555 354 665 6",
    "Website": "www.abcwidgets.co.uk",
    "Status": "",
    "AccountManager": "Walter Williams",
    "Age": "0"
}
~~~~

POST profile field values
-------------------------

Use the POST method to update the data stored in a specific profile.
Because the ID of the profile is already mentioned in the request URL,
it is not needed to include this in the message.

### Example post message

This will set the value of the field 'Company' to 'Microsoft' at the
profile associated with \$profileID.

~~~~ {.language-javascript}
{"Company":"Microsoft"}
~~~~

### Return message

Upon a successfull POST request, a message will be sent back, containing
a link to the profile affected by the request.

~~~~ {.language-javascript}
HTTP/1.1 201 Created
Date: Mon, 17 Feb 2014 15:46:26 GMT
Server: Apache/2.2.22 (Ubuntu)
X-Powered-By: PHP/5.3.10-1ubuntu3.9
Location: https://api.copernica.com/profile/2
Content-Length: 0
Content-Type: application/json
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API resources / methods](./the-copernica-rest-api.en.md)

