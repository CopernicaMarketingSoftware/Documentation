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

`https://www.smtpeter.com/v1/datarequest/$email`

where `$email` should be replace with the email address of interest. 

Optionally you can add a JSON as payload to the POST request. Within the
JSON you can specify a an address to which we report back when the data is
available. The json should look like as follows:

```json
{
    "report": $address
}
```
where `address` can be an email address or a URL. If it is an email address
we will send you an email with the data attached, if it is not to large, or
with a link where you can download the data. If `address` is a URL, we will
POST the date to the provided URL (see below how the data looks like).


## Return value of a POST request

The result of this POST call is a unique identifier. This identifier can be
used to get the data.


## Retrieving the data from a data request

You can retrieve the data from a data request by sending a HTTP GET request
to the following URL:

`https://www.smtpeter.com/v1/datarequest/$id`

where `$id` is the unique identifier you have obtained by making 


## Return value of a GET request

When the request has been finished, we return a JSON with all available
information for the particular email address. This JSON contains two members,
`info` and `data`. The info member has also two members `type` and `id`.
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
