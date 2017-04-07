# Followups Tutorial: Send an email when a customers spends over 1000 euros.

This tutorial explains how you can automatically send an email to
customers that spent over 1000 euros in your webshop.

For this tutorial you will need a database, with a collection wherein you
store information about purchased products at the profile. An email will
be sent to the profile when the total amount of money spent by the
customer, exceeds the 1000 euros.

### Get started

Create the email document that you will later send to the customer:
"Thank you for spending half your salary on shoes at our shop. Here's a
unique code for another discount, so you can spend even more. Don't tell
your husband. Go steal his creditcard instead!"

You have a field *product\_price* in the **Products** collection. The
field is used to store the purchase price of a product.

In the database, add a new database field '*Total*'. You will use this
field later to store the total amount for the products.

Add a database follow-up action to the collection in which the products
are stored.

-   At **cause** choose: "A subprofile is created"
-   The **action** of the follow-up: "Change the subprofile"
-   The **Field 1** option should be set to the field *Total*
-   Select the profile field to be changed and enter the following code:

`{capture assign="total"}0{/capture}{foreach from=$profile.products item=sp}{capture  assign="total"}{$sp.product_price+$total}{/capture}{/foreach}{$total}`

-   Save the follow-up action.

To test the follow-up action, add a subprofile (product) to the
collection of your test destination. Then confirm if the price of the
product is added in the profile field *Total*.

Works, right?

### Send an email

The e-mail you send can be send as a follow-up, or as a scheduled
emailing. This last method is the most obvious and is explained below.

Make a new selection in your database. This gives the following
conditions:

> Check on field value: the value in the field *Total* [is greater than]
> 1000.\
>  **AND**\
>  Check on email results: Select profiles where Document X was not sent to.
> Document X is of course your e-mail document sent in response to the
> purchased products.

The selection will now contain profiles that spent over 1000 euro in
your shop, but did not yet recieve the email. Now you should schedule a 
(daily/weekly) mail to the selection to sent them.

Make sure you test your campaign a few days before you start sending to
your customers.

[Back to followups in Publisher.](./followups-publisher)
