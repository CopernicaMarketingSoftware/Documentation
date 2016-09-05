The account settings are for the entire account, and can only be edited
by the administrator of the account. Besides the possibility of changing
the description of the account, you will find a few other settings that
are further explained below.

#### Lay-out

If you are a reseller (white label), you are able to edit the
application lay-out. This layout is automatically adapted by the
underlying accounts. It is also possible to change the lay-out of
individual accounts.

Existing lay-outs can be edited from the *Lay-out*menu under *Admin*.

#### Give all users all rights

Use this setting to grant all users under the account full access to all
databases and documents within the account. This will overrule the
general settings where each user's rights are determined per
database/selection/template/document.

Note: This setting doesn't make users account admins. This is set
seperately.

#### Account removal

An account that is no longer in use can be removed. Depending on the
license type, an account may be removed immediately, or the account will
remain active until the expiry of the license.

A removal can always be undone.

> #### Users can contact Copernica BV directly
>
> Resellers use this option to indicate whether the users within their
> accounts are allowed to directly contact the manufacturer of the
> software.
>
> #### Users are allowed to contact Copernica partners directly
>
> Resellers use this option to indicate whether the users within their
> accounts are allowed to directly contact partners from the Copernica
> partner network.

#### IP removal settings

The marketing software registers the IP address of users at certain
times. For example, when users open an e-mail or when they click on a
link in an e-mail, their IP address is stored in the database. The IP
addresses are then used to show the estimated locations of the users on
a map in the statistics. Unfortunately, the rules and regulations for
storing this private data are not the same in every country. In some
countries it is not allowed to store this data at all or it is only
allowed to store this data for a short period of time, after which it
should be removed. See also this article about [data
retention](http://en.wikipedia.org/wiki/Telecommunications_data_retention).

To prevent possible privacy issues regarding these rules and
regulations, we made it possible to specify how the application should
handle this private data. The following settings can be specified for
the application and accounts:

-   The IP address and estimated location can be stored and never
    removed (like it is now, this is the default setting)
-   It can be removed immediately and not stored anymore for new user
    events
-   It can be stored, but removed after a short period of time (a week
    or a month, for example)

This setting can be changed at application level and at account level in
the admin section. By default, the accounts inherit the application
setting, which in turn has a default setting to never remove the data.

When selecting to remove the data after a specific period, the **data
older than this period will be removed instantly**! When the data is
removed it **cannot** be recovered!
