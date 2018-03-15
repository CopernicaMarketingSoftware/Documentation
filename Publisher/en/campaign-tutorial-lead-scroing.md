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

## More information

Want more information on follow-ups? Want to know how to get more information 
about your customers? 
The links below will help you find your way.

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Personalization](./personalization)
* [Profile enrichment tutorial](./campaign-tutorial-profile-enrichment)
