# Magento specific mail targets

Each mailing sent with Copernica Marketing Suite has to have a target. A target 
can be a single email address (think of a transactional email) or a large list 
with subscribers if you are sending a newsletter. Inside Copernica these targets 
are created with selections and/or miniselections. With Magento enabled accounts, 
six new target types are introduced: 

- [Magento customers list][customers-target]
- [Magento orders list][orders-target]
- [Magento quotes list][quotes-target]
- [Magento subscribers list][subscribers-target]
- [Magento persons list][persons-target]
- [Magento guests list][guests-target]

Each list provides different personalization and filtering options.

## What target list to pick?

Depending on intention of a mailing different mailing target list can be chosen.

To target subscribers, regardless if they are customers, guests or just plain 
website users, there is [subscribers list][subscribers-target]. 
Usually, this type of target list will be used to compose general newsletters.

To target only registered customers, there is [customers list][customers-target].
Usually, this type of target list will be used to composer members only emailings.

To target only customers that bought products, there is [orders list][orders-target].
Usually, this type of target list will be used to compose emailings asking for 
opinion about the service or offering special price on accessories to certain 
product.

To target only users that are considering purchase or forgot about their active
basket, there is [quotes list][quotes-target].
Usually, this type of target list will be used to compose emailings reminding 
users that they have products in their shopping carts.

To target only customers that placed orders as anonymous users, there is 
[guests list][guests-target]. Usually, this type of target will be used to 
compose emailing advertising website membership.

To target 'real world' persons, there is [persons list][persons-target].
Usually, this type of target will be used to send emailing to users interested 
in certain product (regardless if they registered or not).

## Default targets

For each synchronized store a few default targets are automatically created. 
These targets reflect the most basic/common mailing targets. At the moment, each 
synchronized store comes with the following mail targets, ready to send 
a mailing to: 

*   Subscribers - sends a mailing to all customers who have opted in to receive 
emails about your webshop or products. 


Default targets are automatically created when a new synchronization between 
a store and the Marketing Suite is complete and will be added to the list with 
available targets. In other words, when a new store "NEW SHOP" is created, 
shortly after a new default target will be created: "subscribers of NEW SHOP".

More default targets will be added soon. 

## Custom targets 

In addition to default targets it's possible to create your own custom targets. 
To do so, navigate to **Magento Sync** inside Marketing Suite, then pick a target 
type inside "Manage lists". A new page with list of targets and form should 
pop up.

![](magento-filter-page.png)

In this screen you can fine tune mailing target options. Each target type has 
specific set of options that can be applied. For example, 'orders' can be filtered 
by purchased products, but 'subscribers' cannot.

[customers-target]: magento-integration/targets/customers
[orders-target]: magento-integration/targets/orders
[quotes-target]: magento-integration/targets/quotes
[subscribers-target]: magento-integration/targets/subscribers
[persons-target]: magento-integration/targets/persons
[guests-target]: magento-integration/targets/guests
