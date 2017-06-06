# Working with templates within the Publisher

In the Copernica Publisher environment, a template / document structure is used. A template contains the global styling of the email and all the elements that relate to each mailing (such as logos, images and an unsubscribe link). In addition, a template typically contains blank spaces that can be filled in later on. To create a mailing, create a document based on a template, and fill in blank spaces with texts and images. A document is actually a completed template.
Often (but not always!) There is a distinction between the people who build templates, and marketers who compose and send mailings (documents). Templates are made by web designers or programmers with understanding of HTML. They determine the format of the mailing and indicate the places where texts and images can be placed. Once a template has been built, it can be filled by marketers with texts and images and can be sent.
In this article we are going deeper into designing templates. However, it is not a beginners course HTML. We assume you have enough knowledge of HTML to build a simple website at least.

## Keep it simple

The Publisher gives you the possibility to create templates. If you choose the "email" option in the main menu and create a new template, a form will appear on the right side of the screen where you can enter your template's source code. Here you can place the HTML code of the template. But note: The HTML code you enter is best kept easy. The simpler the source code of the template, the greater the likelihood that your email can be read by many of your recipients.
E-mail messages are read in a variety of ways: via mobile devices such as tablets (large screen), phones (small screen) or watches (tiny!). But also on regular laptops and old-fashioned desktops with specially designed email programs like Outlook or Thunderbird, or with webmail environments like Gmail or Hotmail. In addition, many people use outdated software that remove scripts and complicated CSS codes from your mails. So a template must be able to get a shot. A simple template is a lot less vulnerable than a complex template, leading to less problems.
But eventually, as a Copernica user, you're free to create your template as you like. Copernica sends the HTML code exactly as you entered, so you can make it as furious as you like.

## Content Blocks

As mentioned, a template consists of HTML code. You can edit and include blank pages that can be edited later. You decide where images and texts may be placed. These blank places are called content blocks.
There are three tags for content blocks: [text], [image] and [loop]. These tags can be included in the template source code, to indicate that document content can be posted. The operation of the [text] and [image] tags goes without saying: anywhere in the template where you place these tags, texts and images can be placed later on document level. The loop tags need some more explanation, and enables you to repeat things at document level. For example, if you want to enable someone to create mailings with a variable number of paragraphs or a variable number of items, then you can do this by including loop blocks in the template.

[Text] tags
[Image] tags
[Loop] tags

## Take note of brackets!
Within a template, brackets ('[' and ']') have a special meaning. These characters are used to mark the above-described content blocks, and you can use them for [if] statements and template variables (an example you can see in the article about [loop] tags). Because brackets have a special meaning, you should pay attention when placing something "normal" between brackets, as in the stylesheet at the top of a template. These brackets are recognized by Copernica as the beginning of a special part of the template and often results in an error. There are two tricks to prevent this: by using [ldelim] and [rdelim], or by using [literal] and [/ literal].

```
<style type="text/css">
    div[ldelim]class=x[rdelim] {
        font-weight: bold;
    }
</style>
```

If you have a very large piece of CSS code full of brackets, you can also use [literal] and [/ literal] . These tags allow you to mark part of your code within which all brackets do not have any particular meaning.

```
<style type="text/css">
    [literal]
        div[class=x] {
            font-weight: bold;
        }
    [/literal]
</style>
```

## Fixed images
Images are usually added only at document level. But in the template you can already post pictures, such as a company logo that is the same for each mailing. You can do this with normal HTML `<img>` tags. But note that the image you refer to is also linked to the template.
 
The Publisher drop down menu lets you open the "Files and Images" dialog box. In this dialog you can manage all the images and files that you are referring to. If you upload an image like image.gif, you can place the `<img src = "image.gif">` tag in the template. We ensure that the image is hosted on Copernica's servers so that recipients of the email can see the image.
You can of course also host the images yourself, but this is not ideal. Copernica handles the hosting for better deliverability and we use the image to track and open clicks too.
The "Files and Images" dialog box can also be used to manage files. This is a rather theoretical application. HTML also includes, besides the `<img>` tag, many other tags that refer to externally hosted content. For example, `<object>`, `<embed>`, `<iframe>`, and `<applet>`. If you use this type of tags (which we don’t recommend), you can link the file to which you are referring, just like an image, via this dialog.




