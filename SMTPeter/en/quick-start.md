# Quick Start Guide

Eager to start using SMTPeter for your email delivery? Use this quick start 
guide to quickly start sending your email through SMTPeter. 

## 1. Create an account

First things first: before you start using SMTPeter, you first need to 
[create an account](https://www.smtpeter.com/app/#/menu/register "create an account"). 
Creating an account gives you access to your 
[SMTPeter Dashboard](dashboard/dashboard-overview "Dashboard Documentation"). 
In this dashboard you can access and edit all your administrative, 
SMTP/REST api access and configuration information. 

## 2. Allow SMTPeter to send from your domain

Before you can send email through SMTPeter you first need to allow the SMTPeter 
mail servers to send email messages from your domain. To do so you will have to 
set up a Sender ID and an SPF record. These are email-validations systems that 
are designed to detect email spoofing by checking if a mail comes from a host 
that is authorized by the domain administrators. It does so by doing a DNS check 
on the from domain. 

The main difference between Sender ID and SPF is the field it checks. SPF checks 
the MAIL FROM-field. Sender ID checks a combinations of fhe following fields: 
From, Sender, Resent-From and Resent-Sender.

### Setting up an SPF record


### Setting up a Sender ID

To set up a Sender ID you will need access to the DNS-settings of your domain. 
If you you have access, it is very easy to set up the Sender ID. Add the following 
line to the TXT-record when sending through SMTPeter: 


```text
v=spf1 include:_senderspf.copernica.com a mx ~all

```



Before you can send email from your domain you will need to set up 
a Sender ID. Sender ID is heavily based on SPF. 

> Setting up a Sender ID requires access to your domain DNS settings. 
If you use the from address *info@mydomain.com* for your email, 
you need access to the DNS settings of mydomain.com.

If you utilise SPF for a domain you would like to send mail
through SMTPeter, you should include the SMTPeter
IP-addresses to make sure the mail is not regarded as spam.

To make this easier (and since the IP-addresses that SMTPeter
sends from can change), we have set up a SPF record that can
be included, so you automatically keep the latest - and correct -
version.

To include all the SMTPeter IP-addresses, add the following
TXT - and if possible SPF - record on your domain.

` "v=spf1 include:_senderspf.smtpeter.com a mx ~all" `

## 3. Choose an API

Once you have created your account and set up your Sender ID it is time to choose
 which API to use. There are a few differences between our API's:

The REST API uses the HTTP protocol, a faster and more flexible protocol than SMTP. This because 
the SMTP protocol is a so called [handshake protocol](https://en.wikipedia.org/wiki/Handshaking "Handshaking Wiki"), 

The REST API is also designed to include different variables 
in a single "call", the SMTP protocol was not designed to do so. Our REST API accepts POST and JSON data 
on its endpoint. 

If you want to use SMTPeter with Postfix, please follow our 
[Using SMTPeter with Postfix guide](postfix "Using SMTPeter with Postfix").

If you are already sending through SMTP or want to send through SMTP you should 
read our [SMTP API quick start guide](smtp-api)

If you want to use our REST API go to our 
[REST API quick start guide](rest-api)
