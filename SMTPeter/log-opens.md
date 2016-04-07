# Opens logfiles

Log files with the prefix "opens" hold information about when your sent messages
are opened. You can download the content of these files in CSV format using the [REST logfiles API](rest-logfiles).
These log files contain the following data in the respective order:

| Data                | Description                                                         |
| ------------------- | ------------------------------------------------------------------- |
| MessageID           | The id of the opened message                                        |
| Time stamp          | The time of opening form YYYY-MM-DD hh:mm:ss                        |
| The server headers  | The headers that where used to make the call, separated by newlines |
| The IP address      | The IP address of the system who requested the tracking picture     |
| The protocol        | The protocol of the request (e.g. http or https)                    |

Some fields in the returned CSV file contain newlines, so a script that
processes the CSV file needs to be a little smarter than just look for
the next newlines to find the next record.
