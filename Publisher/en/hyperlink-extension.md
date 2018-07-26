# Extending hyperlinks in Publisher

By extending hyperlinks you can add special tracking codes to provide more 
information to the pages you link to. This is most often referred to as "hyperlink tagging" or "hyperlink extension". You can use this for your Google analytics or Adwords campaigns, or to log in a user for example. In this article 
we'll discuss the use cases of hyperlink extension and the possibilities within 
our software.

Warning: Hyperlink extension is only available if you are using the new link tracking system.

## Why extend hyperlinks?

There are many applications for extending hyperlinks. Some examples include:

- *Tracking website traffic*: Every link comes from somewhere, for 
example from social media, from an e-mail or a search engine. By extending 
a hyperlink with a source you can gather information on how people reach 
your website, possibly allowing you to gather more traffic in the future.
- *Automatic sign in*: When a user clicks your link from an e-mail you can 
provide information from the corresponding profile in your database. This allows 
you to personalize user experience, for example by logging them in if you provide 
login information through the hyperlink.
- *Google Analytics/Adwords*: Google Analytics and AdWords are services 
which provide an insight into your website traffic or ads respectively. By extending hyperlinks you can pass more information to these services to further enrich the data they gather.

## Activate for your domain(s)

With Copernica you can not only apply hyperlink extension to single links, but also to whole (sub)domains. For example, you can choose to pass login information every time you link to `surveys.example.com`. This allows you to easily link the survey data to user profiles and make your website more user-friendly in the process.

To execute this example in the software you can go to the E-mailings menu, where you'll find the "Hyperlink extension" menu. For the domain you would enter `surveys.example.com`. Next you can add the extra parameters, for which you can choose a custom name and value. In this case we would name the parameter something like "username". If you have a field in the database called "username" we can simply enter `{$profile.username}` to link the value from the database.

If you would like to match multiple domains you can use the so-called wildcard ('\*' symbol). For example, `\*.example.com` would match all subdomains of `example.com`. However, there are a few rules:

- You can only use one wildcard.
- The wildcard should be the first character and matches the full name.

This means that `\*.\*.domain.nl`, `subsubdomain.\*.domain.nl`, `\*something.domain.nl` are all invalid, but `\*.subdomain.domain.com` is valid.

## Parameters

### Google analytics/Adwords parameters

Google analytics has built-in support for certain parameters, such as 
the source, medium, keyword, campaign and content. You can 
read more about them in [this Google article](https://support.google.com/analytics/answer/1033173?hl=en&topic=1631856&ctx=topic).

### Extra parameters

The extra parameters are any parameters that aren't used for Google services. You can choose the name and value of these yourself. You can personalize either of these with any value that would be available in a template. You can use the 
last name of a user from your database by naming the parameter "lastname" and using the value `{$profile.lastname}` for example.

## More information
