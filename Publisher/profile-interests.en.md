An interest field is a special kind of field that accepts two values
only, namely true or false. It is used mainly for listing interests and
preferences of profiles, hence the name.

This method gives you access to the interests associated with
\$profileID.

Note: interests are only available for profiles, NOT for subprofiles.

### Interest groups

Interest fields can be grouped. You can have for example a group called
'Favorite\_color' that houses the interest fields 'Red', 'Green' and
'Pink'.

| Request url | Methods | Parameters |
| --- | --- | --- |
| [https://api.copernica.com/profile/\$profileID/interests](https://api.copernica.com/profile/$profileID/interests) | GET, POST | none |
| | GET | request {#request-urlmethodsparameters-https://api.copernica.com/profile/$profileid/interests-get,-post-none-get-request} |
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------

Retrieve the interests of the profile with identifier \$profileID. An
array with its interests will be returned.

### GET interest request example output

    "ID" : "1234",
    "interests" : [
        "Beer",
        "Wiskey",
        "Sigars",
        "Death metal",
        "Songbirds"
    ]

POST request
------------

Use this URL to update the interests of the profile with identifier
\$profileID. A message containting the location of the profile will be
returned.

### Sample post message

The example message below will add the interest with ID 13 to the
profile. It is not needed to include the profile in the message, because
it is already included in the request URL.

`{"ID" : 13}`

To add or update the interest(s) of a profile, the identifier `ID` must
be used. It is not possible to include the name, because multiple
interests with the same name can exists in the same database (in
different groups).

### POST interest request example return message

After the request was processed successfully, a message containing the
location of the profile associated with \$profileID is returned.

    HTTP/1.1 201 Created
    Date: Mon, 17 Feb 2014 15:11:10 GMT
    Server: Apache/2.2.22 (Ubuntu)
    X-Powered-By: PHP/5.3.10-1ubuntu3.9
    Location: https://api.copernica.com/profile/4544701
    Content-Length: 248
    Content-Type: application/json

PUT request
-----------

Use this URL to overwrite the interests of the profile with identifier
\$profileID. A message containting the location of the profile will be
returned.

### Sample post message {#sample-post-message}

The example message below will replace all interests of the profile with
the interest with ID 13. It is not needed to include the profile in the
message, because it is already included in the request URL.

`{"ID" : 13}`

To replace the interest(s) of a profile, the identifier `ID` must be
used. It is not possible to include the name, because multiple interests
with the same name can exists in the same database (in different
groups).

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API resources / methods](./the-copernica-rest-api.en.md)

