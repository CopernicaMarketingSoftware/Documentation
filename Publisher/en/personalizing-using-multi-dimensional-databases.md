If you want to add extra information to
[profiles](http://www.copernica.com/en/features/profiles), items
customers someone purchased in a webshop for example, the best way to do
so is by using a [multi-dimensional
database](http://www.copernica.com/en/features/profiles/creating-your-own-databases).
That’s why in Copernica, profile information does not necessarily has to
be stored in a flat structure (name, email address, place of residence
for example) but can also be stored multidimensional.

In the past, this was only possible by creating a collection (containing
data or subprofiles) connected to a profile. Now you also have the
option to connect information from various databases to each other,
making the, according to a lot of users difficult to use, collections
obsolete. In emailings you can now also personalize, based on the
information in different databases.

How does it work?
-----------------

Let’s say you want to create a database with companies, and also want to
store information about the employees that work at these businesses. In
the personalization in emailings, you want to use company names as well
as employee names. The possibilities are of course endless, it could
also be about items your customers purchased in a web store for
instance, but for this tutorial we’ll stick to the example of companies
and their employees.

-   A database with *Companies*, containing the name of each company.
-   A database with *Employees*, where you store every employee’s name
    and email address

How do you set up such a database
---------------------------------

If you want to store which employees a company has, you don’t create an
additional field in the *Companies* database, but by adding an extra
field in the database *Employees.*Using Copernica, you can create a
reference field in the database *Employees* that refers to the database
*Companies*.\
 \
 In short: in the database *Companies* you have two fields: *ID* and
*Company name,*and in the database *Employees* you’ll have three fields:
*ID, Name*and a reference field *Employer* that refers to the database
*Companies*. This allows you to fill your database with the following
information:

### Database *Companies*

ID 1, company name: Initech\
 ID 2, company name: Intertrode

### Database *Employees*

ID 1, name: Milton Waddams, employer: 1\
 ID 2, name: Peter Gibbons, employer: 1\
 ID 3, name: Michael Bolton, employer: 2

Because when creating the database, *Employer* has been set as a
reference field, the software now knows that Milton and Peter work at
Initech, and Michael at Intertrode.

Personalizing
-------------

How can you use this information to personalize? Let’s say you want to
send an emailing to all employees. In the emailing you want to
personalize based on the employee’s name, and the company they work for.

*Dear {\$name|escape},*\
\
 *According to our data you work for {\$employer.companyname|escape}*.

In the example above we’ve used a short notation, but you could also
personalize with {\$profile.name} and {\$profile.employer.companyname}.
Either way, it’s easy to use. Because *employer* is marked as a referrer
field, all profile information that’s been referred to, is loaded into
the variable. The database *Companies* only has one field:
*companyname*. In a live environment however, this is of course a lot
more extensive.

One step further
----------------

Let’s take it one step further. In the next example we’ll send an
emailing to all companies (which, of course, compels us to add an email
address field to the company information), summing up all employees that
work for this company. To be able to retrieve what other databases and
profiles refer to a company, every profile also has a standard referrer
field. In this field you can request all referring profiles:

*Mailing to company {\$companyname|escape},*

*These are your employees:*\
 *{foreach \$referrers.employees as \$employees}*\
 *    {\$employee.name|escape}*\
 *{/foreach}*

Once again we’ve used the short notation. We could’ve also used
{\$profile.companyname} and {\$profile.referrers.employees}. The
variable {\$profile.companyname} contains all databases that refer to
the profile, and by using {\$profile.referrers.*databasename*} you are
able to iterate through these referring profiles.

Another step further
--------------------

The next challenge: in this example we want to send an emailing to all
employees, and tell them once again which company they work for, but
also include a list of their co-workers.

    Dear {$name|escape},
    According to our information you work for {$employer.companyname|escape}.
    {if $employer.referrers.employees|count > 1}
        And these are your co-workers:
        {foreach from=$employer.referrers.employees item=coworker}
            {if $coworker.id != $id}
                {$coworker.name|escape}
            {/if}
        {/foreach}
     {/if}
     

It starts off easy: we send an emailing to the database *Employees,* so
the variable {\$name} contains the name of the employee. The variable
{\$employer} is quite simple as well, it’s a field that refers to the
profile from the company database, from which the company name can be
requested: {\$employer.companyname}. If we want to know what profile
from the database *Employees* refer to a that company (or in other
words: which employees work for that company), we can request this
information with the referrers variable:
{\$employer.referrers.employees}.

### {if} statements

In the example above, you’ll also see two {if} statements. These are
used to make sure we only sum up the employee’s co-workers and not his
or her own name. The first {if} statement is used to check if a company
has more than one employee. Should a company only have one employee,
this automatically has to be the person the emailing is sent to, and the
sentence “these are your co-workers” becomes obsolete.

Within the loop of the employees, there is a second {if} statement that
ensures we only sum up the names of co-workers, and not those of the
employees themselves. Whenever we should send this mailing to our
example database, Michael Bolton would receive and email with the text
“According to our information you work for Intertrode”. Milton and Peter
would receive an email stating that they have one co-worker.

Multiple referrer fields
------------------------

Let’s take another step further. In the database *Employees* only one
referrer field was included: the field *employer*. What happens if we
have multiple referrer fields? Not just a field *employer*, but also the
field *former\_employer* for example that also refers to the database
*Companies*? In a mailing to employees of course you can just use both
fields, by using {\$employer.companyname} and
{\$former\_employer.companyname}.

But what happens if you use {\$employer.referrer.employees}? The
variable {\$referrers.employees} uses all referrals from the database
*Employees*, no matter which referrer field you use. So we’ll have to
change our next example a bit, because we only want to sum up the
current co-workers. You can do so by stating exactly which referrer
field you want to select from:

    Dear {$name|escape}, According to our information you work for {$employer.companyname|escape}. 
    {if $employer.referrers["employer@employees"]|count > 1}
         And these are your co-workers:
         {foreach from=$employer.referrers["employer@employees"] item=coworker}
             {if $coworker.id != $id}
                 {$coworker.name|escape}
             {/if}
         {/foreach}
    {/if}

It’s that simple. Usually {\$referrers.employees} (or
\$referrers[“employees”], Smarty allows you to write this in various
ways, with a dot notation or with square brackets) contains all
referrals from the database *Employees*. The @ symbol allows you to only
use referrals from a specific referrer field. But because the Smarty
engine has difficulties with @ symbols, you’ll have to place them
between quotes and square brackets.

**Please note:** square brackets are also used to create templates in
Copernica. So if you want to use the personalization above in a
template, you’ll have to replace the square brackets with [ldelim] and
[rdelim]. For personalization within a document, in a text block for
example, you don’t have to worry about this.

Javascript
----------

All variables that are accessible in Smarty, can also be used in
javascript. Use javascript for conditions with follow up actions or in
conditional text blocks. Where in Smarty you can use {\$profile.name},
javascript has the equivalent variable profile.name.

### An overview:

#### Smarty

*{\$profile.name}*

#### Javascript alternative

*profile.name*

#### Smarty

*{\$profile.employer.companyname}*

#### Javascript alternative

*profile.employer.companyname*

#### Smarty

*{foreach \$profile.employer.referrers.employees as \$employee}*\
 *    ...*\
 *{/foreach}*

#### Javascript alternative

*for (var i=0; i\<profile.employer.referrers.employees.length; i++) {*\
 *...*\
 *}*

#### Smarty

*{foreach \$profile.employer.referrers["employer@employees"] as
\$employee}*\
 *    ...*\
 *{/foreach}*

#### Javascript alternative

*for (var i=0;
i\<profile.employer.referrers["employer@employees"].length; i++) {*\
 *...*\
 *}*
