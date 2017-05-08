# Opens logfiles

Log files with the prefix "opens" hold information about when your sent messages
are opened. You can download the content of these files in CSV, JSON, or XML
format using the [REST logfiles API](rest-logfiles) or the dashboard.
These log files contain the following data in the respective order:

| Name        | Description                                                         |
| ----------- | ------------------------------------------------------------------- |
| id          | The id of the opened message                                        |
| time        | The time of opening (YYYY-MM-DD hh:mm:ss formatted)                 |
| headers     | The headers that where used to make the call, separated by newlines |
| ip          | The IP address of the system who requested the tracking picture     |
| protocol    | The protocol of the request (e.g. http or https)                    |
| tags        | The tags of the opened message, separated by semicolons             |
| recipient   | The recipient of the message                                        |
| city        | The city in which the open was generated                            |
| countryname | The name of the country in which the open was generated             |
| countrycode | The code (alpha-2) of the country in which the open was generated   |
| regioncode  | The code of the region in which the open was generated              |

## More information

* [REST non-send calls](./rest-other-calls)
* [REST retrieve events](./rest-events)
