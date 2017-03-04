There are different types of log files (see table below). To see which 
types of log files are available for a certain date you can use the logfiles 
method.

| Request url | Methods | 
| --- | --- | --- |
| https://api.copernica.com/v1/logfiles/$date | GET |


Available types of logfiles
--------------------------------

The types of log files that are available
are listed in the table below:

| prefix | type of information |
| ------ | ------------------- |
| [cdm-attempts](./cdm-attempts-logfile.md) | General info about mails sent with Marketing Suite (MS) |
| [cdm-abuse](./cdm-abuse-logfile.md) | Info about mails sent via MS that triggered an notification |
| [cdm-click](./cdm-click-logfile.md) | Info about clicks generated from mails sent with MS |
| [cdm-delivery](./cdm-delivery-logfile.md) | Info about delivered mails sent with MS |
| [cdm-error](./cdm-error-logfile.md) | Info about mails sent with MS that triggered an error |
| [cdm-impression](./cdm-impression-logfile.md) | Info about impressions from mails sent with MS |
| [cdm-retry](./cdm-retry-logfile.md) | Info about mails sent via MS for which we retry a delivery |
| [cdm-unsubscribe](./cdm-unsubscribe.md) | Info about mails sent via MS that triggered an unsubscribe|
| [pom-attempts](./pom-attempts-logfile.md) | General info about mails sent with Publisher |
| [pom-abuses](./pom-abuses-logfile.md) | Info about mails sent via Publisher that triggered an notification |
| [pom-clicks](./pom-clicks-logfile.md) | info about clicks generated from mails sent with Publisher |
| [pom-deliveries](./pom-deliveries-logfile.md) | Info about delivered mails sent with Publisher |
| [pom-errors](./pom-errors-logfile.md) | Info about failed mails sent with Publisher |
| [pom-impressions](./pom-impressions-logfile.md) | Info about impressions from mails sent with Publisher |
| [pom-retries](./pom-retries-logfile.md) | Info about mails sent via Publisher for which we retry a delivery |
| [pom-unsubscribes](./pom-unsubscribes-logfile.md) | Info about mails sent via Publisher that triggered an unsubscribe |

You can click on the type of log file in the table above to see which information
is stored in that type of log file.

GET Request
------------
Request information about the log files that are available for a certain date. The
request returns a message containing a JSON with the names of the available
logfiles.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

```
HTTP/1.1 200 OK
Date: Mon, 20 Nov 2016 12:25:37 GMT
Server: Apache/2.2.22(Ubuntu)
X-Powered-By: PHP/5.3.10 - 1ubuntu3.9
Content-Length:63
Content-Type: application/json

[
    "cdm-impression.2016-09-02.log",
    "cdm-delivery.2016-09-02.log"
]
```

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)
-   [Get the content of a specific log file](./logfiles-content.md)
    
