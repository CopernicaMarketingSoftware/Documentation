# Opens logfiles

The opens logfiles have information about when your sent messages are opened.
The available information is:

* The identifier of the message
* The date and time the message was opened.
* All server headers
* The IP address
* The protocol used

This information can be obtained by [downloading](rest-logfiles) an opens log file.
<!--- @todo add opens method  when available --->


## The opens file

A [downloaded](rest-logfiles) opens log file has the CSV format and contains the following data
in the respective order:

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
