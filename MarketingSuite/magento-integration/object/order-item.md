# OrderItem object

Order item describes a product assigned to an order. It defines how many of 
given products should be shipped to customer. It also defines final price of 
a product. It can differ from product price, since additional pricing rules can
be applied on order item (like discount caused by higher quantity of products,
or specific customer's group).

## Personalization properties

| Property name   | Property type                                                                 | Description                         |
|-----------------|-------------------------------------------------------------------------------|-------------------------------------|
| ID              | _number_                                                                      | Original order item ID.             |
| order           | _[Order](copernica-docs:MarketingSuite/magento-integration/object/order)_     | The order that item belogns to.     |
| quantity        | _number_                                                                      | Amount of products.                 |
| price           | _string_                                                                      | Final item price.                   |
| weight          | _number_                                                                      | Weight of item.                     |
| product         | _[Product](copernica-docs:MarketingSuite/magento-integration/object/product)_ | The actual product.                 | 
