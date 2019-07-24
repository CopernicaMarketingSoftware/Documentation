# Database management
A clean database increases your deliverability and will have a positive
effect on your email marketing results. But what do we mean with a clean
database? For example, reducing your traffic to people who do not open
your email or addresses that do not exist has a negative impact on your
sending reputation.

Copernica's customers are free to organise their database in whatever
way suits them, however we also offer a standard structure for selections
that many of our customers use.

This structure consists of two main selections **A_DatabaseManagement** and
**B_SendSelection**. We describe their purpose below.

```
- A_Databasemanagement
    - A_Bounces
    - B_WrongEmailSyntax
    - C_Complaints
    - D_DoubleAddress
    - E_Unsubscribes
    - F_Inactive
- B_MailingList
    - Campaigns
```

## A_Databasemanagement
This selection contains every profile in the database and solely exists to
structure your selections. The selections contained in A_Databasemanagement
are the ones that we do not want to email, which will be discussed in the
following paragraph.

It contains one rule with one condition. It has also be disabled so that
no profiles will be excluded under any circumstance.

### A_Bounces
Contains all profiles that have returned at least one hard bounce
or a set amount of soft bounces. A hard bounce is the kind of error
that will always occur, such as an email address being invalid. For a soft
bounce it is not guaranteed that it will return on a second email, such as
an email taking too long to be delivered to the address. The amount of
soft bounces necessary to be added to this selection is different per
database, based on how often emailings are sent using it. A database that
is used daily should have a higher threshold than one that is only
used weekly.

This selection contains four rules, each with two conditions. The first rule
is met when there have been at least 2 hard bounces since 2000 and no errors
have occurred in the past seven days. This prevents profiles from
accidentally being added to this selection. The second rule has similar
conditions, but these are set up for soft bounces. The last two rules are
identical, but check for hard and soft bounces in mailings sent using the
Marketing Suite instead of the Publisher.

Want to learn more about email bounces and how to interpret them?
Read more about this topic in
[our article](https://www.copernica.com/en/documentation/bounces) on bounces.

### B_WrongEmailSyntax
This selection contains all profiles where the value of the field that has
been specified as containing this profile's email address cannot be an email
address. For example, when the field does not contain an '@' sign.

The selection contains one rule with one condition. The condition checks
if the email address field contains a correct email address and is then
reversed by setting the rule to **OR NOT** therefore _excluding_ all genuine
addresses.

### C_Complaints
This selection contains all profiles that have registered an abuse complaint.
This is the complaint that is given when a profile reports an email as spam.

This selection contains two rules, each with one condition. The first rule
is met when more than 0 abuse complaints have been reported since January 1st
2000. The second rule does the same, but for mailings sent using the Marketing
Suite.

### D_DoubleAddress
This selection contains all profiles whose email address is also used in an
older profile.

This selection contains one rule with one condition. The condition identifies
doubles by checking if the email address is used in other profiles. If the
email address is not unique in your database, you will need to change the setup
of your database to accomodate this selection.

### E_Unsubscribes
This selection contains all profiles which have opted out of receiving
emails from your account.

This selection contains one rule with only one condition. This condition
checks if the opt-in field is set to the value 'No'. If you use a different
field to track your subscription, you will need to modify this
selection. The opt-in field can be added automatically when creating the
default selections.

### F_inactive
This selection contains all profiles which are inactive. A profile is inactive
when it has not responded to your past few mailings by not opening your emails
or not clicking on links. This generally indicates that the profile is not
interested in your mailings. Your sender reputation will suffer if you
continue sending to these profiles.

This selection contains one rule with three conditions. The first condition
is met when the profile is older than thirty days; New profiles tend to be
inactive for a short while and therefore need to be excluded from this
selection. The second condition checks if no impression or click has been
registered for this profile in the past 180 days. The third rule is identical
to the second, but instead of reviewing mailings sent using the Publisher,
it looks at those sent using the Marketing Suite.

## B_MailingList
This selection can be used to send mass mailings to profiles that will not
harm your sender reputation. All the subselections under A_DatabaseManagement
are profiles which will harm your sender reputation or you are not legally
allowed to email. You can also use this selection to create subselections
for more specific targeting of your mailings.

The selection contains one rule with six conditions. Each of these conditions
excludes profiles which are a member of the previously mentioned subselections.

## Creating the standard selections
You can only automatically generate this database structure using the
Publisher. However, as the Marketing Suite and the Publihser use the same
databases, this will not cause any issues. Go to the **Profiles** section
and then select **Database management > create default selections...** from
the dropdown menu. Here you can select the language of the selection names
and select if you would like us to add a new field to track unsubscription.
