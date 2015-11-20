# Magento persons list

A _person_ is a collection of data about one individual. Data for this object is aggregated 
from various other objects: customer, quote, order, subscriber and guest. A person is 
identified with its email address.  

A new _person_ is created when new data is synchyronized and an email address 
was found that was not yet associated with an existing customer. When an email 
address is already known in the system, the _Person_ associated with this address 
will be updated with the newly synchronized data.    

For example, when someone registers on your website with the email address johnsmith@hotmail.com, a new Magento Customer will be created. Alongside, inside the MarkertingSuite, a new 
_person_ will be created bound to the address johnsmith@hotmail.com. From now on, every future purchase, or other relevant data that can be associated with johnsmith@hotmail.com  will also be stored in his or her _person_ profile.    

Magento doesn't have a person concept. It's only available inside Marketing Suite.

## Personalization variables

| Variable name | Variable type                  | Description                                                                                                                      |
|---------------|--------------------------------|----------------------------------------------------------------------------------------------------------------------------------| 
| $magento      | _[Magento][magento-object]_    | Overall Magento installation.                                                                                                    |
| $person       | _[Person][person-object]_      | Instance of person that placed the order.                                                                                        |
| $customer     | _[Customer][customer-object]_  | Instance of customer that placed the order. If there is no customer associated with person this variable will evaluate to FALSE. |

## Limiting persons list

It's possible to limit persons list to a shorten, more precise one, by applying
filter options to it. It's possible to apply following filter options:

*  **First name**

   Limits persons list to persons that have given first name.

*  **Middle name**

   Limits persons list to persons that have given middle name.

*  **Prefix**

   Limits persons list to persons that have given prefix in theirs name.

*  **Last name**

   Limits persons list to persons that have given last name.

*  **Email address**

   Limits the persons list to persons with given the email address. In practice it will
   product list with one person on it (or zero, if there is no person with such
   email address), since every person has its own email address.

*  **Gender**

   Limits persons list to persons that declared given gender in their profile.

*  **Subscription status**

   Limits persons list to persons that are subscribers and have given subscription
   status. To learn more about subscription statuses read about them on [subscribers 
   target list][subscribers-target] page.

*  **Web store**

   Limits persons list to persons that are from given [webstore][webstore-object].

*  **bought product**

   Limits persons list to persons that bought given [product][product-object]. 
   Either as a [customer][customer-object] or a [guest][guest-object].

*  **bought product from category**

   Limits persons list to persons that bought a [product][product-object] 
   from given [category][category-object]. Either as a [customer][customer-object] 
   or a [guest][guest-object].

*  **wishes for product**

   Limits persons list to persons that placed given [product][product-object] 
   inside theirs [wishlist][wishlist-object]. [Wishlists][wishlist-object] 
   are available only for [customers][customer-object].

*  **wishes for product from category**

   Limits persons list to persons that placed a [product][product-object] 
   from given [category][category-object] inside theirs [wishlist][wishlist-object].
   [Wishlists][wishlist-object] are available only for [customers][customer-object].
   
[webstore-object]: copernica-docs:MarketingSuite/magento-integration/object/webstore
[product-object]: copernica-docs:MarketingSuite/magento-integration/object/product
[category-object]: copernica-docs:MarketingSuite/magento-integration/object/category
[wishlist-object]: copernica-docs:MarketingSuite/magento-integration/object/wishlist
[customer-object]: copernica-docs:MarketingSuite/magento-integration/object/customer
[person-object]: copernica-docs:MarketingSuite/magento-integration/object/person
[magento-object]: copernica-docs:MarketingSuite/magento-integration/object/magento
[subscribers-target]: copernica-docs:MarketingSuite/magento-integration/targets/subscribers
