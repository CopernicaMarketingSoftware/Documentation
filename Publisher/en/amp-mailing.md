# AMP mailings in Publisher
The Copernica Publisher offers the functionality to add an AMP formatted version
of your emailing. This allows for more interactivity within your email, when
compared to the HTML version. For the complete documentation of the possibilities
of AMP mailings, please refer to the [official documentation](https://amp.dev/about/email/).

## Getting started
In order to extend your templates with AMP parts, head over to your template under
the **Emailings** tab. Here, you'll find a tab `AMP source`, where you can enter
the AMP code to be included in your document. You can find a preview of the AMP
template under the `AMP version` tab. In the AMP template, you can make use of the
text, image and loop blocks the way you're used to when 
[creating HTML templates](./templates-publisher#content-blocks). Publisher supports
shared content between HTML and AMP templates between blocks, you'll find more
information about this [further on this page](./amp-mailing#shared-block-structure).

## Creating a document
When creating a document based on a template with an AMP version, you can edit 
the blocks in the AMP version by heading over to the `AMP version` tab and selecting 
the edit mode. You can also open this popup by heading over to the `Document` fly-out
menu and selecting `Edit AMP blocks...`. Editing blocks for an AMP document works
in the same way as editing blocks for a regular HTML document.

## Shared block structure
As mentioned before, Publisher supports shared content between the HTML and AMP version
of documents. When a block structure is partly shared between the HTML and AMP version, 
the contents of the blocks will also be shared. Take the following templates for example:

**HTML**:
```
[loop name="loop"]
    [text name="html-text"]
    [image name="image"]
[/loop]
```

**AMP**:
```
[loop name="loop"]
    [text name="amp-text"]
    [image name="image"]
[/loop]
```

In these template, the `loop` and `image` blocks are shared, and will therefore
have the same number of iterations (for the loop) and the same image source (for
the image block). However, the text blocks are different, and they will therefore
contain different content. By using this technique, you can quickly create two versions
of a document with a shared base.

## Sending out the AMP mailing
When creating an AMP mailing, make sure that you always have a complete HTML document
to fall back on. AMP clients might not show the AMP source after a certain period has
passed since sending out the document, or when the mail gets forwarded. Therefore, it
is good practice to always include a fallback HTML version of the document. 

Besides this, AMP clients also require a valid SPF, DKIM and DMARC configuration,
so make sure that you've succesfully set up your [sender domain](./quick-sender-domain-guide).