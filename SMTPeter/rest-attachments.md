# Fetching attachments

All mails that are sent via SMTPeter are stored. You can fetch the data from
the messages via the REST API. To get the attachments of a message you can
use the following methods:

```text
(1) https://www.smtpeter.com/v1/attachments/ID?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/attachments/ID/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/attachments/ID/NUMBER?access_token=YOUR_API_TOKEN
```
where ID is the message id for which you want to retrieve the attachments,
NAME the name of the attachment and NUMBER, the rank of the attachment (starting
from zero). 

With method (1) you can retrieve the names and ranks of the attachments belonging
to a message, with method (2) and (3) you can download the attachment by providing
the name or rank respectively.
