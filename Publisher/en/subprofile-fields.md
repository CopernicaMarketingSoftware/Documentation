A subprofile is a single record in a collection. Using this method you
can request or update the data stored in a specific subprofile, namely
the subprofile with identifier \$subprofileID.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/subprofile/\$subprofileID/fields | GET, POST | none |

GET subprofile fields
---------------------

Use the GET method to request the data stored in a specific subprofile,
namely the subprofile with identifier \$subprofileID. You will receive
an object containing the actual values stored in the subprofile.

### Example return message

```
{
    "productid": 300,
    "name": "Yoko Multitouch Tablet",
    "price" : "4,40",
    "currency" : "EUR"
}
```

POST subprofile fields
----------------------

Use the POST method to update a specific subprofile, namely the
subprofile with identifier \$subprofileID. It is not needed to include
the subprofile identifier in the message, because it's already included
in the request URL.

### Example post message

The data is posted as a key-value JSON object.

```
{"name":"walter","score":10}
```

### Example return message

A message with the location of the subprofile affected is returned.

```
HTTP/1.1 201 Created
Date: Mon, 17 Feb 2014 13:06:41 GMT
Server: Apache
Location: https://api.copernica.com/v1/subprofile/969758
Transfer-Encoding: chunked
Content-Type: application/json
```

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

