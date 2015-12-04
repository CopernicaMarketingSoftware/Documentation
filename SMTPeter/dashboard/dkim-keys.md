# Configuring DKIM keys

The SMTPeter dashboard shows the DKIM keys you have currently 
configured and allows you to create new DKIM keys or add an 
existing key for SMTPeter to sign your emails with.

DomainKeys Identified Mail (DKIM) is an email validation 
system designed to detect email spoofing by providing a 
mechanism to allow receiving mail exchangers to check that 
incoming mail from a domain is authorized by that domain's 
administrators and that the email (including attachments) 
has not been modified during transport.

## Adding a new DKIM key

To add a new DKIM key press the 'ADD DKIM' button on the top right 
of the page. Here you can create a new DKIM key or, if you have one, 
add an existing private key. You can create multiple DKIM keys, and
set them to only be used for specific emails. 

Creating a DKIM key requires you to fill out the  following fields:

```ini
selector:       used to determine which DNS record is used to verifythe public key
domain name:    your domanain name
algorithm:      SHA256 (default) or SHA1
```

### Configuring DKIM keys for specific emails

You can choose whether SMTPeter will sign all emails from your domain with 
your DKIM key, or create a filter based on sender information.

To set up a filter, select the 'only use this DKIM key for emails with specific sender information'
option when creating DKIM keys. You can then create a condition based on the from name, a filename 
pattern, or a regular expression. 

You can also create a fallback DKIM key that is only used when none of your other 
(conditional) DKIM keys can be used to sign an email. 

## Configuring your DNS after creating a new DKIM key

To properly install your DKIM key, you need to update 
your domain DNS. Keep in mind any time that DNS changes are made, 
you need to wait for propagation to complete. Propagation usually 
takes from several hours to 5 days.

Follow the next steps to set the DKIM for your domain.

  1. Sign in to the administrator console provided by your domain registrar
  
  2. Locate the page from which you can update the DNS records
  
  3. Create a TXT record with the name dkim._domainkey. This includes the underscore. 
  Underscores are allowed in certain DNS entries and actually required to make the DKIM work.
  
  4. Add your DKIM key to your TXT record, in the SMTPeter dashboard there are tailored instructions 	on how to install your DKIM. 
  
  5. Save your changes

 >**Note:** When creating a DKIM key on the SMTPeter dashboard the above five steps will be 
 personalized so you can easily copy and paste your DKIM key into your TXT record.


## DKIM key status

 Once you have added your DKIM key, the overview shows the domain, selector and algorithm 
 used for each of your keys. It also shows whether it's a conditional DKIM key or one that 
 is always used. 

 If you click on a DKIM key it will allow you to change the sign rules (whether it is a 
 conditional key or one that is always used) and check the DKIM status. The status shows 
 if your DKIM key is valid and whether you have a DKIM record on your domain. 