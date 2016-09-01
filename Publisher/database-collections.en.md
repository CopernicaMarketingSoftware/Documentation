Databases in Copernica can be extended with additional collections of
data. A single record in a such a collection is called a subprofile. A
subprofile always exists as a child of its parent profile. You can for
instance have a database with companies, and store information on their
employees in subprofiles under its company profile.

This method gives you access to all collections associated with the
given databaseID.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/database/\$databaseID/collections | GET, POST | none |

### GET request

This URL will retrieve collections associated with the given
\$databaseID. A collection has a unique identifier, a unique name and a
database identifier, leading to the database storing the collection.
Furthermore a collection contains an array of fields defining the
information that can be stored.

Example output
--------------

~~~~ {.language-javascript}
"start" : 0, 
"limit" : 100, 
"total" : 100,
"data" : [ {
     "ID" : "1",
     "name" : "Contacts",
     "database" : "1",
     "fields" : [ 
          "start" : 0, 
          "limit" : 100,
          "total" : 100,
          "data" : [ 
               {"name" : "First_name", 
                "type" : "text" },
               { ... } 
          ] 
     ]
}, 
{ ... }
] 
~~~~

\
\
\

### POST Request

To create a collection in a database.

Example POST message
--------------------

The example JSON message below will POST a new collection in to the
database associated with databaseID. You do not need to include the
identifier in the message, as it is already present in the URL.

~~~~ {.language-javascript}
{
    "name": "New_Collection_name",
}
~~~~

If the call succeeds, you will receive the following message (only
containing a header):

~~~~ {.language-javascript}
Date: Tue, 25 Mar 2014 14:01:23 GMT 
Server: Apache 
Location: https://api.copernica.com/collection/53
Transfer-Encoding: chunked 
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

