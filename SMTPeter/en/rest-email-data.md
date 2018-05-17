# Email data

The following method can be used to retrieve all the data that is available 
for a given email address. "EMAIL" should therefore be replaced with the 
email you want to request the data for.

`https://www.smtpeter.com/v1/email/EMAIL/data`

## Available parameters

The following parameters can be added to the URL:

* *report*: The target to report to; This can either be an email address or 
a web address. If the target is an email address and the file is small enough the 
JSON file will be added as an attachment to the email, otherwise a link will 
be provided to download the data. If you choose to use a web address an 
HTTP POST call will be made with the JSON data.

## Return value

The result of this GET call is a JSON file containing all known information 
about the email address. The file contains two objects. The first is an info component 
showing you information about this request, which is useful if you execute multiple 
requests in a row or keep the files for a longer time.

The second object is an array with the data itself. This includes a lot of data: 
Profile data, history, the MIME of every email sent to them, survey data, 
personalized PDFs sent to them, clicks, opens, etc...

## More information

* [REST API](rest-api)
* [Non-send REST calls](rest-other-calls)
* [All REST calls](all-rest-calls)
