# Link to the webversion of your email

The webversion offers a solution for the recipient who cannot read HTML
newsletters in their email program. You include the webversion in your
email templates and documents with the {webversion} tag. It is also
possible to link to an email document from a website with the
{linkemail} tag. Both more or less have the same functionality.

-   Use {webversion} to add a link to the webversion in your email
    document or template.
-   Use {linkemail} to link to an email document and template from a web
    page. For instance to publish a newsletter archive.

Note that the tag itself only generates a (for each recipient unique)
URL. To make this URL clickable some HTML code is needed.

`<a href="{webversion}">View the webversion</a>`

Extra options
-------------

Webversion and linkemail have the same options. However, linkemail
requires you to specify the template and document as well.

#### showheader=false

The frame (with the subject line and sender details) that is displayed
above theweb version can be disabled. Use the showheader=false to remove
this header.

**Example:** `{webversion showheader=false}`

#### document=namedocument

The specified document will be shown rather than the document that has
been sent. Required for linkemail.

**Example:** `{webversion document='newsletter june 2011'}`

#### template=nametemplate

The specified template will be shown instead of the template that has
been sent. The template can only be changed when the document is
provided as well. Required for linkemail.

**Example:** `{webversion document='newsletter'}`

**Example:**
`{linkemail template='newsletter' document='newsletter june 2011'}`

#### domain=yourdomain.com

The domain replaces the default pic-server domain. If used as...

`{webversion domain='newsletter.yourcompany.com'}`

... the link will be:

http://newsletter.yourcompany.com/w/.... instead of
http://vicinity.picsrv.net/w/....

To use a custom domain you have to create a CNAME alias in your domain
DNS pointing to the subdomain vicinity.picsrv.net.

**Example:** `{webversion domain='newsletter.yourcompany.com'}`
