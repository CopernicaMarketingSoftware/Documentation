A good and well-organized database structure is very important for
obvious reasons. To add structure to your data in Copernica, you use
selections. New accounts are prefilled by us with a demo database that
includes the most common selections.

You are totally free to add, edit or remove any of these selections.

**A really quick start:**

-   All databases and selections in your account are displayed in the
    left overview in the **Profiles** section.
-   To see the profiles of a selection, click on its name.
-   All functions related to managing your selections are found in the
    menu **Database management**.
-   To see the conditions of a selection, go to Database management \>
    Edit selections. Then click the selection.

The example database in a newly created account has the following
structure.

-   Demo
    -   Database\_management
        -   A\_Duplicate addresses
        -   B\_Errorneous addresses
        -   C\_No newsletter preference
        -   D\_Hardbounces
        -   E\_Softbounces
        -   Newsletter
        -   Unsubscribed

### Database Demo

This is the actual database. Click on the database to see all profiles
in the database. There are 20 dummy profiles.

### Database\_management

This selection is actually only used to group all the underlying
subselections together. The selection does not have any active
conditions. This way all profiles are automatically included in this
selection. Thus this selection still contains the 20 profiles.

### Selection A\_Duplicate addresses

Duplicate profiles can end up in a database by various causes. Someone
may for example have signed up for the same newsletter twice. Selections
help you find these duplicates. The **Duplicate addresses** selection,
contains all profiles that occur twice in your database, except the
profile with the lowest ID (the profile that was added first).

Find the duplicate addresses in your database by clicking the selection.
As you will see, there are 2 duplicate addresses.

[Read how you create a selection to filter
duplicates](https://www.copernica.com/en/support/how-do-i-remove-duplicate-contacts-profiles)

### Selection B\_Erroneous addresses

Although the presence of faulty email addresses in a database should not
occur if you utilize [double
optin](https://www.copernica.com/en/support/create-a-double-optin-for-new-subscribers),
it does of course not harm to have such a selection for your own
administration.

Erroneous e-mail address are defined as: addresses that are
syntactically incorrect e.g., the @-sign is missing or the address is
missing entirely.

This selection contains only one condition rule: The field 'Email'
contains an email address.

The system will automatically validate all email addresses in your
database. It is not checked whether the address actually exists.

**Important!**\
 To select erroneous, instead of correct profiles you need to invert the
selection condition, by setting the comparison mode of the selection
condition to [OR
NOT](https://www.copernica.com/en/blog/or-and-and-selection-conditions).
In the demo database we already done that for you.

### C\_No newsletter preference

You need someones permission to send him or her commercial emails. This
selection collects profiles whose preference is not known (the
newsletter optin field is empty).

The selection validates whether the field 'Optin' is empty or not.

### D\_Hardbounces

At Copernica we define Hardbounces as an *'error which will most likely
occur again when sending another message'*. For example an email address
does not exist anymore.

The hardbounce selection in our demo database is configured as followes:

If a message was send to a profile twice, and both times it resulted in
a persistent error, include the profile in hardbounce selection.

You are free to alter these settings of course.

-   [Learn how to make a hardbounces
    selection](https://www.copernica.com/en/support/automatically-process-bounces)
-   [Read more about bounce management with
    Copernica](https://www.copernica.com/en/blog/bounce-management-with-copernica)

### E\_Softbounces

Softbounces are temporary errors. The server of the receiving end, can
be temporarily not accessible due to maintenance or interruption.

The softbounce selection is configured the same way as the hardbounce
selection. The only difference it the type of error that occured.

### E\_Softbounces {#e_softbounces}

This is the selection where you finally send a mailing to. To this
selection we added various conditions and for a profile to be included
in the selection, it must meet all conditions. This is accomplished with
[AND
conditions.](https://www.copernica.com/en/support/or-and-and-selection-conditions)

The conditions of the selection are:

> The value in the field *Optin* is equal to **'Yes'**
>
> > AND
>
> Profiles are not in selection **A\_Duplicate addresses**
>
> > AND
>
> Profiles are not in selection **B\_Erroneous addresses**
>
> > AND
>
> Profiles are not in selection **D\_Hardbounces**

### Unubscribed

This is a simple selection to have an overview of all profiles that have
unsubscribed. If this data is further of no use to you, you might want
to empty the selection at regular times to make sure no private data is
at stake.

This process can also be automized in various ways. For instance with
follow-ups or by removing a profile directly after he unsubscribed.

### Finally

You are of course free to add, modify or remove any of the conditions
and selections in this text.

If you have any additional questions or just want to learn more about
segementing your data, please check out our [further
documentation](https://www.copernica.com/en/blog/selections-and-miniselections)
on this subject, or watch our [video
tutorials](https://www.copernica.com/en/support/video-tutorials) to
easily get started.
