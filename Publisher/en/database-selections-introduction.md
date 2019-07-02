# Database selections
Aside from fields and collections, you are also able to create selections
in a Copernica database. Selections are used to group a set of of profiles in
a database by their commonalities. This grouping allows you to target just
these profiles in a mailing or a follow-up action. A good example of a
selection is the group of people who are subscribed to your newsletter. You
would group this selection based on the value of the opt-in field. As the
content of selections is updated automatically, this selection allows
you to easily mail all profiles which have consented to your mailings without
having to create new lists of receivers every mailing.

Aside from ordinary selections on profiles, it is also possible to create
selections on collections: miniselections.

## Subselections
A subselection is a selection that only filters the profiles in another
selection. For example, if you have a selection of all profiles which have
identified themselves as female you can create a subselection of all profiles
of people under thirty years old. This subselection would then contain all
profiles of women under thirty.

This does not only give you a structured database, it also makes it faster!
As when you use the subselection given in the previous example, Copernica
will often only need to update the subselection and will not have to examine
all profiles in your database.

## Rules and conditions
As mentioned in the introduction, profiles in selections must have
certain properties before they can be added to a selection. These
constraints are detailed in Copernica using selection rules and
conditions. These allow you to filter profiles in many different ways,
such as the birth date of a user or their activity in mailings in a
certain period.

Rules and conditions are not synonymous in Copernica. Rules are composed of
a group of conditions. In other words, an *OR* or *OR NOT* rule can combine
multiple conditions that must all be met. Profiles will enter a selection
when one of the rules is met.

If profiles must meet multiple requirements to enter a selection, you would use
an *OR* rule with *AND* conditions. If profiles must _not_ meet a requirement
to enter a condition, you would use an *OR NOT* rule with *AND* conditions.

Copernica allows you to filter profiles in many different ways. These filters
are called selection conditions. We will discuss the different selection
conditions in the rest of this article.

### Check on field
This is the most common condition. When you use this condition, the contents
of a field in the database is compared with the requirements that are defined.
For example, you can use this condition to check whether a profile is
subscribed to your mailing list by checking if the value of the field
"Newsletter" is set to "yes". By doing this, you filter away any profiles
that are not subscribed to your mailings.

### Check on interest
This condition allows you to filter for profiles that have a certain interest.
For example, you can create interests for certain types of products.

### Check on date
This condition allows you to filter for certain dates. For example, this allows
you to check for an assurance that is about to expire, the date of a sale, or
the date that the profile subscribed to your mailing list. This condition also
allows you to check for a range of dates.

### Check on e-mail/mobile mailing/fax result
This allows you to create a selection based on the result of the campaigns you
have run in the past. For example, this allows you to filter all profiles that
have clicked on a certain link. Be aware of the fact that there are two
different conditions for mailings sent using the Publisher and the Marketing
Suite. For Marketing Suite mailings, you will need to use the condition
'check on marketing-suite email result'.

### Check on double or single profiles
This condition will filter out profiles that occur multiple times in your
database based on the email address. There are multiple options for which
profiles should be excluded from the selection. For example, you can exclude
the profile with the highest or lowest ID.

### Check on change
This condition allows you to filter profiles that have recently changed.
For example, this allows you to search for certain changes in a field or filter
recently created profiles.

### Check content of other selection
This condition allows you to add the requirement that a profile must already
be a part of another selection or that it needs a given number of subprofiles
in a miniselection. Combining your conditions with other selections or
miniselections gives you a lot of flexibility when combining all available
data on your customers. For example, you can use a check on a miniselection
to find all profiles that have bought a certain product.

### Check based on previous export
It is also possible to select all profiles which have been exported in a
certain period.

### Sort and select
You can also select all profiles from a sorted list up to a certain amount.

## Create or modify a (mini-)selection in the Marketing Suite
To create a new selection, click on the **gear** in the top-right corner.
This will give you access to the options menu. Here you will need to click
on the option **Create selection**. You will then be prompted to name the
selection and add rules and conditions

If you would like to edit the selection, you will need to return to the options
menu where you will need to choose the selection on the left-hand side of
the screen. Now the option **Change selection conditions** will be shown,
this allows you to update the selection to your own wishes.

## Create or modify a (mini-)selection in the Publisher
To create a new selection in the Publisher, go to the **Profiles** section.
In the menu **Database Management** click on the option **edit selections...**.
Here you will find the option **Create new selection** at the bottom of the
window. Here you can name the selection and choose its parent with the option
**Under**. When you save this new selection, you will be redirected to the
menu where you can add rules and conditions to the selection. To add a
condition to an existing rule, press the option **Add a new 'AND' condition
to the current 'OR' rule**. To add a new rule, you will need the option
**Add a new 'AND' condition to a new 'OR' rule**.
