# Campaign Tutorial: Repeat purchases

Purchases offer the opportunity for new purchases! If you know the lifespan 
of your products you can easily use this to encourage repeat purchases. 
In this tutorial we'll show you how to set up such a campaign.

## Identifying possibilities

To identify possibilities we'll be looking at their order history. 
With [collections](./database-fields-and-collections) you can easily 
store purchases made by your customers. We recommend using an 
[integration](https://www.copernica.com/en/integrations) with your webshop 
for this to fully automate the process. You also need to save the date of 
the purchase in the collection. If you have an email address for each 
order that makes things easier, but this is not required.

Let's say we have two phone brands A and B. We know brand A usually lasts 
a customer 2 years, while brand B only lasts 1,5 years. We also know customers 
from both brands are very loyal and unlikely to switch. 

### With e-mail address in collection

First we create a list of people who need a new phone A and a list of people 
who need a new phone B:

* Make a new miniselection "NewPhoneA".
* Add a new "AND" condition and set it to "Check on date or period".
* Select the field with the purchase date.
* Set the "before" and "after" dates to 24 months ago.
* Save the miniselection and rebuild to make sure it works as expected.
* Do the same for a new miniselection "NewPhoneB" with 18 months. By making 
separate miniselections we promote the phone they most likely want when 
they most likely need it.

### Without email address in collection

Without an email address in the collection we need to save data to a 
profile so we can email it. We copy the data with a follow-up:

* Create two fields "last_phone_a" and "last_phone_b" in your database.
* Select the collection with your orders and open the follow-up manager.
* Create follow-up with the trigger "Subprofile created". 
* Add a Javascript execution box from the advanced editor and add the following code:
```Javascript
if (subprofile.fields.category == "phones A") profile.fields.last_phone_a = subprofile.fields.purchase_date;
else if (subprofile.fields.category == "phones B") profile.fields.last_phone_b = subprofile.fields.purchase_date;
```
* Save the follow-up.

Every time a subprofile is created for a new order we look at the category. 
If the category is phones from A or B the date is saved to a field in the profile. 
Now we can make two [selections](./selections-introduction) to email the customers 
when they need a new phone:

* Open the database and make a new selection. Name it something descriptive 
like "NewPhoneA".
* Add a new "AND" condition to the rule and select "Check on date or 
period"
* Select the field with the last purchase date for an A phone.
* Set the "before" and "after" dates to 24 months ago.
* Rebuild the selection to test if it works.
* Make the same selection for "NewPhoneB" but with 18 months instead.

## Encouraging a repeat purchase

Now you can simply create a template for each phone and schedule daily 
mailings for each of them. They will only receive this email once and 
disappear from the selection after.

## More information

Want more information on follow-ups or selections? Want some information 
on personalization to make your repeat purchase emails more alluring? 
The links below will help you find your way.

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Selections](./selections-introduction.md)
* [Personalization](./personalization)
* [Campaign Tutorial: Profile enrichment](./campaign-tutorial-profile-enrichment)
