# Retrieving data based on an email address

SMTPeter stores data about email addresses that you can retrieve with two 
API calls. Since collecting all the data for a specific email address may 
take some time the data retrieval process is split into two steps. 
First you will have to use a POST request to make the request for the 
data. The second call is a GET request to see if the data is available and 
return it if possible. We will explain the steps in this article.

## Creating an email data request

In order to create a data request you can make a POST request to the following
URL:

`https://www.smtpeter.com/v1/datarequest/`

The following parameters are available for this request:

* **email**: The email address to retrieve data for (required).
* **monitor**: The monitor address for this request. This can be a URL 
SMTPeter sends a POST request to or an email address where the data 
will be added as an attachment. This parameter is optional and the data 
can also be retrieved with a GET request.

In the case of a successful request you will always receive a unique ID 
as the output, which can be used to retrieve the data or status of the request.

## Retrieving the status of a data request

You can retrieve the status of a data request by sending an an HTTP GET 
request to the following URL:

`https://www.smtpeter.com/v1/datarequest/$id/status`

where **$id** is the unique identifier you have obtained from the POST request. 

## Retrieving the data from a data request

You can retrieve the data from a data request by sending an HTTP GET request
to the following URL:

`https://www.smtpeter.com/v1/datarequest/$id`

where **$id** is the unique identifier you have obtained from the POST request. 

## Return value of a GET request

When the request has been finished, we return a JSON with all available
information for the particular email address. This JSON contains two members,
**info** and **data**. The info member has also two members **type** and **id**.
 The type provides the type of info, which is in this case email. 
The *id* is the specific email address, The data
member in the JSON contains an array of arrays with all the info we have
found. Examples of the information that is in the data member are:
- HTML and text versions of the mails that where sent,
- Attachments,
- Opens, and clicks information,
- Filled in surveys
- etc.

If the data are not available yet, the JSON has in the data member the text:
"Data not available (yet).".

## More information

* [REST API](rest-api)
* [Non-send REST calls](rest-other-calls)
* [All REST calls](all-rest-calls)
