# Opens logfiles

Log files with the prefix "opens" hold information about when your sent messages
are opened. You can download the content of these files in CSV, JSON, or XML
format using the [REST logfiles API](rest-logfiles) or the dashboard.
These log files contain the following data in the respective order:

| Name     | Description                                                         |
| -------- | ------------------------------------------------------------------- |
| id       | The id of the opened message                                        |
| time     | The time of opening form YYYY-MM-DD hh:mm:ss                        |
| headers  | The headers that where used to make the call, separated by newlines |
| ip       | The IP address of the system who requested the tracking picture     |
| protocol | The protocol of the request (e.g. http or https)                    |

