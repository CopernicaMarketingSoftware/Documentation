# Click tracking

When you send out an email you are likely interested in getting the best
response from the sent messages. One aspect of of this is figuring out
what in an email attracts users' eyes.

This is something you can do using SMTPeter's click tracking. When click
tracking is enabled, all links in an email are rewritten so that they are
first sent through SMTPeter before being redirected to the original URI.

All these redirections are logged so statistics of all these clicks can
then be seen. We log the time of the click, as well as the link the user
clicked on and the position of the link within the email. This means it
is possible to add the same link to the email in multiple places to see
which one receives more clicks.

## Click tracking domain

When rewriting the links to detect the clicks, we do our best to make the
rewritten link look as much as the original. We leave the path intact, and
only add a small identifier to the end. We also change the domain to one
that leads to us. This domain is clicks.smtpeter.com by default, which
likely does not ring a bell for many of your customers.

For this reason we have made it possible to configure the exact domain that
is used for click tracking. Say you have a domain called 'example.com' you
could set up 'clicks.example.com' as the click domain to use. The following
URI could then be rewritten as follows:

http://www.example.com/path-of-the-uri

Becomes:

http://clicks.example.com/path-of-the-uri-QogGwQIAgQQAg

[Set up your click domain](https://www.smtpeter.com/app/#/admin/click-tracking "Set up your click domain").

## DNS configuration

As mentioned before, the configured domain needs to lead back to the SMTPeter
servers for the logging and redirection to work. The easiest way to do this is
to create a CNAME record pointing towards clicks.smtpeter.com, this way any
changes we might make to the configuration will automatically propagate to
your domain.

The exact way to do this depends on your provider. If in doubt, please contact
them for support.
