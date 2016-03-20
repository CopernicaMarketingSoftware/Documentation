# REST API Endpoint

To use the REST API you need an API access token, which can be created 
via the SMTPeter dashboard. This token is used to authenticate your calls 
to SMTPeter. You must keep this access token private, to prevent that
other people can send out emails out of your name. With your access token, 
you can reach the SMTPeter API via the following URL:

```
https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN
```

You can only use HTTPS connections. Unsecure HTTP requests are not
accepted and will result in a '400 Bad Request' response. The "v1" element 
in the URL allows us to break compatibility in future versions of the API. 


## HTTP methods

SMTPeter supports both HTTP POST as well as HTTP GET requests. POST
requests are used for submitting data, and GET requests for calls
that just retrieve data. 

