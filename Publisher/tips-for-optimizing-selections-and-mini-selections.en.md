In Copernica you use selections to distinguish data in your database(s).
Selections are active filters on your data (profiles), and the filter
criteria you can choose from are as numerous as the trees in an evil
dark Norwegian forest. One selection is heavier than the other and a
clever design of your database can make searching your profile
information significant faster.

In this article we give some tips to increase the performance of your
database and selections. Let's start with maybe the most important tip.

### Remove selections that you never use

Your selections are updated several times a day. Also when a profile is
added or modified, the system will look in which selections the profile
belongs. You will understand, the more selections there are, the longer
it eventually takes to update all selections. For this reason, it is
better to delete selections that you never use.

In Copernica can also archive your selections. Archived selections are
still regularly updated and archiving selections therefore does not
provide any performance gains.

### Disable selection conditions that you seldom use

Selection conditions can be disabled. Conditions that you (temporarily)
disable, do not need to be re-built every day.

Unfortunately it is not yet possible to disable a whole selection at
once.

### Remove databases that you never use

Some users create a new database every week to send their newsletter, or
even a press release to a small audience. Although we advise against
this way of working (better organize everything in a single database or
a few databases) we prohibit it either. If you really want to use a new
database for each mailing, remove them after a while. Removing a
database won't affect the statistics of your mailings. They will remain
available.

As with selections, it is better to remove the good old database, than
just archiving it.

### Remove superfluous conditions

Remove the selection conditions that you don't need to reach your goal.
The more is searched, the longer it takes to update the selection.

### Index your fields, but use it smart

An indexed field is searched smarter for the requested information.
Typically, a database column is searched from A to Z. In indexed fields
however it is more quickly determined where information is stored,
making the search faster.

It is best practise to only index the fields that you regularly use in
important selections. Creating too many index fields will delay the
database as a whole.

-   If you have a sort and select condition, index the field for the
    column you are sorting on.
-   Field indexes gain the most benefit in field conditions (value in
    field X is equal to Y).\

You can find the the option to index a field at the properties of the
database field.

### First do light work, then the heavy

One selection is not the other. A selection that searches a numeric
field is much more lightweight than a selection that looks for profiles
that have clicked in any mailing in a given period of time. If your
selection has multiple conditions it could be a good idea to work with
subselections. Allowing you to decrease the number profiles to be
searched in the heavy query.

Suppose you have a database with 100,000 profiles. You want to make a
selection of active customers born in the year 1980 AND at least
registered 3 impressions in the past year.

You could first make a selection to find all profiles all profiles born
in 1980.

Under this selection you make a subselection, so only the profiles that
meet the parent selection are searched on the impressions registered.
This heavy query is then executed on maybe a few thousand profiles,
instead of 100,000.

Easy to perform selection conditions are:

-   simple searches such as "Value in field X is equal to Y '
-   check on interests
-   date conditions on date fields

Heavy selection conditions are:

-   sort or select profiles
-   check on results campaigns
-   check for changes in the profile
-   check for duplicate or unique profiles

### Are you grouping selections with an empty parent selection?

Many users use parent selections with the purpose of grouping
subselections. Its sole purpose is to create a better overview of
selections. All fine, but if you use this stategy, do not use an active
selection rule such as '*the value in the ID field must be greater than
1*', because this will slow down the selection and its subselections as
a whole.

Alternatively, you can make a single selection condition, and disable
the condition (this option can be found at the condition). Now all
profiles match automatically and no search will take place.

### Make sure you do not have duplicate conditions

We sometimes see that users add the same conditions in each
subselection. This is wasted effort on an epic scale. Remove those
duplicate conditions.

### Use the appropriate field types

If you have the same kind of data in a column, use the field format that
matches its content best.

For instance store numeric data ​​in a numeric field. Where possible,
limit the number of allowed characters in a text field. You won't need
256 characters to store a city, company name or postal code.

Are you storing dates? Then use date fields. Date conditions are faster
(and more reliable) when performed on dates in a date field.

### Selections with references

Refer only to other selections if not possible otherwise. If a selection
is dependent on 10 other selections, 10 selections must first be updated
prior to the actual selection. Of course joining selections sometimes is
necessary and makes it easier to manage your database, but if it can be
solved in a different way (without references), do it that way.

### Selections based on e-mail campaigns

This is by far the most heavy condition type available. The condition is
often used to filter profiles with delivery errors. Great to have that
information, but it terribly slows down your database performance as a
whole. If you're suffering slow rebuilds, you might consider using
another implementation:

#### Register delivery errors using document follow ups

Use document follow-ups to register delivery errors. When a delivery
error occurred at the profile, a follow-up could change the state of a
profile field (for instance count a numeric value). This allows you to
later filter these erroneous addresses from your active mailing list
using a simple field condition.

Admittedly, it is not ideal (document follow-up actions cannot be copied
to other documents), but your selections will become a lot faster. Which
was exactly the goal of this article :)
