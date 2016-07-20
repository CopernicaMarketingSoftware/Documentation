# Images in your mail

There are several ways to get images in your mail. You can embed the images
in your mime or you can host the content and link to them. Each method has it
advantages and disadvantages. This article discusses these.


## Embedded images

Embedding an image in an mail can be seen as adding it as an attachment
to the mail. Yet, in contrast to an attachment you can link within the html
part of the mail to the image. Moreover, the image should not show up in
the attachments list. Since the data of the image is embedded within the
mail message, the data is theoretically available when a mail is received.
Therefore, the receiver does not have to accept images in order to see
the mail as intended. This of course comes with the drawback of having larger
mails.

The careful reader saw words like: "should", and "theoretically" in the
above discussion. This is because reality differs from theory. The email
client of the user in the end determines how it deals with embedded content.
It may display it directly, as one would expect, but it may also ask the
reader if it wants to display the content. Besides, some mail clients show
embedded content as attachments as well. Moreover, some email providers
with apps for mobile devices filter the embedded content out of the message
and ask if the user wants to view the image. This of course saves data on
their users' mobile plan, which is commendable, yet, it is not what you had
in mind when making the choice for embedding data. Moreover, we have noticed
that apps do not show embedded images, even if the user indicates that the
images should be displayed

In short: Embedded images have some theoretical advantages over remote images,
yet, in practice they may give problems and do not what you had in mind.
Avoid them.


## Remote images

For remote images the theory is pretty much in line with reality. The images
are only available if they are downloaded. This happens separately from
the email. Most email clients ask the user if she/he want to download the images
for the message. If the client handles HTML correctly, the mail will look
as intended. 

In short: Use remote images over embedded images


## Embed to remote

We advise you to use remote images in your mail. However, if embedded
images may show up in you mime when creating one, you can use
a feature in SMTPeter to convert them to remote images. SMTPeter extracts
the embedded content from your email, it will host this content, and it rewrites
the links in the html part of your mime.

If you send your mails using SMTP you can add:
```txt
x-smtpeter-images: hosted
```
to your mime header to activate this feature. Or enable this feature for
an SMTP login in the dashboard.

If you use the REST API, you can add the following to your JSON:
```json
{
    ...,
    "images": "hosted"
}
```
