# Magento specific mail targets

Each mailing sent with Copernica Marketing Suite has to have a target. A target can 
be a single email address (think of a transactional email) or a large list with 
subscribers if you are sending a newsletter. Inside Copernica these targets are 
created with selections and/or miniselections. With Magento enabled accounts, five
new target types are introduced: 


- [Magento customers list](copernica-docs:MarketingSuite/magento-integration/targets/customers)
- [Magento orders list](copernica-docs:MarketingSuite/magento-integration/targets/orders)
- [Magento quotes list](copernica-docs:MarketingSuite/magento-integration/targets/quotes)
- [Magento subscribers list](copernica-docs:MarketingSuite/magento-integration/targets/subscribers)
- [Magento persons list](copernica-docs:MarketingSuite/magento-integration/targets/persons)

Each list provides different personalization and filtering options. 

## Default targets

For each synchronized store a few default targets are automatically created. These 
targets reflect the most basic/common mailing targets. At the moment, each synchronized
store comes with the following mail targets, ready to send a mailing to: 


Default targets are automatically created when a new synchronization between a store
and the Marketing Suite is complete. The targets will be included in the list with available
targets
That means, when a new store view "NEW SHOP" is created, shortly new default 
target will be created "subscribers of NEW SHOP".

## Custom targets 

In addition to default targets it's possible to create a fully custom target. 
To do so, navigate to Magento Sync inside Marketing Suite. And pick a target 
type inside "Manage lists". A new page with list of targets and form should 
pop up.

![](copernica-docs:MarketingSuite/images/magento-filter-page.png)

In this screen you can fine tune mailing target options. Each target type has 
specific set of options that can be applied. For example, orders can be filtered 
by bought products, but subscribers can't.
