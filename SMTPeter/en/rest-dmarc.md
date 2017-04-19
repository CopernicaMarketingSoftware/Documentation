# Retrieve DMARC reports

SMTPeter supports DMARC. Via the rest API you can get the sent DMARC
reports. If you use [DMARC](dmarc-deployment) for your SMTPeter account, ISPs and
email providers periodically send reports with SPF and DKIM statistics.
These reports are accessible through the REST GET API with the following methods:

```text
(1) https://www.smtpeter.com/v1/dmarc
(2) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR
(3) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR/ID
```

DATE is the date of the report in the form YYYY-MM-DD. FROM is the
domain who has sent the report, and FOR is the domain for which the report
is send. If there are multiple reports for a FROM-FOR combination at a
particular date, you can use ID (starting from zero) to retrieve the one you
want. If there are multiple reports and ID is not provided, the first report
is returned. The DMARC reports are XML documents.

If you call DMARC without any extra arguments (method 1), you receive
an array with dates for which we possibly have DMARC reports for you. However,
we advise you to use the [log files method](rest-logfiles) to see for which
dates you have DMARC log files. The content in these DMARC
log files gives you the information you need, like FROM and FOR, to get the
DMARC reports.