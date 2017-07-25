# Sender reputation

Your sender reputation determines your trustworthiness on the internet. It 
determines how email clients view your IP address, which influences their 
decision to accept or reject your email. There are several factors which 
influence your reputation, which is why it is important to 
manage your database effectively, send good content 
and keep your users engaged. We will now describe some factors and give 
some tips on improving your reputation.

## Influencing factors

There are several factors influencing your reputation. Follow the tips 
below to use them to your advantage!

### Database

Your database (probably) contains a lot of information. Your profile data 
often comes from the users themselves, but not all users provide useful and 
correct information. If an email bounces or is marked as spam this is bad 
for your reputation. Therefore it is important to [manage your database](./database-introduction) 
well.

### Bounce handling

Bounce handling is another very important topic. If an email is misspelled 
or does not exist at all it is harmful to your reputation to leave it in your 
database. With Copernica you can [automatically process bounces](./automatically-process-bounces) 
to prevent this from happening.

### Certification

Through Copernica you can enter a request to be a certified sender. If 
you satisfy the requirements Return Path, a company specialized in email 
reputation, will check you and give you the certificate. With Return Path 
Sender Certification you will be placed on the best whitelists, improving 
your reputation with email clients. It also improves the chances of your 
images being displayed and your links being activated.

### Pic-server

A pic-server domain is used to track clicks and opens, for example. 
Copernica offers some default pic-server domains, but sadly there are 
also Copernica users sending spammy mails that harm their reputation.

Luckily, you can set up your own pic-register domain easily. Most people 
create a subdomain under their company domain 
(e.g., *newsletter.companydomain.com*). Point the (sub)domain to 
pic.vicinity.com using a CNAME. Then go to the delivery settings of 
your account and enter your own domain at the pic-register settings, 
replacing the old one.

## Email content

### Spamscore

Every email receives a spam score, which is also important to your reputation. 
Tips to lower your spam score include adding a text version, avoiding 
'spammy' words and keeping your HTML clean. See the article on 
[lowering your spam score](./some-tips-to-lower-your-email-spam-score) for more 
tips and explanations.

### Relevance

Make sure your email is also relevant. Using [personalization](./personalization) 
is one way to make your emails more relevant. If your users are interested 
in your emails they are less likely to report them as spam.

### Unsubscribe link

Users should always (by law) be able to unsubscribe. 
By adding an unsubscribe link to each mail you give them the opportunity 
to opt out of your newsletter, making them less likely to report your email 
as spam. You can also set the [unsubscribe behaviour](database-unsubscribe-behavior) 
yourself. After you've set this behaviour you can make a 
[newsletter selection](./create-a-mailing-list) to only email those who 
want to receive your mail.

To ensure that all of your subscribers want to receive your emails and are 
using a valid email address you can [create a double opt-in](create-a-double-optin-for-new-subscribers).

### Viewing

Make sure your email looks nice and readable in every environment with 
[Litmus](./litmus) previews. If an email is not readable it could be 
marked as spam by the user.

## More information

* [Unsubscribe behaviour](database-unsubscribe-behavior) 
* [Selections Tutorial: Bounce handling](./automatically-process-bounces) 
* [Selections Tutorial: Create a double opt-in](create-a-double-optin-for-new-subscribers).
* [Selections Tutorial: Newsletter selection](./create-a-mailing-list)
* [Lower your spam score](./some-tips-to-lower-your-email-spam-score)
* [Improve your deliverability](./deliverability)
