# JSON to MIME conversion

Email messages use a special format: MIME. If you want to create email message,
you will therefore have to collect the subject of your mail, the text and 
HTML versions, the sender and recipient addresses, DKIM signatures, 
attachments and all other kinds of settings and combine them all into a 
single nested multipart MIME string.

````
From: Peter <peter@smtpeter.com>
To: John Doe <johndoe@example.com>
Subect: This is an example message
MIME-Version: 1.0
Message-id: <example@example>
Date: Sun, 20 Mar 2016 13:00:00 GMT
Content-Type: multipart/alternative; boundary="---my-boundary---"

This is a multipart MIME message

---my-boundary---
Content-Type: text/plain
Content-Transfer-Encoding: quoted-printable

This is the text version of the mail
---my-boundary---
Contennt-Type: text/html
Content-Transfer-Encoding: quoted-printable

<html>=0A    <body>=0A        This is the HTML version of the mail=0A    </=
body>=0A</html>

---my-boundary-----
````

It is not always an easy thing to create these messages. MIME has been around for
a very long time, and nowadays we have much simpler technologies to format
data. If you do not want to construct your MIME messages yourself, you must
keep in mind that SMTPeter is a MIME artist, and he can do it for you too.

The SMTPeter REST API can be used to inject traditional MIME formatted
emails, but you can send your messages in JSON format too:

````
{
    "from": "Peter <peter@smtpeter.com>",
    "to": "John Doe <joendoe@example.com>",
    "subject": "This is an example message",
    "text": "This is the text version of the mail",
    "html": "<html><body>This is the HTML version of the mail</body></html>"
}
````

The above JSON formatted message is semantically equivalent to the earlier
demonstrated MIME formatted email. The SMTPeter REST API can be used
to inject emails in both forms. You can even use JSON for attachments
and embedded images.

