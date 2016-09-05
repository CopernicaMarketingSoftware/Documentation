A subprofile is a single record in a collection of a profile. Using this
method you can request and create new subprofiles in the collection
collectionID, associated with profile \$profileID

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/profile/\$profileID/subprofiles/\$collectionID | GET, POST | limit, start, fields[] |

GET Request
-----------

Retrieve the suprofiles that reside inside a collection at the profile
associated with \$profileID. Optionally you can include the `fields[]`
parameter in the URL, to add requirements for the subprofiles retrieved
in the request.

**Example:** Including the parameter
`&fields[]=email==walter@example.com` will return all subprofiles with
email address walter@example.com

POST request
------------

Add a new subprofile to the collection collectionID, associated with
profile \$profileID. The collection and profile identifiers do not need
to be included in the message, as this is already provided in the URL.

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

