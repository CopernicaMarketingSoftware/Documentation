# DMARC logfiles

Log files with the prefix "dmarc" hold information about which dmarc reports
are available for your account. You can download the content of these files
in CSV format using the [REST logfiles API](rest-logfiles). These log files
contain the following data in the respective order:

| Data                | Description                                                                       |
| ------------------- | --------------------------------------------------------------------------------- |
| time                | The time when we have received the dmarc report (YYYY-MM-DD hh:mm:ss              |
| organization name   | The name of the organization who has sent the report                              |
| email               | The email address from which we received the report                               |
| report id           | The unique (for that domain) report ID                                            |
| begin               | The begin time of the period covered by the report                                |
| end                 | The end time of the period covered by the report                                  |
| domain              | The domain that is covered by the report                                          |
| sending domain      | The domain that has sent the report (1)                                           |
| messges             | The number of messages received by the domain (2)                                 |
| failed SPF          | The number of messages that failed the DMARC check because of an invalid SPF  (2) |
| failed DKIM         | The number of messages that failed the DMARC check because of an invalid DKIM (2) |

(1): For some old files the sending domain is determined on the domain of
the address that has send the report. It turned out that some reports are
send via a different address that the domain that is covered by the report
(an example is microsoft.com who also sends reports for hotmail.com). This
is solved in new records.
(2): Old records do not have this information
