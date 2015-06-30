# Integration

Integrating Magento webshop with Copernica environment can be done in couple of
way. We have two extensions and two API protocols ([REST](https://en.wikipedia.org/wiki/Representational_state_transfer) and [SOAP](https://en.wikipedia.org/wiki/SOAP)).

At the time of writing there are two Copernica-Magento extension. Both of them 
interface with different part of our software.

## Publisher based extension

Old extension maintained by *Cream*, a company based in the Netherlands. This 
plugin uses [Copernica REST API](http://www.copernica.com/en/support/rest/the-copernica-rest-api "Copernica REST API documentation page").

This extension was designed to work with Publisher, so it creates databases, 
views, profiles and subprofiles inside Publisher. All that data is still very 
usable inside MarketingSuite, thus most of Magento specific meta-data is 
flattened.

[Magento Connect page](http://www.magentocommerce.com/magento-connect/copernica-marketing-software.html)

## Marketing Suite extension

New way of bridging Magento webshops with Marketing Suite. This extension was
developed by Copernica, and it uses dedicated REST API. Additionally, this 
extension is developed openly and code can be review/cloned from [GitHub]((https://github.com/CopernicaMarketingSoftware/MAGENTO)).

This extension was designed to work with Marketing Suite. Data synchronized from
Magento retain it's relations and structure (with some additions available only
inside Marketing Suite). Thanks to that, better selections are possible.

[Magento Connect page](http://www.magentocommerce.com/magento-connect/copernica.html)

[GitHub page](https://github.com/CopernicaMarketingSoftware/MAGENTO)

## APIs

For more fine-tuned integration it's possible to use our APIs for creating your
own extension. Thus, both of our APIs offer only access to Publisher databases
and Magento dedicated API is not publicly available. It means that constructing
dedicated objects can be very hard to achieve.

For informations about our APIs go to proper pages about them:

- [REST API](http://www.copernica.com/en/support/rest/the-copernica-rest-api)
- [SOAP API](http://www.copernica.com/en/support/soap-api-documentation)

If any questions arise, it's possible to get answers on our [subforum](http://www.copernica.com/en/forum/category/28)
