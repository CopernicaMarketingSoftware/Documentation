Every click on every link from messages sent via Marketing Suite is
logged in the cdm-click log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](./logfiles-content),
or the dashboard. These log files contain the following data in the
respective order:

| Data | Description |
| ---- | ----------- |
| id | The ID of the message from which was clicked |
| senderdomain | The sender domain from which the message was sent |
| time | The time when the click occurred |
| linkinfo | The link id |
| ip | The IP address that clicked |
| header | The header of the request form the click |
| email | The email address to which the mail was originally sent |
| tags | The tags of the message (semicolon separated) |
| countrycode | The code of the country in which the click occurred |
| countryname | The name of the country in which the click occurred |
| regioncode | The region code in which the click occurred |
| city | The name of the city in which the click occurred |
