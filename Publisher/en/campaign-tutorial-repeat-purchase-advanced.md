# Campaign Tutorial: Repeat purchase campaign with variable wait times

In [this tutorial](./campaign-tutorial-repeat-purchase) we showed you how 
you can encourage repeat purchases from your customers. However, in the ideal 
case the user would be reminded every time they are running out of their 
favourite products. In order to accomplish this we'll take a look at 
how to estimate when someone will need more product and how to let your 
customer know.

Note: This is an advanced tutorial. Having a basic understanding of 
Javascript programming is highly encouraged. If you don't have Javascript 
knowledge please consider working with a 
[Copernica partner](https://www.copernica.com/en/support/partners) 
to create campaigns that fit your needs.

## Example situation

Let's say you work for a pet store. Some items, like bowls and baskets, 
are only bought once or very rarely. However, items like medicine or pet 
food are needed often and well-planned reminders may earn you some 
very loyal customers. In this example we'll be using dog food. We'll 
assume that you have a [collection](./database-fields-and-collections) 
with at least the name, category, quantity and portion size (per day) of the products, 
as well as information in the profile on which animals your customers own.

## Setting up the follow-up

First you should open the follow-up editor and create a new follow-up with 
the trigger "Subprofile created" on your collection with orders.

- Create a new "Check destination" box to check the category of the product 
that was purchases. In this case we only want to continue if the category 
is "dog food".
- Create a Javascript evaluation box. This is where we'll make the actual 
estimate. The comments in the code will explain what is happening in each step.

```Javascript
// Divide the amount of food by the portion size per day to 
// get the total portions in one bag of food
let portions = subprofile.fields.quantity / portion_size;

// Calculate the amount of days the food will last based on 
// the amount of portions and dogs to feed.
let days = portions / profile.fields.no_dogs;

// User should be informed after a week
if (days >= 7 && days < 14) return 'week';

// User should be informed after two weeks
if (days >= 14 && days < 21) return '2 weeks';

// User should be informed after three weeks
if (days >= 21 && days < 28) return '3 weeks';

// If the amount of days is more than 28 we simply 
// remind them after a month
if (days >= 28) return 'month';
```

The Javascript evaluation box will now return a period to email the user 
after. You are free to adapt these, but please keep in mind that delays can 
not be longer than three days. Don't forget to add some outputs for the 
box!
- If you used the exact code above you will now have 4 outputs with different 
delays. Connect the links to delay boxes with the correct delay time.
- Add another evaluation box: After the delay we need to check whether the 
customer already restocked or not. We use the following code:

```Javascript
// Get the collection with orders
let ordersCollection = copernica.collection('Orders');

// Retrieve every order
let orders = profile.subprofile(ordersCollection);

// Set the date of the purchase of this product
let date = new DateTime(subprofile.fields.purchase_date);

// Check all orders
for (let idx = 0; orders.length; ++idx) {
    
    // Get the order by ID
  	let order = orders[idx];
    
    // Stop checking if the order is in the wrong category
    if (order.category != 'dog food') continue;
    
    // Get the date the order was placed on
    let orderDate = new DateTime(order.fields.purchase_date);
    
    // If the food was bought later than this order we return this information
    if (orderDate > date) return 'food rebought';
}

// No new order found; a reminder for new food should be sent
return 'food reminder';
```

Add an output for "food reminder" to create a link. You could add another 
link to calculate the average/preferred time between orders for a user, 
but we recommend doing this in a separate follow-up to keep your follow-ups 
organized.
- Attach a "Send email" box to the "food reminder" link to send the reminder.

Note: The email will only be sent for this product. If you create similar 
follow-ups for other products the user might receive more email than they 
appreciate.

## Preferred order time

It's possible that this customer uses a little bit more or less than the 
average portion size, so you may want to set a re-order time for the customer 
personally.

## More information

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Campaign Tutorial: Repeat Purchases (Set wait time)](./campaign-tutorial-repeat-purchase)



