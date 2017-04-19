# API Reaction

After a succesful request, SMTPeter sends a JSON object containing a unique identifier 
for every recipient which is going to receive an email. 

```json
{
    "id1" : "recipient1@example.com",
    "id2" : "recipient2@example.com"
}
```

The ids that are given back, could be used to acquire information by utilizing other methods 
from the REST API. You are probably going to send email to multiple receivers with just 
one call, and thus the returned value could possibly possess multiple ids and recipients.

## Settlement of errors

The REST API has a clear way of communicating errors. Namely, by giving back the regular
<a href="https://nl.wikipedia.org/wiki/Lijst_van_HTTP-statuscodes" target="_blank">HTTP error code</a>
that is being triggered. Providing wrong information doesn't matter per se as you will always 
receive a textual explanation of what happened. A successful call always gives you back 
a code between (and including) `200` and `202`.