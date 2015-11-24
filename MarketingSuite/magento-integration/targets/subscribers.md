# Magento subscribers list

In Magento, a subscriber is just someone who opted in to receive newsletter 
emails. This person doesn't necessarily have to be a customer.

There are various ways in which someone can subscribe.

Someone can subscribe via a subscription form on your website (anonymous), 
via the subscription options in the user's account settings (when logged in), or 
by ticking a check box during the checkout of an order. 

Subscribers are automatically synchronized with the Marketing Suite. 

Note that subscribers can only be created in Magento. It is not possible to
manage this inside the MarketingSuite. 

## Subscribing / unsubscribing

When someone subscribes himself, this is automatically pushed to Marketing Suite via the synchronization queue.

Also, when someone unsubscribes, this will also be pushed to the Marketing Suite.
The Marketing Suite also provides the `{unsubscribe}` personalization tag which can be added to 
your email. Clicking this link will automatically unsubscribe the user. The MarketingSuite
will push the unsubscribe request to Magento. 

## Subscription life cycle

The Magento Subscription Life Cycle basically describes the subscription status 
of a person. It tells us if someone wants to receive newsletter, 
or resigned from receiving it, or he has yet to confirm his decision. Only when
status is **subscribed** newsletter emails should be sent. In total there
is 5 statuses: 

*  **unknown** 

   The status _unknown_ means that we don't know if subscriber wants to receive newsletter email or not.
   It is assigned just after subscriber is created inside Magento installation 
   and no follow-up actions were taken. Depending if Magento is configured to
   require confirmation after subscription (double opt-in), this status should change into 
   'subscribed' (no confirmation required), 'unconfirmed' (email address is associated with  
    a registered customer) or 'not active' (the email address is not associated to a registered customer).

*  **not active**

   It means that subscription is not active yet. It will occur when a logged in 
   user manually enters an email address into a subscription field that is different from the email address he registered his account with.

   This status will also occur when an anonymous visitor enters an unknown email
   address into the subscription field.
   
   The difference between **not active** and **unconfirmed** is that **not active**
   is dealing with anonymous users and **unconfirmed** is dealing with registered
   users.

*  **unconfirmed** 

   This status only occurs in a double opt-in procedure for newsletter subscription. It means that subscription has yet to be confirmed. Newsletter emails shouldn't be sent to this person (yet).  

   The difference between **unconfirmed** and **not active** is that **unconfirmed** is dealing with registered users and **not active** is dealing with anonymous users.

*  **subscribed**

   It means that subscriber wants to receive newsletter emails and no further 
   confirmation is required.

*  **unsubscribed**

   Specifies that a user explicitly doesn't want to receive newsletter emails.

## Compatibility with other extensions

To ensure compatibility, the MarketingSuite extension is designed to use Magento core modules. For
subscribers synchronization the field `Mage_Newsletter` is used. Any other extension that 
uses this module for managing subscribers should work fine with Copernica extension.

## Personalization variables

| Variable name | Variable type                     | Description                                         |
|---------------|-----------------------------------|-----------------------------------------------------| 
| $magento      | _[Magento][magento-object]_       | Overall Magento installation.                       |
| $subscriber   | _[Subscriber][subscriber-object]_ | Instance of subscriber that email is sent to.       |
| $person       | _[Person][person-object]_         | Instance of person that subscriber was assigned to. |

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


[magento-object]: copernica-docs:MarketingSuite/magento-integration/object/magento
[subscriber-object]: copernica-docs:MarketingSuite/magento-integration/object/subscriber
[person-object]: copernica-docs:MarketingSuite/magento-integration/object/person
