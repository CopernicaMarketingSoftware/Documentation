# Campaign tutorial: Profile enrichment

Profiles can be enriched with information you gather from your mailings. 
What links a user views and what purchases they make can indicate what 
they might like to buy in the future, for example. With a clever 
[selection](./selections-introduction) you can use this information to 
make target groups and send them different, more targeted, emails. You 
can also choose to personalize the email directly, for example by using 
different content blocks for different interests.

In this tutorial we show you how to use follow-ups to enrich your profiles 
with both clicks and orders. You can also find the JSON code for the follow-ups 
from this tutorial in [this article](./campaign-tutorial-profile-enrichment-json) 
so you can import it yourself.

## Information from clicks

Follow-ups can also be used to keep track of which links people clicked. 
If you (want to) do this often we recommend storing all clicks in a [collection](./database-fields-and-collections), 
but you can also store it in a regular profile field if you like.

### Collection

To store clicks we need a collection first. You'll want to create a collection 
in the database you will be emailing to and name it something descriptive such 
as "Clicks". Add the fields you need; We recommend using 
the name of the link and the url. There is no option to add the time of 
clicking yet.

Now we can create the follow-up:

* Create or open a template.
* Open the "Follow-ups" menu under **Tools**.
* Create a new follow-up and select "Link click" as the trigger. You can now 
choose the link you want to make a follow-up for. You can also select "Any link" 
so you can save clicks on a template.
* Add a "Create subprofile" box and click on "edit".
* Select your database and the collection you just made.
* Enter a descriptive name for the "name" field and the url in the "url" 
field.

Now a new subprofile will be made in the collection "Clicks" every time 
a user clicks your URL. You can add follow-ups faster by clicking the 
"Follow-up" tab when your link is selected.

### Profile field

If you don't plan on saving link clicks often you can also store some 
data in the profile itself. You can use this to have users subscribe to 
your newsletter, for example. To do this we'll add a field named "subscribed" 
to the profile.

Now we can create the follow-up:

* Create or open a template.
* Open the "Follow-ups" menu under **Tools**.
* Create a new follow-up and select "Link click" as the trigger. You can now 
choose the link you want to make a follow-up for. You can also select "Any link" 
so you can save clicks on a template.
* Add an "Update destination" box and click on "edit".
* Select "field" and enter the name of the field you want to update. In 
this case we use "subscribed".
* Add a new value for the field and save the follow-up. In this case we use the value "yes".

Now the "subscribed" field will be set to "yes" every time 
a user clicks your URL. You can set a target in the follow-up menu 
to get suggestions for the field names, making editing easier. You can also 
add follow-ups faster by clicking the "Follow-up" tab when your link is selected.

## Information from orders

With [collections](./database-fields-and-collections) you can easily 
store purchases made by your customers. We recommend using an 
[integration](https://www.copernica.com/en/integrations) with your webshop 
for this to fully automate the process. Your purchases will now be registered 
as subprofiles in the collection. Make sure you create fields for all the 
information you want to save about an order.

Now we want to create the follow-up for this collection:

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
customers in selections and personalize emails just for them.

* [Follow-ups in Marketing Suite](follow-up-manager-ms)
* [Selections](./selections-introduction)
* [Collections](./database-fields-and-collections)
* [Personalization](./personalization)
