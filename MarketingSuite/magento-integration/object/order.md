# Order object

When a customer decides that he added all needed products inside his basket and 
goes through checkout, an order is created. An order is a finalized [quote][quote-object].

The object `order` gives you access to the properties of an order, such as 
the quantity, items and the customer who placed the order.  

## State and status

`state` and `status` properties sound very similar. And indeed, they _are_ very
similar. They both describe the current order progress. `state` is used by Magento
internally. `status` is a value defined inside the Magento admin panel by the administrator.

Multiple `status` codes can be assigned to one `state` code.

### State values

`state` property can hold one of following values:

* 'new'

  When an order was placed it is assigned with the 'new' state.
  
* 'pending_payment'
    
  This state will show up when there is a payment being processed by an outside payment
  gateway (like PayPal or Authorizenet).
    
* 'processing'

  This state will show up when a new invoice is created for the order.
  
* 'complete'

  This state describes a fully processed order. When order contains shippable 
  items, shipments for all items have to be created. Also, the customer has to 
  be invoiced.
  
* 'closed'
  
  This state will show up when an order is successfully refunded.
  
* 'canceled'
  
  This state will show up when an order is successfully cancelled.
  
* 'holded'
  
  This state will show up when an order is put on hold.
    
* 'payment_review'

  This state will show up when a payment is being reviewed or pending review inside Magento.


## Personalization properties

| Property name   | Property type                                 | Description                                                                                                                  |
|-----------------|-----------------------------------------------|------------------------------------------------------------------------------------------------------------------------------|
| ID              | _number_                                      | Internal Magento ID. For customer friendly identifier use `increment` property.                                              |
| increment       | _number_                                      | Customer friendly order identifier.                                                                                          |
| created         | _string_                                      | Date when order was created.                                                                                                 |
| updated         | _string_                                      | Date when order was last modified.                                                                                           |
| tax             | _string_                                      | Amount of tax in "[currency] [amount]" format.                                                                               |
| subtotal        | _string_                                      | Subtotal in "[currency] [amount]" format.                                                                                    |
| grandTotal      | _string_                                      | Grand total in "[currency] [amount]" format.                                                                                 |
| shippingAmount  | _string_                                      | Shipping amount in "[currency] [amount]" format.                                                                             |
| quantity        | _number_                                      | Total number of products.                                                                                                    |
| currency        | _string_                                      | Currency code.                                                                                                               |
| weight          | _number_                                      | Total order weight.                                                                                                          |
| items           | _collection of [OrderItem][orderitem-object]_ | Collection of order items assigned to this order.                                                                            |
| customer        | _[Customer][customer-object]_                 | The customer to which order is assigned to. Note that when order was placed by anonymous user this property will be empty.   |
| quote           | _[Quote][quote-object]_                       | The quote that was used to create order.                                                                                    |
| guest           | _[Guest][guest-object]_                       | The guest object assigned to this order. Note that when order was placed by registered customer this property will be empty. |
| person          | _[Person][person-object]_                     | The person object assigned to this order.                                                                                    |
| state           | _string_                                      | Current order state.                                                                                                         |
| status          | _string_                                      | Current order status.                                                                                                        |
| billingAddress  | _[Address][address-object]_                   | The billing address assigned to this order.                                                                                  |
| deliveryAddress | _[Address][address-object]_                   | The shipping address assigned to this order.                                                                                 |
| IPAddress       | _string_                                      | IP address of a device that was used to place the order.                                                                     |
| webstore        | _[Webstore][webstore-object]_                 | The webstore in which order was placed.                                                                                      |

## Links

[Magento user guide order page](http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#section-sales-orders.html%3FTocPath%3DSales%2520%2526%2520Orders%7C_____0)
[Order management entry in Magento knowledge base](http://www.magentocommerce.com/wiki/2_-_magento_concepts_and_architecture/order_management#xmind_source_file)

[quote-object]: copernica-docs:MarketingSuite/magento-integration/object/quote
[orderitem-object]: copernica-docs:MarketingSuite/magento-integration/object/order-item
[customer-object]: copernica-docs:MarketingSuite/magento-integration/object/customer
[guest-object]: copernica-docs:MarketingSuite/magento-integration/object/guest
[person-object]: copernica-docs:MarketingSuite/magento-integration/object/person
[address-object]: copernica-docs:MarketingSuite/magento-integration/object/address
[webstore-object]: copernica-docs:MarketingSuite/magento-integration/object/webstore
