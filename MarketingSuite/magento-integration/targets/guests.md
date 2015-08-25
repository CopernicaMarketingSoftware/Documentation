# Magento guests list

Guest is a user that placed order but didn't want to register and opted for 
anonymous check out. Anonymous check out has to be enabled in Magento configuration. 

One guest user is created on each anonymous check out, thus it may happen that 
there will be multiple guest users referring to one real person.

## Personalization variables

| Variable name | Variable type                                                                 | Description                              |
|---------------|-------------------------------------------------------------------------------|------------------------------------------| 
| $magento      | _[Magento](copernica-docs:MarketingSuite/magento-integration/object/magento)_ | Overall Magento installation.            |
| $guest        | _[Guest](copernica-docs:MarketingSuite/magento-integration/object/guest)_     | Instance of guest that email is sent to. |
| $order        | _[Order](copernica-docs:MarketingSuite/magento-integration/object/order)_     | Instance of order that guest placed.     |

## Limiting guests list

It's possible to limit guests list to a shorten, more precise one, by applying
filter options to it. It's possible to apply following filter options:

*  **First name**

   Limits guests list to guests that have given first name.

*  **Middle name**

   Limits guests list to guests that have given middle name.

*  **Prefix**

   Limits guests list to guests that have given prefix in theirs name.

*  **Last name**

   Limits guests list to guests that have given last name.

*  **Email address**

   Limits guests list to guests that used given email address to place order.

*  **Gender**

   Limits guests list to guests that declared given gender.

*  **bought product**

   Limits guests list to guests that bought certain [product](copernica-docs:MarketingSuite/magento-integration/object/product).

*  **bought product from category**

   Limits guests list to guests that bought [product](copernica-docs:MarketingSuite/magento-integration/object/product) from a certain [category](copernica-docs:MarketingSuite/magento-integration/object/category)
