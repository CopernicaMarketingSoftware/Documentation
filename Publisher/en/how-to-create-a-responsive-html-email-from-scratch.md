# How to create a responsive HTML email from scratch

You want your emails to look good in every environment. Especially nowadays, when roughly half of all emails is opened on a mobile device, responsive design is essential to commercial email senders. In this article, we'll show you the basic principle of making a responsive HTML email using CSS Media Queries and provide you with an example.

## Before you continue...

For the sake of brevity, we assume that you already have sufficient knowledge of HTML and CSS. If you don't, worry not: our Marketing Suite drag-and-drop editor does not require any knowledge on these subjects and makes your templates responsive automatically.

## Hello world example
The basic structure of every HTML email consists of a doctype declaration, a head, and a body. Within the head, you have to define the character set and the device width. 

If you plan to make a responsive email you have to use a meta viewport. This tells the email client to assume the email is as wide as the screen width of the device it's being displayed on. Below, you'll see an example of a reliable declaration with the essential meta tags.

```html
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <p>
        Hello world
    </p>
    </body>
</html>
```

## Basic structure
The basic structure of two boxes placed next to each other needs to be placed within a couple of tables. In email, every box needs to be contained within a table. Otherwise, your content will break in many clients. Start with a background table, then a wrapper table that you can center, two cells/columns next to each other and finally a table for your content.

The trick is to use two ‘td’ elements that are automatically displayed next to each other. You only want to change this behaviour on smaller screens. You can do this with media queries. 

```html
<table width="100%">
        <tr>
            <td class="wrapper" width="600" align="center">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="column" width="300">
                            <table>
                                <tr>
                                    <td align="left">
                                        <h2>Left column</h2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="column" width="300">
                            <table>
                                <tr>
                                    <td align="left">
                                        <h2>Right column</h2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
```

## CSS media queries

Media queries use an @media rule to determine whether or not to include a block of CSS properties. They consist of three parts: the media type, a condition and the styles that need to be applied. So, the rule “@media only screen and {max-width: 600px}” means “if it is on a screen and it's less than 600px wide, use the following CSS”. If this is not the case, your inline CSS is used.

Media queries are specified in the `<head>` section of the document and only work when embedded in the HTML. This means that you cannot use media queries as inline styles.

There are many more possible rules for media queries, but for this example we're using the max-width property. 

```html
 <style rel="stylesheet" type="text/css">
@media only screen and (max-width: 600px) {
.wrapper table {
width: 100% !important;
}

.wrapper .column {
// make the column full width on small screens and allow stacking
width: 100% !important;
display: block !important;
}
}
</style>
```

What happens when the screen is less than 600 pixels the width of the wrapper only changes from 600px to 100%. This makes the wrapper fluid and smaller than 600 pixels. 

To make the columns flow over each other you need to use display block. This enables stacking.

Note that we've used the `!important` declaration here. Normally you don’t need to do this but it’s common practice to use this declaration when building HTML email templates within media queries. With this declaration you override all the inline styles that sometimes get priority. For email, it's best to use only inline styles, because some clients do not support embedded style sheets yet. We know inline CSS can be a bit of a hassle to write, so Copernica Marketing Software has a tool to inlinize your CSS automatically. Create a clear structure of classes in your document: not only does this make your source code look more organized, it also makes style sheets and media queries a lot easier to write.

## Other best practices

### Separate elements
Responsive emails are characterized by elements appearing below one another, rather than next to each other, when displayed on a smaller screen. In order to achieve this, it is necessary that you create separate elements. Say, you want to create two columns of content. In a regular document you might create a table with two columns of cells to do this. In a responsive document, you'll need to make two separate elements and have one align to the right side of your document and one to the left. If you don't do this, your two-columned table will just shrink as the screen gets smaller and become illegible.

### Test for all email clients
Although most of the major email clients support media queries, not everyone is on board with them at all times. Sometimes providers change their stance on them. Therefore, testing your emails on several clients before sending them is essential. This is possible with Copernica marketing software. Furthermore Copernica shows you which clients and which devices are used by your audience, so you know what to focus on while testing and designing. 

Example template

This is an example template with a basic layout that uses all of the elements we discussed in this article. Feel free to use it and tweak it to your own preferences.

```html
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A responsive two column example</title>

    <style rel="stylesheet" type="text/css">
        
        @media only screen and (max-width: 600px) {

            .wrapper table {
                width: 100%;
            }

            .wrapper .column {
                width: 100%;
                display: block;
            }
        }

    </style>

</head>

<body>
    <table width="100%">
        <tr>
            <td class="wrapper" width="600" align="center">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="column" width="300">
                            <table>
                                <tr>
                                    <td align="left">
                                        <h2>Left column</h2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="column" width="300">
                            <table>
                                <tr>
                                    <td align="left">
                                        <h2>Right column</h2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
```
