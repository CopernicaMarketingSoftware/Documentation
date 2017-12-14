# PDF documents

With the Copernica Publisher you can add personalised attachments to your email templates. All text and images in a PDF can be personalized with SMARTY. You can personalize your PDF documents with all kinds of data from your Copernica database.
The blocks you use in Copernica for adding personalized content to PDF files are not created in Copernica, but in Adobe Acrobat Pro. To be able to create the blocks, you need to install the free PDFlib plugin for Acrobat PRO.
Note: the plugin is not available for Acrobat reader.

After you have installed the Acrobat plugin, an additional menu called PDFlib blocks appears in Acrobat.

To activate the tool, click the item PDFlib block tool in the new menu. Draw a block where you want it. The exact size and position of the block can be adjusted later if desired.

## Important settings

- Block name- the name of the block. This name is also shown in Copernica at the block. So give it a descriptive name.
- Type - choose the type of block you want to use. Select Text to add textual content. Select Image to add an image. 
- There is also a PDF option, you can ignore this on.

## Change font and typography

You can customize the appearance of text in text blocks to your own taste. Click the Text button, for example to change the font size, line spacing et cetera.

Note: if the text spans multiple lines, make sure that the setting Text flow is set to 'true'.

Note 2: all the fonts you want to use within the PDF blocks, need to be uploaded to Copernica.

## Copying blocks
You can simply copy the blocks in Acrobat using the familiar CTRL or CMD + C and CTRL or CMD +V key combinations.

## Conditional content
Just like the content blocks you use in emailings and websites, their PDF counterparts can be shown conditionally.
This enables you for example to show different content to male and female customers or subscribers (assuming that you know their gender).
These conditions are created in the tab Conditions, at any text or image block of the PDF document.

## Multiple blocks

You can add an infinite number of blocks to all pages in the PDF document.

## Using the easy script editor

The easy script editor allows you to make conditions without any coding skills.
Choose the field that you want to use for the condition rule. It is important that this field is in the same database you are targeting the PDF to.

- Choose the comparison type, and then the value you want to compare with.
Click 'Add extra condition' to add additional conditions. Make sure you use the correct comparison mode.

- AND - The block is included in the PDF if all conditions validate to true.
- OR - The block is included if the target profile or subprofile meets at least one condition

## Javascript editor

If desired, you can use the JavaScript editor for writing more extended conditions, by clicking on the link 'Enter Javascript Condition'.

A simple comparison in JavaScript could look as follows:

```js
profile.Gender == 'female';
```

(the block is only included if the value of the field Gender is equal to 'female')




