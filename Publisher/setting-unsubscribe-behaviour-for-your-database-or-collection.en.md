The unsubscribe behaviour is a setting for the **database** and
or **collection** to let the application know how to handle unsubscribe
requests. We ask you to specify the unsubscribe behaviour for each
database/collection you target mailings to. \
\
This function is found under *Profiles \> Database management \> Set
unsubscribe options*

The behaviour can be executed by various causes. The behaviour is for
instance executed when a subscriber marks your mail as spam in Hotmail
(and a few other e-mail clients). Setting the unsubscribe options also
activates the {unsubscribe} tag in your email.

This makes it easier for your contacts to unsubscribe from your list,
and it is less likely that your mails get trapped in spam filters.

Setting the unsubscribe behaviour
---------------------------------

To configure the unsubscribe behaviour

-   First select the database or collection to which you want to apply
    the settings
-   then go to *Database management*\> *Set unsubscribe options*.

Choose a response:

-   **Do nothing**: nothing changes. The recipient remains subscribed to
    your mailings.
-   **Remove the (sub)profile from the database**: remove the recipients
    entire profile or subprofile.
-   **Update the profile**: change a field value, such
    as *newsletter* from 'yes' to 'no'.

![unsubscribe
behaviour.png](images/dialog_unsubscribe_options.png)

Once you have finished configuring the unsubscribe options, you will be
asked if these new settings should also be applied to past spam
complaints and unsubscribe requests. Check the box and click the 'apply'
button to do so.

The unsubscribe behaviour only works with emails in which the
*list\_unsubscribe header*is included. Emails sent with copernica
automatically have the unsubscribe header, unless you have indicated
otherwise at the template or document.

The unsubscribe link
--------------------

Copernica offers various ways to handle unsubscribes. The most easy way
is the {unsubscribe} tag. When it's clicked in your email, the database
unsubscribe behaviour will take into effect for this profile. The
unsubscribe tag is easily added to your template or document.

\<a href="**{unsubscribe}**"\>Click here to unsubscribe\</a\>.

Having more than one database?
------------------------------

The unsubscribe options have to be set separately for each database and
collection you target mailings to. When copying a database or a
collection, the unsubscribe options are \_not\_ copied along.

Unsubscribe options not set
---------------------------

If you target a mailing to a database or collection without unsubscibe
option, you will be prompted during the setup of the mailing.
