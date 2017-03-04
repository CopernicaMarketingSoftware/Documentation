The limit and start parameter
-----------------------------

Some API calls have optional `start` and `limit` parameters which you
can add to the request. When requesting a large list of data, by default
up to 100 records will be retrieved, starting from the first record in
the table. The `start` parameter allows you to specify the position of
the first record to be obtained. If, for example, you wish to start at
record \#10, add `start=10` to the call, after the access\_token. If you
wish to increase the number of records obtained, add the `limit=200`
parameter to the call.

Example result of a default call:

```
{
    "start" = 5,
    "limit" = 2,
    "data"  = [ ... ]
}
```

In the above example only 2 records will be retrieved, and the first 5
records in the table will be ignored.

Fields[] requirement parameter
------------------------------

Some request methods have an (optional) `fields[]` parameter. This
parameter enables you to make requirements on the data that is updated
or received in the request.

The parameter is an array, thus each request can have multiple
requirements. In PUT requests the `fields[]` parameter is mandatory. If
this is the case, and the parameter is ommited, you get an error message
back.

In a call with one or more field requirements, you can use the following
comparison operators:

  ------ --------------------------
  ==     equal to
  !=     not equal to
  \<\>   not equal to
  =\~    LIKE
  !\~    NOT LIKE
  \<=    less than or equal to
  \>=    greater than or equal to
  ------ --------------------------

For example in a PUT request you must specify a `fields[]` parameter
with the requirements, to ensure that only the profiles that meet these
requirements are updated in the request.

    https://api.copernica.com/v1/database/databaseID/profiles?fields[]=email==user@example.com

If you want to update profiles with an *@example.com* email address
only, use the `LIKE` operator.

    https://api.copernica.com/v1/database/databaseID/profiles?fields[]=email=~%example.com%

The `fields[]` parameter is currently supported in the following
requests:

-   GET collection subprofiles
-   GET database profiles
-   GET profile subprofiles
-   POST collection unsubscribe behaviour
-   PUT database profiles \*
-   POST database unsubscribe behaviour
-   PUT profile subprofiles \*

\* mandatory in this request

Count parameter
---------------

The count parameter shows how many elements are in the data returned by
the request. In other words: how many items matched your request. So, a
`/database/$databaseID/profiles` request with default start and limit
(respectively 0 and 100) to a database with 50 profiles will return the
following:

```
{
    "start": 0,
   "limit": 100,
    "count": 50,
    "data": [
          ...
    ]
    "total": 50
}
```

Total parameter
---------------

At the end of every GET call you make, you see a parameter at the very
bottom that says `total:"some digit"`. This is the total number of items
in the database or section you made the request to. While this often is
useful information, it does make your request slower. If you don't need
that information, you can make your request a lot faster by using the
new `total=false` parameter in your request, which disables the count
query. Your request will then look something like this:

    https://api.copernica.com/v1/database/databaseID/profiles?start=10&limit=100&fields[]=email==user@example.com&total=false

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

