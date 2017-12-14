# Websites in Publisher 

In the Copernica Publisher it is made easy to create and host your own 
webpage using HTML. You can use these pages to inform your customers or place webforms 
and surveys to get to know your customers. You can use a [template](./templates) 
for your website and edit the source code with ease. It's also possible 
to use [personalization](./personalization) (only) if your users are logged in. 
We will explain how to automatically log users in through your emails later 
in this article.

You can also link the website to a subdomain of your own website. This 
prevents users from seeing your website is hosted by Copernica and makes 
it look more trustworthy and professional in general.

NOTE: Building a website with Copernica required HTML knowledge. If you 
do not have HTML knowledge you may use our default template, import one 
from the internet or let a Copernica partner create one for you.

Article contents:

* [Getting started](./websites#getting-started)
* [Creating pages](./websites#creating-pages)
* [Linking a domain](./websites#linking-a-domain)
* [Link from an email](./websites#link-from-an-email)
* [Set default pages](./websites#set-default-pages)
* [Restricting access](./websites#restricting-access)
* [More information](./websites#more-information)

## Getting started

You can find the `Websites` button in the Publisher menu. From here you 
can create a website with several webpages. We distinguish between the two: 
Webpages are similar to email documents and use their own templates. The 
website is the collective of webpages. 

The template is the blueprint of your website that determines what it 
should look like and how it should be structured. Since it only 
determines the style and structure you can use such a template for the whole website 
to give it a uniform look, but it's also possible to use multiple 
templates for your website. After creating a template you can start 
adding content such as text, image and loop blocks to create the webpage. 
They can also be [personalized](./personalization).

Some important points:
* A website contains webpages, which are like documents.
* Pages can be based on the same or different templates.
* The website only becomes available online after linking to a domain or 
subdomain.
* It is possible to have multiple domains for one website, but not multiple 
websites for one domain. 
* Only websites with a valid domain are billed. You can check your license 
information for prices.
* [Surveys](./surveys) and [webforms](./webforms) made in Copernica 
only work on Copernica hosted pages.

## Creating pages

First you have to create a new template and a new website in the `Websites` 
menu. You will edit the HTML source code to create the template for the 
webpage. There are several types of content blocks that you should add 
to the template such that you can fill them in later. The table below 
shows examples on how to use the blocks. Be sure to consider the ratio 
between text and images, as it may affect your [spam score](./some-tips-to-lower-your-email-spam-score).

| Content block         | Example                                                           | Use                                      |
|-----------------------|-------------------------------------------------------------------|------------------------------------------|
| [Text](./text-tag)    | [text name="TEXTBLOCKNAME"]                                       | Add textual content to your webpage      |
| [Image](./image-tag)  | [image name="IMAGEBLOCKNAME"]                                     | Add images to your email                 |
| [Loop](./loop-tag)    | [loop name="LOOPNAME"]code to repeat[/loop]                       | Repeat image, text and other loop blocks |
| [Survey](./surveys)   | {survey name="name of the survey"}                                | Include survey made under `Content`      |
| [Webform](./webforms) | {webform name="name of the form"}                                 | Include webform made under `Content`     |

Media is managed under the *Media Library* in `Content`. You can use 
images from the media library with <img src="image.png"\>.

The [loop block](./loop-tag) is very useful when you don't know how many images you will use, 
or if not every webpage uses the same amount of images. You may then choose 
how many images to use while creating the webpage without changing the HTML.

You can also add a [survey](./surveys) or [webform](./webform) by using 
the *Include special content* function in the screen to edit the 
contents of a text block. This will replace the text block with a survey 
or webform block.

When you have created the template you can simply create a webpage and edit 
its content.

## Linking a domain

Your website will only be available and billed if it is linked to a valid domain. 
You can choose to link to *www.yourdomain.com* or a subdomain like 
*www.surveys.yourdomain.com*. Which one you choose depends on your needs: 
If you just want a small website hosted by us you can choose to host on 
your main domain. If you just want to use Copernica websites to handle 
surveys, for example, it is better to make a separate subdomain for this.

How to set up the domain:
1. Create a new subdomain in the DNS* of your website domain.
2. Make a CNAME record pointing to *publisher.copernica.com* to refer 
to our hosted version of your website. (See [Google CNAME help](https://support.google.com/a/answer/47283?hl=en))
3. Link the subdomain in Copernica via *Domains* in the website menu.

## Link from an email

Clever hyperlinks can help you and your customer. Adding login codes to 
the hyperlink in your email gives you the profile information, which 
has quite a few advantages:

* Webforms can be pre-filled with profile data
* Surveys results can be linked automatically
* Personalization with profile data
* Users don't need to log in

You can prepare the hyperlink with the function *Prepare hyperlinks* 
under *Document* in the `E-mailings` menu, or add the following code to 
your hyperlink:

`http://subdomain.yourdomain.nl/namewebpage**?profile={$profile.id}&code={$profile.code}**`

Please remember to replace *profile* by *subprofile* if you are emailing 
subprofiles instead.

## Set default pages

There are a few default pages that are useful for your website to have. 
You can configure them under *Default pages* in the website menu.

* *Home page*: Where the user is sent if they have not entered a specific 
webpage.
* *Error page*: Where the user is sent if they are sent to a non-existing 
page.
* *Login page*: The page that is displayed when a user needs to login 
to continue. Place a login form here.

## Restricting access

The login page is shown when a user has no access to the current page. You 
can set the access for pages in the website menu. In the same menu you 
can also (temporarily) deactivate a webpage.

## More information

- [Statistics](./statistics)
- [Website settings](./websites-settings)
