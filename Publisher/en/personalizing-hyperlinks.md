# Expand and personalize hyperlinks

By extending hyperlinks you can add special tracking codes to provide more information to the pages you link to. This is also called "hyperlink tagging" or "hyperlink extension". In this article we discuss the applications of hyperlink extension and discuss the possibilities within our software.

Hyperlinks in mailings can be enriched with data from a profile or sub-profile. An example of this are unique credentials ($profile.id and $profile.code) that you add to the hyperlink, so that users are automatically logged in when they click from an email to a web page hosted by Copernica.

## Why extend hyperlinks?

There are many applications for expanding hyperlinks. Examples are:

- *Track website traffic*: Every link has its source, for example from social media, from an email campaign or from a search engine. By extending the hyperlink with a utm_source you can keep track of how people end up on your website.
- *Automatic login*: If a user clicks on a personalized link from your email. 
- *Google Analytics*: With Google Analytics you can gain insight into your website traffic from campaigns, advertisements and mailings. By expanding hyperlinks you can pass on more information to this service to further enrich your data.

## Google analytics UTM tracking code

Google analytics has support for a number of specific parameters, such as
the source, the medium, the keyword, the campaign and the content. You can do more here
about reading in [this article](https://support.google.com/analytics/answer/1033173?hl=en&topic=1631856&ctx=topic).

## Expand hyperlinks in the Marketing Suite

You can personalize hyperlinks in the marketing suite. This goes by domain. You can indicate per domain whether you want to use tracking codes for Google Analytics or not. You can use both personalization in the parameters and in the value.

## Expand hyperlinks in the Publisher

Note: Extending hyperlinks in this way is only possible if you are using the new link tracking system! [Expanding Hyperlinks with the old link tracking system works a bit different] (# with-the-old-link-tracking system).

In the expand hyperlinks dialog you can expand hyperlinks at both template level and document level. These settings are merged when you send a mailing. If the document uses the same parameters as in the template, then these will be overwritten.

With the new link tracking system, all links are adjusted at the last moment. In the document preview the entire url will be shown. In the editing modes the hyperlink will not be expanded. The links are only extended after personalizing the document, in the last step before sending.

It is also possible to store a complete URL in a database field in a profile or sub-profile.

```html
<a href="{$profile.url}">
  Go to website
</a>
```

Or in a text block:

```html
<a href="[text name='mylink']">
  Go to website
</a>
```

### A URL in a subprofile

If you send a mailing to a profile, and you want to personalize the URL with data from a sub-profile under this profile, you use the loadsubprofile function, for example:

```html
<a href="{loadsubprofile source='databasename:collectionname' assign=ls profile=$profile.id}{$ls.url}">
  Go to your personal page
</a>
```

### Apply settings to different domains

With the Copernica Publisher you can extent hyperlinks not only to individual links, but also to (sub) domains. This allows you, for example, to provide all hyperlinks to `form.example.com` 'to log in, so that you can easily link information to profiles and make your website more user-friendly.

If you want to do this in the software, first open the "Expand Hyperlinks" menu in the template editor. Here you can fill in domain `surveys.example.com`. You can then create a parameter with the name "username" under "Extra parameters". If your field for the username is called "username" in your database, you can add it by entering `{$profile.username}` in the value of the parameter.

If you have multiple domains you can use a so-called wildcard ('\ *' symbol) to indicate which domains must be matched. For example, `*.example.com` matches all subdomains of `example.nl`. There are, however, a number of rules:

- Only one wildcard may occur.
- The wildcard can only be the first character and has to match a full name.

This means that `*.*.domain.nl`,` subdomain.*.Domain.nl`, `*something.domain.nl` are not valid, but `*.subdomain.domain.com` is valid.

### Additional parameters

These extra parameters are not used by Google Analytics. You can specify your own name and value. You can personalize the value as well. For example, you can give "last name" as name and `{$profile.lastName}` to use the user's last name from the database.

You can also make special links to create personalized web pages. Read more about this in [this documentation article] (websites).

This can be done with such a link:

```html
<a href="https://www.example.com?profile={$profile.id}&code={$profile.code}">
  Go to this website
</a>
```

## With the old link tracking system

It used to work in a different way. With the old link tracking system an email is personalized at two different stages:

1. The document is personalized when composing the mailing (just before it is placed to the outbox)
2. Smarty code within hyperlinks is processed by our pics server, and is only executed immediately after the recipient clicks on the hyperlink.

If the smarty code from the document has already been executed, than it is no longer available.

The example below does not work with our old link tracking system. The hyperlink will end up empty and will direct you to a blank page after you clicked it, because the capture has been executed a long time ago.

```html
{capture assign = "url"} http://www.google.nl {/ capture}
<a href="{$url}">
    Go to google.com
</a>
```

To make the link work, the variable must be included in the link.

```html
<a href="{capture assign='url'}http://www.google.com{/capture}{$url}">
    Go to google.com
</a>
```

If for some reason you do not want to include a whole bunch of code in every hyperlink, then you can choose not to register clicks in the emailing. This setting can be found in the tab 'options' in the second step in the dialog to send a bulk mailing. The recipient is no longer redirected via our pics server when clicking on the link and the link is personalized at the same time as the document. But no clicks are registered anymore. You will have to make that decision.
