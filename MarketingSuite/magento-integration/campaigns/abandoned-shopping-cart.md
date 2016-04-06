# Abandoned shopping card campaign

An online store can have perfect SEO, be heavily advertised and have a firm
customer base, but research states that [2/3 of the cars will become abandoned][research-url].
That's a lot, but there is a way to convert many of such carts into sales.
Sending an email with a simple "Your product is still available", can result
in a significant number of purchases.

To create a mailing list that targets abandoned carts, you can use quote based
mailing list. Such list has `Last modified within` option. This option can be
used to define how much time has to pass since last modification for a cart
to appear on the list. There are two parts of this option: `from` and `to`.
`from` defines the minimum amount of time that has to pass, and `to` defines
the maximum amount of time that has to pass.

So, setting `from` to `3 hours` and `to` to `4 hours` will allow all shopping
carts with last modification time between 3 to 4 hours ago. Make sure that
`Active` option is set to `yes` and `only quotes without orders` is set and
save the list with a name "AbandonedShoppingCarts".

Next step is to create a template that will be used to create actual emailing.
Create a new template and name it "Abandoned shopping cart template". Within
the template insert a text block with the following content: 

```
Hi there! 
You have following items in your shopping cart:

{foreach $item in $quote.items}
{$item.product.name} x {$item.quantity}
{/foreach}

```
And save the template.

Now we have a mailing list that will be able to pick all abandoned shopping
carts (active and not finalized) that has their last modification time set
at least 3 hours ago and at most 4 hours ago. We also have a template that
we can send to the customer. Now, we have to create a periodic mailing that
will send emails based on our template to customers from the list.

Start creating the mailing. Choose the created template and pick the Magento
mailing list that we created. Go to 'Date and time' section and pick 'With
a specific interval' and set the interval to '1 hour'. This will send mailing
every hour and every hour will check for shopping carts that customer changed
at least 3 hours ago and at most 4 hours ago. 

That's it. The campaign is set up.

[research-url]: http://baymard.com/lists/cart-abandonment-rate
