# Subscriber object

Subscriber is a someone that subscribed to newsletter. Optionally, he can be 
linked to registered [customer](copernica-docs:MarketingSuite/magento-integration/object/customer). 
Subscribers can be in different states of subscription. Below all states are
explained in more detail.

## Subscription status

Subscriptions status is exactly the same subscriptions status as you can find
inside Magento code. Status changes in response to subscribers actions.

* **unknown**

  This status is the initial subscriptions status. When subscriber is created 
  inside Magento environment and no action was taken on it this status will show
  up in Copernica environment. Shortly after creation status should change either
  to 'subscribed' or 'unconfirmed' or 'not active', depending if Magento 
  is configured to require confirmation after subscription.
  
* **subscribed**

  This status tell us that user actually wants to receive email newsletter and
  no further confirmation of his will is needed.
  
* **not active**

  It will show up when Magento is configured to require additional confirmation 
  after user subscribes to newsletter and an email address is being subscribed 
  when no customer is logged on or email address differs from currently logged 
  in user's email address.
  
  Difference between **not active** and **unconfirmed** is that **not active**
  is dealing with email addresses and **unconfirmed** is dealing with registered
  customers.
  
* **unsubscribed**
  
  This status shows up when user explicitly express the will of not receiving 
  newsletter emails.

* **unconfirmed**
 
  This status will show up only when Magento is configured to require additional 
  confirmation after user subscribes to newsletter and a registered customer 
  wants to subscribe to newsletter.
  
  Difference between **unconfirmed** and **not active** is that **unconfirmed**
  is dealing with registered customers and **not active** is dealing with email
  addresses.

## Personalization properties

| Property name | Property type                                                                    | Description                                              |
|---------------|----------------------------------------------------------------------------------|----------------------------------------------------------|
| ID            | _number_                                                                         | The original subscriber ID from Magento                  |
| webstore      | _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_  | Webstore in which subscriber subscribed                  |
| customer      | _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_  | Optional customer linked to subscriber                   |
| modified      | _string_                                                                         | Last date that subscription status was changed.          |
| status        | _string_                                                                         | Subscription status. More detailed explanation is above. |
| email         | _string_                                                                         | Subscriber's email                                       |

## Examples

When there is a need to send an email that will detect if subscriber is 
a customer or not, following code can be used:

```
{if $subscriber.customer}

    Hi {$subscriber.customer.firstname} {$subscriber.customer.lastname},
    
    Welcome back.

{else}

    Hi guest,
    
    Would you consider to register?

{/if}
```

When subscriber is a customer will output:

```
    Hi John Doe,
    
    Welcome back
```

When customer is not a customer will output:

```
    Hi guest,
    
    Would you consider to register?
```
