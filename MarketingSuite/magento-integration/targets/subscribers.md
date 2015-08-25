# Magento subscribers list

A subscriber is just an email address that agreed to receive newsletter emails. 
Single subscriber can be attached to a customer, but that is not required. 
Whenever subscribers is created it's synchronized with Marketing Suite. Subscriber
can be created via newsletter field or via subscription options in users account
settings inside Magento.

Subscribers can be created via Magento installation only. Marketing Suite doesn't
provide a way to insert Magento subscriber.

## Subscribing / unsubscribing

Subscribers can subscribe to a newsletter. Subscribing will be automatically pushed 
to Marketing Suite via synchronization queue.

Subscribers can unsubscribe from a newsletter. Unsubscribing can be done via 
Magento interface. This action will be synchronized with Marketing Suite. It's
also possible to unsubscribe via link generated from {$unsubscribe} personaliation
tag. Following that link will notify Magento installation about unsubscription.

## Subscription lifecycle

Magento introduces subscription lifecycle. Lifecycle is basically, as status in 
which subscriber is. Status tell us if subscriber wants to receive newsletter, 
or resigned from receiving it, or he has to confirm his decision. Only when
status is **subscribed** newsletter emails should be sent. In total there
is 5 statuses: 

*  **unknown** 

   It means that we don't know if subscriber wants to receive newsletter email.
   It is assigned just after subscriber is created inside Magento installation 
   and no follow up actions were taken. Depending if Magento is configured to
   require confirmation after subscription, this status should change into 
   'subscribed' (no confirmation required), 'unconfirmed'(email address is of 
   registered customer) or 'not active' (email address is of anonymous user).

*  **not active**

   It means that subscription is not active yet. It will occur when an logged in 
   user enters manually email address, that is not his, into subscription field.
   This status will occur also, when an anonymous visitor enters an unknown email
   address into subscription field.
   
   The difference between **not active** and **unconfirmed** is that **not active**
   is dealing with anonymous users and **unconfirmed** is dealing with registered
   user.

*  **unconfirmed** 

   It means that subscription has to be yet confirmed and newsletter emails 
   shouldn't be sent. It will occur when new user or already registered customer
   wants to receive newsletter emails. This status will show up when Magento is 
   configured to require additional subscription confirmation. 
   
   The difference between **unconfirmed** and **not active** is that **unconfirmed** is dealing with registered
   user and **not active** is dealing with anonymous users.

*  **subscribed**

   It means that subscriber wants to receive newsletter emails and no further 
   confirmation is required.

*  **unsubscribed**

   It means that user explicitly doesn't want to receive newsletter emails.

## Compatibility with other extensions

To ensure compatibility, extension is designed to use Magento core modules. For
subscribers synchronization Mage_Newsletter is used. Any other extension that 
uses this module for managing subscribers should work fine with Copernica extension.

## Personalization variables

| Variable name | Variable type                                                                       | Description                                                                                                    |
|---------------|-------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------| 
| $magento      | _[Magento](copernica-docs:MarketingSuite/magento-integration/object/magento)_       | Overall Magento installation.                                                                                  |
| $subscriber   | _[Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber)_ | Instance of subscriber that email is sent to.                                                                  |
| $customer     | _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_     | Instance of customer that email is sent to. When email is sent to non-customer this variable will be **NULL**. |

## Limiting subscribers list

It's possible to limit subscribers list to a shorten one by applying filter options
to it. It's possible to apply following filter options:

*  **Subscription status** 

   Limits subscribers list to subscribers that are in specific state. 

*  **Customer Id**

   Limits subscribers list to subscribers that are attached to one specific customer ID.
   In practice it means one subscriber.

*  **Web store**

   Limits subscribers list to subscribers that subscribed within certain web store.

*  **Only guests subscribers**

   Limits subscribers list to subscribers that are not attached to any customer.

*  **Only registered users**

   Limits subscribers list to subscribers that are attached to one of registered customers.
