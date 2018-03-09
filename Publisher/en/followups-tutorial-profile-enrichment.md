# Follow-up tutorial: Profile enrichment

Profiles can be enriched with information you gather from your mailings. 
What links a user views and what purchases they make can indicate what 
they might like to buy in the future, for example. With a clever 
[selection](./selections-introduction) you can use this information to 
make target groups and send them different, more targeted, emails. You 
can also choose to personalize the email directly, for example by using 
different content blocks for different interests.

In this tutorial we show you how to use follow-ups to enrich your profiles.

### Information from clicks


### Information from orders

With [collections](./database-fields-and-collections) you can easily 
store purchases made by your customers. We recommend using an 
[integration](https://www.copernica.com/en/integrations) with your webshop 
for this to fully automate the process. Your purchases will now be registered 
as subprofiles in the collection. Make sure you create fields for all the 
information you want to save about an order.

Now we want to create the follow-up for this collection.

* Go to your database and open the "Manage fields" menu.
* Add a new interest group named "Purchases".
* Add all categories used for your webshop items. Watch the spelling!
* Select the collection with orders under **Database & Profiles**.
* Open the follow-up editor.
* Choose the trigger "Subprofile created", since this means a new order.
* Enable the advanced mode and grab a Javascript execution box
* Edit it with the following code:

`profile.interests[subprofile.fields.category] = true;`

In this code `subprofile.fields.category` refers to the category field of 
the subprofile. If you named your field something different you should replace 
"category" with the name you used. The `profile.interests[]` refers to the 
interest we are going to change. You can also turn off interests in your 
code by replacing "true" with "false".

Now you can create a new subprofile and see if it works. If your follow-up 
works correctly the category of each new purchase will now be added to the 
interests of your customer.

## More information

Now that you have information about your customers it's important to use 
it well. The articles below can give you some ideas on how to group your 
customers and personalize emails just for them.

* [Selections](./selections-introduction)
* [Collections](./database-fields-and-collections)
* [Personalization](./personalization)
