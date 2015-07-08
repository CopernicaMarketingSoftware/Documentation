# Subscriber object

A subscriber is a someone that subscribed to a newsletter. Optionally, he can be 
linked to a registered [customer](copernica-docs:MarketingSuite/magento-integration/object/customer). 

Subscribers can have different states of subscription. All possible states are
explained in more detail below.

## Subscription status

Subscription status in Copernica is exactly the same as the statuses used by Magento. 
The status of a subscriber changes in response to subscribers actions.

* **unknown**

  This is the initial subscriptions status. When a subscriber is created 
  inside Magento environment and no action was taken on it yet, this status will show
  up in Copernica. Shortly hereafter, the creation status should change either
  to 'subscribed', 'unconfirmed' or 'not active', depending if Magento 
  is configured to require confirmation (double optin) after subscription.
  
* **subscribed**

  This status tells us that user actually wants to receive email newsletters and
  no further confirmation is needed.
  
* **not active**

  This status will show up when Magento is configured to require additional confirmation 
  after a user subscribes to newsletter and an email address is being subscribed 
  when no customer is logged on or email address differs from currently logged 
  in user's email address.
  
  Difference between **not active** and **unconfirmed** is that **not active**
  is dealing with email addresses and **unconfirmed** is dealing with registered
  customers.
  
* **unsubscribed**
  
  This status shows up when user explicitly expresses the will of not receiving 
  newsletter emails (any longer).

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
