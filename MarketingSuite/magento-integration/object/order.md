# Order object

When customer decides that he added all neded products inside his basket and 
goes through checkout, an order is created. Order is a finalized [quote](copernica-docs:MarketingSuite/magento-integration/object/quote).

## State and status

`state` and `status` properties can sound very similar. And in deed they are very
similar. They both describe current order progress. `state` is used by Magento
internally. `status` is a value defined in Magento admin panel by administrator.

Multiple `status` codes can be assigned to one `state` code.

### State values

`state` property can hold one of following values:

* 'new'

  When order was placed it's assigned with 'new' state.
  
* 'pending_payment'
    
  This state will show up when there is a payment being processed by outside payment
  gateway (like PayPal or Authorizenet).
    
* 'processing'

  This state will show up when new invoice is created for order.
  
* 'complete'

  This state describes a fully processed order. When order contains shippable 
  items shipments for all items have to be create. Also, customer has to 
  be invoiced.
  
* 'closed'
  
  This state will show up when order is successfully refunded.
  
* 'canceled'
  
  This state will show up when order is successfully cancelled.
  
* 'holded'
  
  This state will show up when order is put on hold.
    
* 'payment_review'

  This state will show up when payment is reviewed inside Magento.

## Personalization properties

| Property name   | Property type                                                                                    | Description                                                                     |
|-----------------|-----------------------------------------------------------------------------------------------   |---------------------------------------------------------------------------------|
| ID              | _number_                                                                                         | Internal Magento ID. For customer friendly identifier use `increment` property. |
| increment       | _number_                                                                                         | Customer friendly order identifier.                                             |
| created         | _string_                                                                                         | Date when order was created.                                                    |
| updated         | _string_                                                                                         | Date when order was last modified.                                              |
| tax             | _string_                                                                                         | Amount of tax in "[currency] [amount]" format.                                  |
| subtotal        | _string_                                                                                         | Subtotal in "[currency] [amount]" format.                                       |
| grandTotal      | _string_                                                                                         | Grand total in "[currency] [amount]" format.                                    |
| shippingAmount  | _string_                                                                                         | Shipping amount in "[currency] [amount]" format.                                |
| quantity        | _number_                                                                                         | Total number of products.                                                       |
| currency        | _string_                                                                                         | Currency code.                                                                  |
| weight          | _number_                                                                                         | Total order weight.                                                             |
| items           | _collection of [OrderItem](copernica-docs:MarketingSuite/magento-integration/object/order-item)_ | Collection of order items assigned to this order.                               |
| customer        | _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_                  | The customer to which order is assigned to.                                     |
| billingAddress  | _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_                    | The billing address assigned to this order.                                     |
| deliveryAddress | _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_                    | The shipping address assigned to this order.                                    |
| IPAddress       | _string_                                                                                         | IP address of a device that was used to place the order.                        |
| webstore        | _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_                  | The webstore in which order was placed.                                         |

## Links

[Magento user guide order page](http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#section-sales-orders.html%3FTocPath%3DSales%2520%2526%2520Orders%7C_____0)
[Order management entry in Magento knowledge base](http://www.magentocommerce.com/wiki/2_-_magento_concepts_and_architecture/order_management#xmind_source_file)
