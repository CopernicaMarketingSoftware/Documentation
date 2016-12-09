A subprofile is a single record in a collection. Using this method you
can request or delete the data stored in a specific subprofile, namely
the subprofile with identifier \$subprofileID. Using the DELETE request,
you can remove the subprofile entirely.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/subprofile/\$subprofileID | GET, DELETE | none |

GET request
-----------

Request the data stored in a specific subprofile, namely the subprofile
with identifier \$subprofileID. You will receive the identifier of
subprofile, the identifier of the collection the subprofile is stored
in, and an object with the subprofile data.

The subprofile **secret** is used to identify a user in web forms and to
auto login a user that clicks from an email to a Copernica-hosted
webpage.

### GET request example output

```
{
    "ID": "969758",
    "secret": "e4106a5026542077056edece316215c6",
    "fields": {
        "productid": 300,
        "name": "Pair of scissors",
        "price" : "4,40",
        "currency" : "EUR"
    },
    "profile": "4544477",
    "collection": "8552"
}
```

DELETE request
--------------

A subprofile can be deleted from existence by using the DELETE request.
This will remove the entire subprofile with identifier \$subprofileID
from the database. No additional information is needed to delete a
subprofile, as the subprofile identifier is already present in the URL.

### Example JSON response DELETE request

Upon a successful deletion, you will get a header in response with
information about the deleted subprofile.

```
HTTP/1.1 200 OK
Date: Tue, 18 Feb 2014 16:34:34 GMT
Server: Apache
X-Deleted: subprofile 961580
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

