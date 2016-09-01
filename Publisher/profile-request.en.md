A profile is a single record in a database. Using this method you can
request or delete the data stored in a specific profile, namely the
profile with identifier \$profileID.

The definition of each field can be found using
[api.copernica.com/database/\$databaseID/fields](./database-fields.en.md).

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/profile/\$profileID | GET, DELETE | none |

GET request
-----------

Request the data stored in a specific profile, namely the profile with
identifier \$profileID. You will receive the identifier of the database
the profile is stored in, and an object with the profile data.

The profile **secret** is used to identify a user in web forms and to
auto login a user that clicks from an email to a Copernica-hosted
webpage.

If any, you will also receive an array with the [interests of the
profile](profile-interests), and the date on which the profile was
created.

### GET request example output

~~~~ {.language-javascript}
{
    "ID": "4",
    "fields": {
        "Company": "PromisQ",
        "Address": "22 Station Road",
        "ZipCode": "BW66 7UE",
        "City": "Slough",
        "Country": "United Kingdom",
        "Phone": "44 354 665 6",
        "Website": "www.promisq.co.uk",
        "Status": "",
        "AccountManager": "Paul Williams",
        "Age": "0"
    },
    "interests": [],
    "database": "1",
    "secret": "56312e5c5507b49a526990025175ffed",
    "created": "2014-02-10 10:33:29"
}
~~~~

DELETE request
--------------

A profile can be deleted from existence by using the DELETE request.
This will remove the entire profile with identifier \$profileID from the
database, including its subprofiles (if any). No additional information
is needed to delete a profile, as the profile identifier is already
present in the URL.

Following a successful DELETE request, you will receive a header, with
information about the deleted profile.

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API resources / methods](./the-copernica-rest-api.en.md)

