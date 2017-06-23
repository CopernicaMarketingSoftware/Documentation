# Websites: settings

For each website you can specify different settings for the storing of 
session cookies (time-out) and https secure access.

## Time-out settings

The time-out on a website determines how long a user will stay logged in 
while not requesting pages or refreshing pages. If you set the time-out 
to 1 minute the user will be logged out automatically after not doing 
anything for a minute.

The default time-out is "0". This is a special value that will make the 
session active for all of the current browser session. If you do not 
change the time-out the user will automatically be logged out when closing 
the browser.

## HTTPS access

Hypertext Transfer Protocol Secure (HTTPS) is an extension on the HTTP protocol 
that aims to transfer information safely. It combines the Hypertext Transfer 
Protocol (HTTP) with the SSL/TLS protocol to safely exchange encrypted 
information. Encryption makes it impossible to know what kind of information 
was exchanged, even if someone does manage to get their hands on the information. 
HTTPS is often used where privacy-sensitive information such as name, adress, 
date of birth, social security numbers etc. are exchanged.

Copernica offers three options for HTTPS access: Accept *HTTP only*, *HTTPS 
only* or *both*. If you handle sensitive information please consider using HTTPS only. 
Your website visitor will be redirected if SSL connection is required and 
the user requests the site using HTTP. If you are using your own domain name 
there are some extra steps you should follow for using SSL.

## Using SSL with your own domain name

It is possible to make your Copernica website available through a 
secure HTTPS connection. If you have a Copernica subdomain no extra steps 
are needed, as Copernica's SSL certificate will cover your website. However, 
if you want to use your domain name you should request a SSL certificate 
and deliver it to us first. You may need such an SSL certificate if you want 
to associate with social media websites, for example.

Please follow the following steps to use HTTPS with your own domain:

1. Apply for a SSL certificate of any type if you do not have one yet.
2. Request a dedicated IP adress at Copernica if you do not have one yet. 
You can request the adress with our Support team (support@copernica.com) for a small monthly fee.
3. Hand in the SSL certificate to our Support team along with its private key, 
the intermediate-certificate and the root-certificate. This is sensitive information, 
so don't send this unencrypted. You can also upload the certificate to a secure 
FTP server or send it over Skype.
4. If you have completed all previous steps you can set your website settings 
to use HTTPS.

## More information

* [Websites](./websites)
