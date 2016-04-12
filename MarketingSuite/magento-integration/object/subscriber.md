# Subscriber object

A subscriber is a someone that subscribed to a newsletter. Optionally, he can be 
linked to a registered [customer](magento-integration/object/customer). 

Magento offers two different newsletter subscription procedures: the single opt-in and the 
double opt-in. In a single opt-in procedure, the user is subscribed directly after he entered his
email address in the subscription form. The latter means that an additional confirmation email is sent to verify the email address. The user is only subscribed after he clicked the confirmation link in the email.

Subscribers can have different states of subscription. All possible states are
explained in more detail below.

## Subscription statuses

The subscription statuses in Copernica are exactly the same as the statuses used by Magento. 
The status of a subscriber changes in response to subscriber's actions.

* **unknown**

  This is the initial subscription status. When a subscriber is created 
  inside the Magento environment and no action was taken on it yet, this status will show
  up in Copernica. Shortly hereafter, the creation status should change either
  to 'subscribed', 'unconfirmed' or 'not active', depending if Magento 
  is configured to require confirmation (double opt-in) after subscription.
  
* **subscribed**

  This status tells us that user actually wants to receive email newsletters. 
  No further confirmation is needed.
  
* **not active**

  This status will show up when Magento is configured to require additional confirmation (double opt-in procedure). It occurs in two situations.
  
  1. A user gets this status when he is logged on the website, and manually enters 
     an email address in the subscribe form, that is different from the email address 
     he registered his account with. 

  2. When an anonymous visitor uses the subscription form with an unknown email address.
  
  The difference between **unconfirmed** and **not active** is that **unconfirmed**
  is dealing with registered customers and **not active** is dealing with anonymous users.
  
* **unconfirmed**
 
  This status will only show up in a double opt-in procedure after a new user subscribes to a newsletter and when an already registered customer wants to subscribe to newsletter.
  
  The difference between **unconfirmed** and **not active** is that **unconfirmed**
  is dealing with registered customers and **not active** is dealing with anonymous users.
  
* **unsubscribed**
  
  This status shows up when user explicitly expresses the will of not receiving 
  newsletter emails (any longer).

## Personalization properties

| Property name | Property type                                                                    | Description                                              |
|---------------|----------------------------------------------------------------------------------|----------------------------------------------------------|
| ID            | _number_                                                                         | The original subscriber ID from Magento                  |
| webstore      | _[Webstore](magento-integration/object/webstore)_ 		                       | Webstore in which subscriber subscribed                  |
| customer      | _[Customer](magento-integration/object/customer)_ 		                       | Optional customer linked to subscriber                   |
| modified      | _string_                                                                         | Last date that subscription status was changed.          |
| status        | _string_                                                                         | Subscription status. More detailed explanation is above. |
| email         | _string_                                                                         | Subscriber's email                                       |
| isSubscribed  | _boolean_                                                                        | Is subscriber subscribed?                                |
| person        | _[Person](magento-integration/object/person)_     		                       | Person assigned to this subscriber.                      |

## Examples

When there is a need to send an email that will detect if subscriber is 
a customer or not, the following code can be used:

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
