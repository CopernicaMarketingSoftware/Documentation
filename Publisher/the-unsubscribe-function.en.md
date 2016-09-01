A link must be provided to recipients of your e-mailings through which
they can unsubscribe from your mailings. This can be done in different
ways. One way to provide such an option is the unsubscribe tag.

The {unsubscribe} tag returns a URL that will trigger the database
[unsubscribe
behaviour](./setting-unsubscribe-behaviour-for-your-database-or-collection.en.md)
after it's clicked by the recipient. The tag itself only generates a
(for each recipient unique) URL. To make this URL clickable some HTML
code is also needed.

Copy and paste the following code into your e-mail template or document:

`<a href="{unsubscribe}">Click here to unsubscribe</a>`

Extra options
-------------

**Redirect to your own landingpage and use your own domain:**

By default, someone who clicked on the unsubscribe link will be
redirected to an empty page with the text 'you have been unsubscribed'.
To provide use own landingpage for the unsubscribe link, the redirect
option can be used. 

The redirect option specifies what page is displayed after it's clicked.

This is only a redirect. The domain option will **not** replace the
default picserver domain (http://vicinity.picsrv.net/et cetera) used for
the unsubscribe link.

To replace the default picserver domain, use the *domain* function, as
examplified below. **Important**: the used domain or subdomain must have
a CNAME redirect to *vicinity.picsvr.net* 

**Example**

`{unsubscribe domain='yourdomain.com' redirect='yourcustomlandingpage'} `

The unsubscribe behavior
------------------------

When you make use of the {unsubscribe} link, you must also set the
unsubscribe behavior for the target database or collection. Typical
unsubscribe behavior is 'remove the profile' or to change the value in
field 'newsletter' from 'yes' to 'no'

Go to Profiles \> Database Management \> '[Unsubscribe
options](./setting-unsubscribe-behaviour-for-your-database-or-collection.en.md "Setting the unsubscribe behaviour")'
and tell the system how to handle the unsubscribes.
