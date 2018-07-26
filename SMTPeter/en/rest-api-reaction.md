# API response

After you send a message, SMTPeter sends a JSON object back to recipients and unique identification code for each recipient.

```json
{
  "id1": "recipient1@example.com",
  "id2": "recipient2@example.com"
}
```

The returned IDs can be used to use another method of the REST API. Because you can send emails to multiple recipients with just one call, the returned value can include multiple IDs and recipients.

## Error handling
The REST API has a clear way to communicate errors. Namely, returning the regular [HTTP error codes](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes) in question. The file of wrong data or other error messages does not matter, because you always get a textual procedure back from what always went wrong. A successful call always gives you a status code from `200` to `202`.
