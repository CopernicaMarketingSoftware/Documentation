We store all information that your mailings generate in log files. All
these log files can be accessed with the logfiles method. Log files are
stored on a daily basis. To see for which dates log files are available you can
use the logfiles method.


| Request url | Methods | 
| --- | --- | --- |
| https://api.copernica.com/v1/logfiles | GET |


GET Request
-----------

Request information about the dates for which log files are available. The
request returns a message containing a JSON with the dates for which log files
are available.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~
HTTP/1.1 200 OK
Date: Mon, 20 Nov 2016 12:25:37 GMT
Server: Apache/2.2.22(Ubuntu)
X-Powered-By: PHP/5.3.10 - 1ubuntu3.9
Content-Length:79
Content-Type: application/json

[
    "2016-08-05",
    "2016-08-12",
    "2016-08-24",
    "2016-09-02",
    "2016-09-05",
    "2016-11-04"
]
~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)
-   [Get the log files available for a certain
    date](./logfiles-type.md)
    
