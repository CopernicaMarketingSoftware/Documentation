# Campaign Tutorial: Re-activation campaign tutorial

Keeping your customers happy and engaged is very important. Gathering new 
customers is expensive and time consuming, so re-activation campaigns 
can help you maintain your current customer base.

To re-activate inactive customers it's important to identify them first 
and then take action. You can send them a simple email or you can offer 
them something like a discount or free shipping. 

## Identifying inactive customers

To identify inactive customers we'll be looking at their order history. 
With [collections](./database-fields-and-collections) you can easily 
store purchases made by your customers. We recommend using an 
[integration](https://www.copernica.com/en/integrations) with your webshop 
for this to fully automate the process. You also need to save the date of 
the purchase in the collection.

First we want to update the profile every time an order is placed so 
we always have the date of the last purchase available:

* Create a field "last_purchase_date" in your database.
* Select the collection with your orders and open the follow-up manager.
* Create follow-up with the trigger "Subprofile created". 
* Add a Javascript execution box from the advanced editor and add the following code:
`profile.fields.last_purchase_date = subprofile.fields.purchase_date;`
* Save the follow-up.

Every time a subprofile is created for a new order the value of the 
"purchase_date" field will be copied to the profile, so we always have access 
to the date the customer made their last purchase. Now we can make 
a [selection](./selections-introduction) with inactive customers:

* Open the database and make a new selection. Name it something 
descriptive like "Inactive".
* Add a new "AND" condition to the rule and select "Check on date or 
period"
* Select the field with the last purchase date.
* Set the "before" and "after" dates to 1 year ago.
* Rebuild the selection to test if it works.

## Re-activation

Now that you know which customers are inactive it's time to win them 
back. You can send them a simple email telling them you miss them, but 
you can also offer them incentives like a discount or free shipping. 
Make sure your customers know they can unsubscribe whenever they want; 
This may seem counterintuitive but it keeps your mailing list, and therefore 
your reputation, clean. However, do remind them of all the benefits your 
company can offer them!

When you've created the template you can simply set up a daily mailing; 
We've set both dates to 1 year ago so we only email when the last order 
was exactly 1 year ago.

## More information

Want more information on follow-ups or selections? Want some information 
on personalization to make your re-activation emails more alluring? 
The links below will help you find your way.

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Selections](./selections-introduction.md)
* [Personalization](./personalization)
* [Campaign Tutorial: Profile enrichment](./campaign-tutorial-profile-enrichment)
