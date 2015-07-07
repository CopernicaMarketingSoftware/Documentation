## Using the REST API

You can also send out mails by using our REST API. To send
a mail this way, simply execute a POST request to
[https://www.smtpeter.com/v1/send](https://www.smtpeter.com/v1/send).

The request should contain the following the fields:

    envelope: The address the e-mail originated from
    mime: The mime data for the message
    recipient: The email address that will receive the email

The following fields are optional, and control the way that
SMTPeter processes the messages:

    inlinizecss: When set to true, all CSS will be inlined inside the HTML
    clicktracking: When set to true, links will be redirected and logged
    bouncetracking: When set to true, bounces will be monitored
    openstracking: When set to true, impressions will be monitored

The fields can be either provided as regular POST data, or
they can be encoded in JSON. For JSON the Content-Type should
be set to application/json.
