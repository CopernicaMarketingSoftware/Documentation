Log files can be downloaded in different layouts. You can get them as
CSV files (with our without a header row containing the file names), as
a JSON, or as an XML document. You can get the content of a file with the
logfiles method.

| Request url | Methods | 
| --- | --- | --- |
| https://api.copernica.com/logfiles/$filename | GET |
| https://api.copernica.com/logfiles/$filename/header | GET |
| https://api.copernica.com/logfiles/$filename/json | GET |
| https://api.copernica.com/logfiles/$filename/xml | GET |

Get Request
-------------------
To request the content of a log file as a CSV file without a header row containing
the variable names you can use the method:

| Request url | Methods | 
| --- | --- | --- |
| https://api.copernica.com/logfiles/$filename | GET |


### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~~ {.language-javascript}

HTTP/1.1 200 OK
Date: Tue, 29 Nov 2016 10:30:35 GMT
Server: Apache/2.4.7 (Ubuntu)
X-Powered-By: PHP/5.5.9-1ubuntu4.20
Content-Length: 515
Content-Type: text/csv

XXXXXXXXXX1,"2016-11-04 11:01:00",12345,1111111,2,133,0,copernica.com,1234,,employee1234@copernica.com
XXXXXXXXXX2,"2016-11-04 11:06:00",12345,1111111,2,133,0,copernica.com,1234,,employee1235@copernica.com
XXXXXXXXXX3,"2016-11-04 11:11:00",12345,1111111,2,133,0,copernica.com,1234,,employee1236@copernica.com
XXXXXXXXXX4,"2016-11-04 11:22:00",12345,1111111,2,133,0,copernica.com,1234,,employee1237@copernica.com
XXXXXXXXXX5,"2016-11-04 11:28:00",12345,1111111,2,133,0,copernica.com,1234,,employee1238@copernica.com

~~~~

Get Request with parameter header
--------
Request the content of a log file as a CSV file where the first row contains
the variable names.

| Request url | Methods | 
| --- | --- | --- |
| https://api.copernica.com/logfiles/$filename/header | GET |


### Example output

Upon a successful request, you will receive a message similar to the
example below.


~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Tue, 29 Nov 2016 10:30:08 GMT
Server: Apache/2.4.7 (Ubuntu)
X-Powered-By: PHP/5.5.9-1ubuntu4.20
Content-Length: 615
Content-Type: text/csv

id,time,mailingid,profileid,subprofileid,databaseid,collectionid,senderdomain,templateid,tags,email
XXXXXXXXXX1,"2016-11-04 11:01:00",12345,1111111,2,133,0,copernica.com,1234,,employee1234@copernica.com
XXXXXXXXXX2,"2016-11-04 11:06:00",12345,1111111,2,133,0,copernica.com,1234,,employee1235@copernica.com
XXXXXXXXXX3,"2016-11-04 11:11:00",12345,1111111,2,133,0,copernica.com,1234,,employee1236@copernica.com
XXXXXXXXXX4,"2016-11-04 11:22:00",12345,1111111,2,133,0,copernica.com,1234,,employee1237@copernica.com
XXXXXXXXXX5,"2016-11-04 11:28:00",12345,1111111,2,133,0,copernica.com,1234,,employee1238@copernica.com
~~~~


Get Request with parameter json
---------
Request the JSON encoded content of a log file.

| Request url | Methods | 
| --- | --- | --- |
| https://api.copernica.com/logfiles/$filename/json | GET |


### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Tue, 29 Nov 2016 10:43:18 GMT
Server: Apache/2.4.7 (Ubuntu)
X-Powered-By: PHP/5.5.9-1ubuntu4.20
Content-Length: 1176
Content-Type: application/json


[
    {
        "id":"XXXXXXXXXX1",
        "time":"2016-11-04 11:01:00",
        "mailingid":12345,
        "profileid":1111111,
        "subprofileid":2,
        "databaseid":133,
        "collectionid":0,
        "senderdomain":
        "copernica.com",
        "templateid":1234,
        "tags":"",
        "email":"employee1234@copernica.com"
    },
    {
        "id":"XXXXXXXXXX2",
        "time":"2016-11-04 11:06:00",
        "mailingid":12345,
        "profileid":1111111,
        "subprofileid":2,
        "databaseid":133,
        "collectionid":0,
        "senderdomain":"copernica.com",
        "templateid":1234,
        "tags":"",
        "email":"employee1235@copernica.com"
    },
        ...
]
~~~~

Get Request with parameter xml
---------
Request the XML encoded content of a log file.

| Request url | Methods | 
| --- | --- | --- |
| https://api.copernica.com/logfiles/$filename/xml | GET |


### Example output

Upon a successful request, you will receive a message similar to the
example below.
~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Tue, 29 Nov 2016 10:54:33 GMT
Server: Apache/2.4.7 (Ubuntu)
X-Powered-By: PHP/5.5.9-1ubuntu4.20
Vary: Accept-Encoding
Content-Length: 1742
Content-Type: application/xml

<?xml version="1.0"?>
<records>
    <record>
        <id>XXXXXXXXXX1</id>
        <time>2016-11-04 11:01:00</time>
        <mailingid>12345</mailingid>
        <profileid>1111111</profileid>
        <subprofileid>2</subprofileid>
        <databaseid>133</databaseid>
        <collectionid>0</collectionid>
        <senderdomain>copernica.com</senderdomain>
        <templateid>1234</templateid>
        <tags></tags>
        <email>employee1234@copernica.com</email>
    </record>
    <record>
        ...
    </record>
    ...
</records>
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)
-   [The available log file types](./logfiles-type.md)
