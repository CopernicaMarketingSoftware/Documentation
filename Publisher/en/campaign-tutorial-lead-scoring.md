# Campaign tutorial: Lead scoring

Lead scoring is a process where points are assigned to determine how promising 
a lead is. A score is kept per lead, or per profile in the database. 
With follow-ups you can add or subtract points for everything that triggers a 
follow-up like link clicks, unsubscribes, (sub)profile creations, (sub)profile 
modifications, or subprofile removals. 

Which triggers you use and the amount of points you give or subtract are 
completely up to you. This tutorial simply shows you how to keep the score. 

## Creating the lead score

First select the database in which your leads are kept. Add a numeric 
field to keep score in and set the default value to 0. You can now start 
keeping track of your leads.

## Updating the score

Updating the lead score is done with follow-ups, which can be added 
for databases, collections, templates and links. Open the follow-up editor 
for any of these and choose the desired trigger. We'll use a Javascript 
execution box from the advanced editor to update the actual score and 
you can add any amount of checks and delays.

Once the rest of your follow-up is done you can edit the Javascript 
execution box. Add the following code:

```Javascript
// add 1 to the score in the profile if a leadscore already exists
if (profile.fields.leadscore) profile.fields.leadscore + = 1;
 
// set the leadscore to 1 if it wasn't defined yet
else profile.fields.leadscore = 1;
```

## Taking action!

If your lead score is high enough you'll want to take action. We recommend 
making a handy [selection](./selections-introduction) to view the most 
promising leads with ease, so your sales department can contact them manually. 
However, you can also send them an automated email, for example to ask 
them to meet with you. We will show you how to do both.

### Sending an automated email

- Go to the database or collection you want to email leads for.
- Create a field named "lead_contacted" in the database. Set the 
default value to "no". 
- Open the follow-up manager and create a follow-up with the trigger 
"(Sub)profile modified".
- Add a "Check destination" box and check the leadscore field to 
see if its value is high enough for your liking.
- Add a match link to another "Check destination" box to check if the "lead_contacted" 
field is set to no; We don't want to send the email multiple times if 
the lead keeps getting warmer.
- Create a match link from the checks to a new "Send email" box to send 
the actual email. Fill in the details for the mailing.
- Create a match link next to it connected to a new "Update destination" box. 
Use it to set "lead_contacted" to "yes" to indicate that we have contacted this lead.

Tip: Add your sales team to the BCC so they also get notified that someone 
is interested.

### Creating a selection based on the lead score

- Create a field named "lead_contacted" in the database. Set the 
default value to "no". 
- Make a new selection "NewLeads".
- Go to the selection rules and add a condition "Check on field value". 
- Select "lead_contacted", "not equal to" and add "no" to the value to 
prevent from contacting people multiple times.
- Add a new condition "Check on field value". 
- Select the leadscore, "is greater than" and set the minimal score a lead should have.
- Save the selection and test it.

## More information

Want more information on follow-ups? Want to know how to get more information 
about your customers? 
The links below will help you find your way.

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Personalization](./personalization)
* [Profile enrichment tutorial](./campaign-tutorial-profile-enrichment)
