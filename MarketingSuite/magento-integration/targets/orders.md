# Magento orders list

Order list allows you to create custom targets based on order information. 
For example it's possible to send a mailing to all customers that bought specific 
or a product or from certain category.

## Personalization variables

Variables available for email personalization.

- [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento) `$magento` 
- [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer) `$customer`
- [Order](copernica-docs:MarketingSuite/magento-integration/object/order) `$order`
- [Quote](copernica-docs:MarketingSuite/magento-integration/object/customer) `$quote`

## Filter options

For lists based on orders the following filter options are available:

* **Quote Id**
* **Customer Id**
* **State**
* **Status**
* **Quantity**
* **Total weight**
* **Bought product**
* **Product's category**
* **Web store**
* **Currency**
* **IP address**


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
