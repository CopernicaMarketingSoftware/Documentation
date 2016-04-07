# DMARC reports

If you use [DMARC](dmarc-deployment) for your SMTPeter account, ISPs and
email providers periodically send reports with SPF and DKIM statistics.
These reports are accessible via the REST GET API with the following methods:

```text
(1) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR/ID?access_token=YOUR_API_TOKEN
```
where DATE is the date of the report in the form YYYY-MM-DD, FROM is the
domain who has sent the report, and FOR is the domain for which the report
is send. If there are multiple reports for a FROM-FOR combination at a
particular date, you can use ID (starting from zero) to retrieve the one you
want. If there are multiple reports and ID is not provided, the first report
is returned.

The DMARC reports are gzip encoded XML documents.
