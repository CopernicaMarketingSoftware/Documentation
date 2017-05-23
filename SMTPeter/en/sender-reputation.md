# Sender reputation

Your sender reputation determines your trustworthiness on the internet. It 
determines how email clients view your IP adress, which influences their 
decision to accept or reject your email. There are several factors which 
influence your reputation, which is why it is important to 
manage your database effectively, send good content 
and keep your users engaged. We will now describe some factors and give 
some tips on improving your reputation.

## Influencing factors

### Identification

It is important to always identify yourself when sending your emails. 
There are a lot of people out there who have malicious intentions and 
might try to scam people by pretending they are someone they are not. 
Several safety mechanisms have been developed over the years to protect 
the internet from these malicious intentions, but this also means that 
you have to put some extra work into proving you are really the one 
sending email. SMTPeter's [sender domains](./sender-domains) are a great 
way of setting up complicated things like [SPF](spf-validation), 
[DKIM](dkim-signing) and [DMARC](dmarc-deployment). After you set up a 
sender domain you can focus on your business, while we take care 
of your messages.

### Database

Your database (probably) contains a lot of information. Your profile data 
often comes from the users themselves, but not all users provide useful and 
correct information. If an email bounces or is marked as spam this is bad 
for your reputation. Therefore it is important to manage your database
well.

Users should always be able to unsubscribe. Not only is it required by 
law, but annoyed recipients might report your email as spam otherwise, which 
is bad for your reputation. If you add the link you can also determine 
how you will handle the unsubscribe in your database.

Bounce handling is also very important. If you have misspelled or non-existing 
email adresses you may receive bounces from them. Bounces are bad for your 
reputation, therefore it is best to remove email adresses that repeatedly 
generate errors and bounces.

A double opt-in is also an effective way to ensure the validity of the 
adress and the desire of the profile to receive your emails. When using 
a double opt-in you send new subscribers a link, which they first have 
to click to confirm that they really want to receive your email. They should 
not receive any mails other than the confirmation mail from you until they 
have confirmed their email adress.

### Email content

Every email receives a spam score, which is also important to your reputation. 
Tips to lower your spam score include adding a text version, avoiding 
'spammy' words and keeping your HTML clean. Email clients can also detect 
an abnormal ratio of pictures to text and hyperlinks that don't go to the 
URL they display.

You also want to engage your users to prevent them from marking the email as 
spam. Be sure to make every email interesting and relevant.

## More information

* [Sender domains](./sender-domains)
* [SPF validation](./spf-validation)
* [DKIM signing](./dkim-signing)
* [DMARC deployment](./dmarc-deployment)

