# Address object

The 'address' object describes specific location in the words as well as some 
contact information. Location is described by `street`, `city`, `zipcode`, `state`
and `country` properties. Contact information is described by `phone`, `fax` and
`company` properties.

Addresses can be created and managed both by user himself and by Magento 
administrators. Changes made by both will be synchronized with Copernica.

## Relation to customer, quote and order

Addresses are used with conjunction with [customer][customer-object], [order][order-object]
or [quote][quote-object]. Each address will be assigned to at least one of such 
object. 

Customer can have multiple addresses assigned to him. But one customer can have 
only one default billing address and one shipping address. They can be the same
address object.

Order can have multiple addresses assigned to it. Orders will have billing 
and shipping adddresses (one of each). Both of them can point to the same address
object.

Quote can have multiple addresses assigned to it. Quote can have shipping and billing
address assigned to them (one of each). They are filled when customer ask for 
shipping estimation for his quote. However, Magento is producing a lot of empty
addresses for quotes. It is advised to check properties before they are used. For
example following code could be used to check if quote has address with street and
city properties.

```
{$address = $quote.billingAddress}
{if $address.street|empty or $address.city|empty}
    No address
{else}
    {$address.street}, {$address.city}
{/if}
```

Address object has an id. This id is unique. However, it's unique only inside its 
own group of addresses. There are 3 groups of addresses: customer addresses, order
addresses and quote addresses. Customer addresses are all addresses created for 
customer objects. Orders addresses are addresses created for orders objects. 
Quotes addresses are created for quotes objects. For some reason they don't share
same id range and ids for them are generated separately. With that in mind, it's
not advised to compare ids of address from different sources.

## Personalization properties

| Property name   | Property type                 | Description                               |
|-----------------|-------------------------------|-------------------------------------------|
| ID              | _number_                      | Original address ID.                      |
| customer        | _[Customer][customer-object]_ | The customer that address is assigned to. |
| order           | _[Order][order-object]_       | The order that address is assigned to.    |
| quote           | _[Quote][quote-object]_       | The quote that address is assigned to.    |
| street          | _string_                      | The name of the street.                   |
| city            | _string_                      | The name of the city.                     |
| zipcode         | _string_                      | The zip code.                             |
| state           | _string_                      | The state.                                |
| country         | _string_                      | The country.                              |
| phone           | _string_                      | The phone number.                         |
| fax             | _string_                      | The fax number.                           |
| company         | _string_                      | The company name.                         |
| isBilling       | _boolean_                     | Is address a billing address?             |
| isShipping      | _boolean_                     | Is address a shipping address?            |

[customer-object]: copernica-docs:MarketingSuite/magento-integration/object/customer
[order-object]: copernica-docs:MarketingSuite/magento-integration/object/order
[quote-object]: copernica-docs:MarketingSuite/magento-integration/object/quote
