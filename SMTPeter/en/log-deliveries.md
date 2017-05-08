# Deliveries log files

Each delivered mail is logged in log files with the prefix "deliveries".
You can download the content of these files in CSV, JSON, and XML format
using the [REST logfiles API](rest-logfiles) or the dashboard. These log
files contain the following data in the respective order:

| Name      | Description                                                             |
| --------- | ----------------------------------------------------------------------- |
| id        | The unique message id of the sent message                               |
| time      | The time when the delivery was reported (YYYY-MM-DD hh:mm:ss formatted) |
| envelope  | The envelope of the message                                             |
| recipient | The recipient of the message                                            |
| from      | The "from" ip address                                                   |
| to        | The "to" IP address                                                     |
| attempt   | The attempt number (starting from 0)                                    |
| tags      | The tags of the messge (semicolon separated)                            |

## More information

* [REST non-send calls](./rest-other-calls)
* [REST retrieve events](./rest-events)
