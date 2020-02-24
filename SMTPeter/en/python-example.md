# Python example

This example shows how you can send an email via the REST API of SMTPeter
using Python.

The next code example shows a simple class called SMTPeter. The constructor
of the class takes your access token as its input. Currently only the `post()`
member function is implemented with which you can send an email instruction
to SMTPeter.

```python
import requests
import json
import pprint

class SMTPeter:
    
    # constructor
    def __init__(self, accesstoken):
        # Set token
        self.token = str(accesstoken)

    # post method
    def post(self, method, fields):
        # Create correct url
        url = "https://www.smtpeter.com/v1/" + method + "?access_token=" + self.token
        
        # Create JSON
        data_json = json.dumps(fields)
        
        # Set content type to JSON
        headers = {'Content-type': 'application/json'}
        
        # Make request and return response
        return requests.post(url, data=data_json, headers=headers)
```

Using this class is easy. Once you have prepared your data in JSON format 
it might look something like this:

```json
{
"envelope"  : "sender@example.com",
"recipient" : "receiver@example.com",
"subject"   : "This is the mail subject",
"from"      : "sender@example.com",
"to"        : "receiver@example.com",
"html"      : "<html><head><style>body { font-weight: 600; }</style></head><body>This is the html version.</body></html>",
"text"      : "And this is the text version"
}
```

We can then send this data with the following script:

```python
# your token
token = "abcde"

# initialize SMTPeter with token
mySMTPeterConnection = SMTPeter(token)

# import your data in a variable data here with a method of your choosing

# use the SMTPeter connection to call the POST method, using the 
# data you just retrieved
response = mySMTPeterConnection.post("send", data)

# print the server response in JSON format
pprint.pprint(response.json())
```

If the email was sent successfully you should have received an array as the 
[API response](./rest-api-response), which contains message IDs and their 
corresponding email addresses.

## More infomation

* [Configure the REST API](./introduction-rest-api)
* [About the REST API](./rest-api)
* [All REST API calls](./all-rest-calls)
* [PHP example](./php-example)
