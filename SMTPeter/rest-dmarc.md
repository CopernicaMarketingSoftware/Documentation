# DMARC settings and reports

SMTPeter supports DMARC. Via the rest API you can get your DMARC settings
and the sent DMARC reports. The supported methods with respect to dmarc
are:

```text
(1) https://www.smtpeter.com/v1/dmarc?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR/ID?access_token=YOUR_API_TOKEN
```

## Get DMARC settings

To obtain your DMARC settings for your sender domains you can post a GET
call to:

```text
(1) https://www.smtpeter.com/v1/dmarc?access_token=YOUR_API_TOKEN
```
You will receive an array with JSON objects of the form:
```json
{
    "name": "senderdomain.com",
    "policy": "none",
    "percentage": 100
}
```
The "name" property in the JSON holds the name of the sender domain. The
policy is the sender domain's DMARC policy ('none', 'quarantine', or 'reject').
The percentage holds the percentage of mails for which the policy should
be applied.


## Get DMARC reports

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
