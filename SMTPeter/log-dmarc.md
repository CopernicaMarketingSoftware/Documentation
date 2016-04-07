# DMARC logfiles

The dmarc logfiles have information about which dmarc reports are available
for your account. The available information in the log files is:

* time
* organization name
* email
* report id
* begin
* end
* domain
* sending domain
* filename

This information can be obtained by [downloading](rest-logfiles) a DMARC
log file. With this information you can [download](rest-dmarc) the actual
DMARC report.


## the dmarc csv log file
A [downloaded](rest-logfiles) dmarc log file has the CSV format and contains the following data
in the respective order:

| Data                | Description                                                          |
| ------------------- | -------------------------------------------------------------------- |
| time                | The time when we have received the dmarc report (YYYY-MM-DD hh:mm:ss |
| organization name   | The name of the organization who has sent the report                 |
| email               | The email address from which we received the report                  |
| report id           | The unique (for that domain) report ID                               |
| begin               | The begin time of the period covered by the report                   |
| end                 | The end time of the period covered by the report                     |
| domain              | The domain that is covered by the report                             |
| sending domain      | The domain that has sent the report (1)                              |

(1): For some old files the sending domain is determined on the domain of
the address that has send the report. It turned out that some reports are
send via a different address that the domain that is covered by the report
(an example is microsoft.com who also sends reports for hotmail.com). This
is solved in new records.
