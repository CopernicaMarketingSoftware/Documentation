# Magento guests list

A guest is a user that placed order but didn't register and opted for 
anonymous check out. Note that anonymous check out has to be 
enabled inside the Magento configuration. 

Magento creates a new guest user for each anonymous checkout, so it is possible 
that different guest users point to the same real world person.

## Personalization variables

| Variable name | Variable type                                                                 | Description                              |
|---------------|-------------------------------------------------------------------------------|------------------------------------------| 
| $magento      | _[Magento](MarketingSuite/magento-integration/object/magento)_ 		| Overall Magento installation.            |
| $guest        | _[Guest](MarketingSuite/magento-integration/object/guest)_     		| Instance of guest that email is sent to. |
| $order        | _[Order](MarketingSuite/magento-integration/object/order)_     		| Instance of order that guest placed.     |

## Limiting guests list

It's possible to limit _guests list_ to a shorter, more precise one, by applying
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

   Limits guests list to guests that bought certain [product](MarketingSuite/magento-integration/object/product).

*  **bought product from category**

   Limits guests list to guests that bought [product](MarketingSuite/magento-integration/object/product) from a certain [category](MarketingSuite/magento-integration/object/category)
