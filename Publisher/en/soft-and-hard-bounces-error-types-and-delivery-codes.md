# Error types and codes

This article explains the difference between soft and hardbounces and 
how to handle errors.

## E-mail error codes

When an email can not be delivered the receiving mailserver usually sends 
an error code back in a message with a short description of the error.
There are two main types:

-   Soft bounces: temporary errors. Error codes start with a 4 (4.XX)
-   Hard bounces: persistent errors. Error codes start with a 5 (5.XX)

## Identifying an error

The difference between hard an softbounces seems simple, but in 
actuality there are many possible causes for an email not reaching its 
destination, whether temporarily or permanently. Since knowing the 
difference between hard and softbounce is not sufficient to remedy 
every problem we prefer looking at where the mistake occurred in the 
process of sending the email.

Processing an email and delivering it is done in five steps.

-   Step 1: The domain name is converted to an IP-address
-   Step 2: A connection is established with the IP-address
-   Step 3: Connection is made with the receiving mailserver, Hotmail for example.
-   Step 4: The email is accepted by the receiving mailserver or sends an error code back.
-   Step 5: If the email fails later, even when accepted by the server, 
    the email is sent back to us, usually with an error code. You can 
    read more information about these error codes [here](http://www.emailaddressmanager.com/tips/codes.html).

Sometimes an error between step 1 through 3 is classified as a hardbounce 
and everything after as a hardbounce. Other times 1 through 4 is classified 
as a hardbounce. Other times the steps are ignored and the error code is 
used to determine whether a soft or a hardbounce occurred.

You can find the errors occurring from your mailings in the **Error** tab. 
The error code is also specified here if it exists.

## Solving errors

How to solve an error depends on the user of the software and the receiver. 
Some users might have another route to contact the receiver, such as calling, 
to get the correct email adress if this is the problem.

If emails are never delivered to certain addresses it is better to remove 
them from the database or not email them. It is possible to make a selection 
based on errors by using selection type "Check on email results" and selecting 
result "No error must have been registered".

## More information

* [Statistics](./statistics)
