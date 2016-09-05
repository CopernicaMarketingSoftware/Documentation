These two functions allow you to specify which content should only be
visible in email documents or in the webversion of the email. Content
between their opening and closing tags is only visible in email or in
web documents.

These functions can be used in both the template HTML source code and
the document text block.

#### Example

**{webonly}***This text is only visible in web documents***{/webonly}**

**{mailonly}** *This text is only visible in email
documents***{/mailonly}**

Text between mailonly tags is also ommited from the webversion of the
email document.
