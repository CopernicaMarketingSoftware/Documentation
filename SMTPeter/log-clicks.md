# Clicks logfiles

The clicks logfiles have information about the clicks that are generated
by your mailings. The available information is:

* Message that generated the click
* The time of the click
* All server headers
* The url that was clicked
* The original url


This information can be obtained by [downloading](rest-logfiles) a clicks log file.
<!--- @todo add clicks method  when available --->

## The clicks csv logfile

A [downloaded](rest-logfiles) clicks log file has the CSV format and contains the following data
in the respective order:

| Data                | Description                                                         |
| ------------------- | ------------------------------------------------------------------- |
| MessageID           | The id of the message that generated the click                      |
| Time stamp          | The time of the click in the form YYYY-MM-DD hh:mm:ss               |
| The server headers  | The headers that where used to make the call, separated by newlines |
| The IP adress       | The IP address of the system where the link was clicked             |
| The message URL     | The URL in the message that was clicked                             |
| The destination URL | The URL to which the clicker was directed to                        |

Some fields in the returned CSV file contain newlines, so a script that
processes the CSV file needs to be a little smarter than just look for
the next newlines to find the next record.
