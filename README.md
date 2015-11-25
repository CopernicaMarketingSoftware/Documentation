# Documentation

Here you can explore in detail our products, which include:

- MailerQ - a high performance Mail Transfer Agent (MTA) designed for delivering large volume email messages at very high speeds
- Marketing Suite - brand new Copernica Marketing Suite
- PHP-C++ - a C++ library for developing PHP extensions
- PHP-JS - to execute JavaScript right from your PHP script and share variables between JavaScript and PHP
- Responsive Email - an online service to create and send responsive HTML emails.
- SMTPeter - to connect your app via SMTP or REST API and start sending emails through the cloud instead of your server
- AMQPipe - Tool to process AMQP messages

With Copernica you can deliver relevant and timely communications using email, sms, landing pages and PDF.
 
# Working with documentation

Each top-level directory in this repository hold documentation for one specific
product. 

## Documentation pages

Documentation pages can be written with HTML or Markdown. Thus, files written 
with Markdown will have priority over ones written with HTML.

## Links and files

Since documentation pages can be presented in various environments (websites, apps)
we utilize `copernica-docs` protocol for linking resources or pointing to files 
inside this repository.

Clients serving content from this repository should implement a way of rewriting
such links (or hijacking clicks on such) to localized form

Examples:

```
[Page on MailerQ](copernica-docs:Mailerq/page)

[Page on SMTPeter](copernica-docs:SMTPeter/page)

[Page on AMQPipe](copernica-docs:AMQPipe/page)

etc...
```

### Internal links

Documentations pages can have internal links. Such links are created in HTML like
fashion by adding hash part to the link. 

Examples:
```
[Page on MailerQ](copernica-docs:Mailerq/page#segment)
```

Internal links can reference headers. Identifiers to use inside such links 
are generated with use of text inside the header. Following steps will be applied
to create identifier:

1. convert every utf-8 characted into ascii character
2. lowercase all characters
3. replace all spaces with '-'

## Special files

In each directory there should be two files: navigation.md and introduction.md.
Both of those files are little bit special. 

### navigation.md 

`navigation.md` should contain list of links to documentation topics. List can
contain more lists.

### introduction.md

`introduction.md` should contain introduction text for given documentation. Also,
it will be a default page for documentation.
