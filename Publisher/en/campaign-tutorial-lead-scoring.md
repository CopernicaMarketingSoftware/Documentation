# Campaign tutorial: Lead scoring

Lead scoring is a process where points are assigned to determine how promising 
a lead is. A score is kept per lead, or per profile in the database. 
With follow-ups you can add or subtract points for everything that triggers a 
follow-up like link clicks, unsubscribes, (sub)profile creations, (sub)profile 
modifications, or subprofile removals. 

Which triggers you use and the amount of points you give or subtract are 
completely up to you. This tutorial simply shows you how to keep the score. 

## Creating and updating the lead score

### Creation

First select the database in which your leads are kept. Add a numeric 
field to keep score in and set the default value to 0. You can now start 
keeping track of your leads.

### Updating

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

### Taking action

If your lead score is high enough you'll want to take action. We recommend 
making a handy [selection](./selections-introduction) to view the most 
promising leads with ease. This makes it easy for your sales department 
to get started and contact all promising leads. When you do this you should 
consider keeping track of which leads have already been contacted.

This is how to do it:
* Create a field named "lead_contacted" in the database. Set the 
default value to "no". 
* Make a new selection "NewLeads".
* Go to the selection rules and add a condition "Check on field value". 
* Select "lead_contacted", "not equal to" and add "no" to the value to 
prevent from contacting people multiple times.
* Add a new condition "Check on field value". 
* Select the leadscore, "is greater than" and set the minimal score a lead should have.
* Save the selection and test it.

Now you're ready to contact your leads! You can also do this with an 
automatical email, but always make sure "lead_contacted" is updated 
accordingly.

## More information

Want more information on follow-ups? Want to know how to get more information 
about your customers? 
The links below will help you find your way.

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Personalization](./personalization)
* [Profile enrichment tutorial](./campaign-tutorial-profile-enrichment)
