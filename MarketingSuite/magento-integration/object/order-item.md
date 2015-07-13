# OrderItem object

The order item describes a product that is part of an order. It defines how many of 
the given product should be shipped to the customer. It also defines final price of 
a product. It can differ from normal product price, since additional pricing rules can
be applied on order items (like discount given by higher quantity of products).

## Personalization properties

The OrderItem object holds the following properties  

| Property name   | Property type                                                                 | Description                         |
|-----------------|-------------------------------------------------------------------------------|-------------------------------------|
| ID              | _number_                                                                      | Original order item ID.             |
| order           | _[Order](copernica-docs:MarketingSuite/magento-integration/object/order)_     | The order that item belogns to.     |
| quantity        | _number_                                                                      | Amount of products.                 |
| price           | _string_                                                                      | Final item price.                   |
| weight          | _number_                                                                      | Weight of item.                     |
| product         | _[Product](copernica-docs:MarketingSuite/magento-integration/object/product)_ | The actual product.                 | 
