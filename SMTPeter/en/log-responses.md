# Responses log files

Log files with the prefix "responses" hold information about the responses
that your sent e-mail generated that are not bounces. An example of such a
response is an automatic out-of-office-reply. You can download the content
of these files in CSV, JSON, and XML format using the [REST logfiles API](rest-logfiles)
or the dashboard. These log files contain the following data in the
respective order:

| Name        | Description                                                                  |
| ----------- | ---------------------------------------------------------------------------- |
| id          | The unique id of the message that generated the response                     |
| time        | The time we received the response (YYYY-MM-DD hh:mm:ss formatted)            |
| envelope    | The envelope of the message                                                  |
| recipient   | The recipient of the message                                                 |
| mime        | The MIME content of the response                                             |
| tags        | The tags of the message that generated the response, separated by semicolons |

## More information

* [REST non-send calls](./rest-other-calls)
* [REST retrieve events](./rest-events)
