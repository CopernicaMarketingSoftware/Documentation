# Quote object

Quote is a Magento name for basket. Quote is a collection of products that 
customer intends to buy. 

Quotes can be active or no. An active quote is a quote that has more than one
item in it and was not finalized by placing order. Quotes that were converted 
into orders are considered inactive.

Inside Magento environment quotes could not belong to customers, but such quotes 
are not synchronized with Copernica. It's mostly cause Magento is creating a lot 
of quotes. But quotes without customer data are useless for any kind of actions. 
To save bandwidth and speed up sending important data, such quotes are  
not synchronized. When such quote is assigned to a customer it will
be synchronized.

If user asked for price estimate and provided Magento with his address, shipping
address will also be available.

Every quote is assigned to a [webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore),
in which was created.

## Personalization properties

| Property name   | Property type                                                                                    | Description                                               |
|-----------------|--------------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| ID              | _number_                                                                                         | Original quote ID.                                        |
| active          | _bool_                                                                                           | Is quote an active quote?                                 |
| quantity        | _number_                                                                                         | Total number of products inside quote.                    |
| currency        | _string_                                                                                         | Currency that should be used with this quote.             |
| weight          | _number_                                                                                         | Total quote weight in KG.                                 |
| items           | _collection of [QuoteItem](copernica-docs:MarketingSuite/magento-integration/object/quote-item)_ | Collection of items inside quote.                         |
| lastModified    | _string_                                                                                         | Last time when quote was modified.                        |
| customer        | _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_                  | Customer that owns the quote.                             |
| billingAddress  | _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_                    | Billing address that should be used with this quote.      |
| deliveryAddress | _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_                    | Delivery address that should be used with this quote.     |
| IPAddress       | _string_                                                                                         | IPAddess of computer that was used to create this quote.  |
| tax             | _number_                                                                                         | Tax value for this quote.                                 |
| webstore        | _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_                  | Webstore in which quote was created.                      | 

## Examples

To list current basket inside email message following code can be used:

```
Hi {$quote.customer.firstname} {$quote.customer.lastname},

Your current basket is:

{foreach $item in $quote.items}

    {$item.product.name} x {$item.quantity}

{/foreach}

```

Will output:

```
Hi John Doe,
    
Your current basket is:

Awesome product x 3
Another product x 1
Yet another product x 2

```
