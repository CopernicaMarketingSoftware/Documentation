# API response

After a succesful request, SMTPeter sends a JSON object containing a unique identifier 
for every recipient that is going to receive an email. 

```json
{
    "id1" : "recipient1@example.com",
    "id2" : "recipient2@example.com"
}
```

The IDs that are given back can be used to acquire information about this mailing 
using other API methods. If you're sending email to multiple receivers with 
one call the return data will also contain multiple IDs with their respective recipients.

## Settlement of errors

The REST API has a clear way of communicating errors. Namely, by giving back the regular
<a href="https://nl.wikipedia.org/wiki/Lijst_van_HTTP-statuscodes" target="_blank">HTTP error code</a>
that is being triggered. Providing wrong information doesn't matter per se as you will always 
receive a textual explanation of what happened. A successful call always gives you back 
a code between (and including) `200` and `202`.

## More information

* [REST API](./rest-api)
* [Send MIME data](./rest-mime)
* [Make MIME data with SMTPeter](./rest-send-json)
