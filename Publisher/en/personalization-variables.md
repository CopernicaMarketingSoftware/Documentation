# Personalization variables

You normally personalize your mailings in the Publisher using the profile data
of the addressee. All database fields are directly usable as personalization 
variables. If a database contains the fields *firstname*, *lastname*, *city* 
and *email*, you can use the same variables for personalization:

* {$profile.firstname}
* {$profile.lastname}
* {$profile.city}
* {$profile.email}

You can either use this variables directly, or you can use them as member
of one of the predefined objects {$profile.firstname}, {$subprofile.status} 
and {$destination}

## Mailings to profiles

Copernica supports multidimensional layered databases, which means that you can
send mailings to profiles (the records stored in the database) or to subprofiles
(the records one level deeper). This layered structure has its impact on the available 
personalization variables: if you send a mailing to subprofiles you can include
both profile data as well as subprofile data in the documents.

But whether you're sending a mailing to profiles or to subprofiles, you always 
have access to a {$profile} variable that holds an object with all personalization
data of the profile. This {$profile} variables holds the profile to which the mail 
is sent, or, for mailings to subprofiles, the profile to which the subprofile
addressee belongs. The {$profile} object has a number of properties:

* **{$profile.id}**: numeric identifier of the profile
* **{$profile.extra}**: the extra profile data that is accessible through the API
* **{$profile.secret}**: the *secret code* that is stored for this profile
* **{$profile.code}**: alias for {$profile.secret}, the secret code
* **{$profile.created}**: time when the profile was created (in YYYY-MM-DD hh:mm:ss format)
* **{$profile.referrers}**: optional array of profiles that refer to this profile using a *foreign key* field
* **{$profile.*fieldname*}**: every profile field is accessible through {$profile.*fieldname*}
* **{$profile.*interest*}**: every profile interest is accessible through {$profile.*interest*}, and has the value "yes" or "no"
* **{$profile.database.id}**: the id of the database to which this profile belongs
* **{$profile.database.name}**: the name of the database to which this profile belongs
* **{$profile.*collection*}**: when a profile has subprofiles, each collection of subprofiles is accessible through {$profile.*collectionname*}

Simple personalizations like {$firstname} and {$lastname} can thus also be written
as {$profile.firstname} and {$profile.lastname}.

## Mailings to subprofiles

If you send a mailing to subprofiles, you of course still have access to the 
mentioned {$profile} object. But you can then also use the {$subprofile} variable.
This is an object holding the subprofile to which the mailing is sent, with
the following properties:

* **{$subprofile.id}**: numeric identifier of the subprofile
* **{$subprofile.secret}**: the *secret code* that is stored for this subprofile
* **{$subprofile.code}**: alias for {$subprofile.secret}, the secret code
* **{$subprofile.created}**: time when the subprofile was created (in YYYY-MM-DD hh:mm:ss format)
* **{$subprofile.profile}**: the profile object (see above) to which this subprofile belongs
* **{$subprofile.*fieldname*}**: every subprofile field is accessible through {$subprofile.*fieldname*}

If you do not yet know whether the template or document that you're working with
will be used for a profile or a subprofile mailing, and you therefore also do not
know if you should use the {$profile} or {$subprofile} variable, you can make use
of the {$destination} variable. This {$destination} variable is an alias for
{$profile} in mailings that are sent to profiles, and for {$subprofile} for
subprofile mailings.

## Iterating over subprofiles

All the subprofiles that are linked to a profile are accessible through the
{$profile.*collectionname*} variable, and you can *iterate* over these subprofiles
and use the subprofile data for personalizing your message too. If, for example,
you are the owner of a pet shop and you have a database with information about
your customers, with collections for the cats and dogs that your customers have,
you can make personalizations like this:

    Dear {$profile.firstname},
    
    According to our database, you have {$profile.cats|count} cats and
    {$profile.dogs|count} dogs. 
    
    According to our system, you have the following pets:
    
    {foreach from=$profile.cats item=cat}
        {$cat.name} (cat)
    {/foreach}
    {foreach from=$profile.dogs item=dog}
        {$dog.name} (dog)
    {/foreach}

The simple example above is a good indication how powerful the personalization 
features are. You can use all profile and subprofile data in your email to 
personalize your message. With a little inspiration and cleverness you can use
this to make great campaigns.

## Foreign key fields

But you can achieve even more. As you might know, databases support *foreign
key* fields. A foreign key field is a numeric field that holds the ID of a profile
from the same or even from a different database. Foreign key fields allow you
to create full relational models that can be used for your personalized campaigns.

Let's continue with the simple example that we started with. Your customer
database now also contains a foreign key field *veterinarian* that refers to a 
profile in a database holding all known veterinarians. You can use this field
to include extra information in your campaigns:

    Dear {$profile.firstname},
    
    According to our database, your veterinarian is {$profile.veterinarian.name}.
 
Copernica automatically recognizes that *veterination* is a foreign key field, and
looks up the veterinarian profile that the field refers to. All fields of this 
other profile are automatically assigned to the {$profile.veterinarian} variable. In 
fact, the {$profile.veterinarian} is a regular profile object, just like {$profile},
and also contains collections and foreign keys, so you could endlessly link profiles
to other profiles and use that for personalization.

The other way around is possible too. You could send a mailing to all veterinarians,
and refer to the customers of each vet. The {$profile.referrers} variable can be
used for this. De variable {$profile.referrers.customers} holds all profiles from
database "customers" that refer to the veterinarian profile. You could even explicitly
name the referring field, which is useful if a database contains multiple foreign
key fields: {$profile.referrers.veterinarian@customers}.

## Accounts and mailings

Besides the {$profile} and {$subprofile} objects, you can also use the {$account}
and {$mailing} objects. These are objects holding information about your account
and about the mailing that is being personalized. The {$account} object holds
the following members:

* **{$account.id}**: numeric identifier of the account
* **{$account.name}**: name of the account

The {$mailing} object has more properties, en contains some mailing settings:

* **{$mailing.sendtime}**: time when mailing is sent, in YYYY-MM-DD hh:mm:ss format
* **{$mailing.sendtimestamp}**: same as the *sendtime* property, but holding a unix timestamp (number of seconds since 1 jan 1970)
* **{$mailing.trigger}**: optional object that triggered the mailing
* **{$mailing.snapshot.name}**: name of the document that is used for the mailing
* **{$mailing.snapshot.created}**: time when a snapshot of the document was created (YYYY-MM-DD hh:mm::ss format)
* **{$mailing.snapshot.subject}**: mailing subject line

## Integrations

You can use information from your integration in smarty. The available variables depend on the integration that you use.
You can use the nickname of your integration as the variable name:

    {$integrationNickname}

For a full list of available variables for your integration see [Integration properties](./personalization-integration-variables).

## Extra personalization variables

When you're editing a template, you can add extra personalization variables.
These variables can be set for documents to influence the template. These extra 
personalization variables are accessible via their name after assignment: 

    {$variable}

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Personalization modifier](./personalization-modifiers)
