# REST API quick start guide

If you want to use the REST API follow the steps below to quickly set up 
sending through SMTPeter. 

## Create a REST API token

To make sure not just anyone can send email through SMTPeter you will need to 
create an access key. Go to your dashboard and create a REST API token:

[Create a REST API token](https://www.smtpeter.com/app/#/admin/api-access "Create a REST api token")

## REST API Endpoint

All API methods are accessed via:

```
https://www.smtpeter.com/v1/{METHOD}?access_token={YOUR_API_TOKEN}
```

 > Note: All API requests must use secure HTTPS connections. Unsecure HTTP requests will result in a 400 Bad Request response.

 ## Sending Email with the REST API

All messages sent through the REST API should at least contain the following variables:

```
"envelope":     string with a pure email address
"recipient":    string or array with a pure email address
```

