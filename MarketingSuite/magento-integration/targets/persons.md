# Magento persons list

Person is a set of data about one individual. Data for this object is gathered
from other objects: customer, quote, order, subscriber and guest. Email address
is used to distinguish different individuals.

New person is created when data associated with given email address is synchronized.
Usually that means a customer, order or subscriber is synchronized and previously
there was no objects associated with email address contained in one of such. Every
next object that is associated with given email address will add data to corresponding 
person object.

For example, when someone registers on your website, a Magento customer will be 
synchronized with Copernica. Alongside, a new person will be created inside 
Marketing Suite. All relevant data from customer object will be available inside
person object and customer will be linked to created person object. After some 
time, a guest order is placed using same email address. When order is synchronized 
with Copernica relevant data from that order will be added to previously created 
person object and order will be available via person object. For Magento, created
customer and guest checkout are unrelated. For Marketing Suite, order is assigned
to person. 

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

   Limits persons list to persons with given email address. In practice it will
   product list with one person on it (or zero, if there is no person with such
   email address), since every person has it's own email address.

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
