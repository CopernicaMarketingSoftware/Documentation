# Address object

The `address` object describes the address and contact information of a customer. 
Customer location is comprised of  `street`, `city`, `zipcode`, `state` and `country` properties. 
Contact information is described by `phone`, `fax` and `company` properties.

Addresses can be created and managed both by the user himself and by Magento 
administrators. Either who made the changes, they will be synchronized with Copernica.

Each address object has an ID that is unique _only_ inside its own group of addresses. Magento
distinguishes three different address groups: customer addresses, order addresses and quote 
addresses. 

- Customer addresses are all addresses created for customer objects. 
- Orders addresses are addresses created for orders objects. 
- Quotes addresses are created for quotes objects. 

For some reason they don't share the same ID range. With that in mind, it's
not advised to compare address IDs of from different groups.

## Relation to customer, quote and order

Addresses are used in conjunction with [customer][customer-object], [order][order-object]
or [quote][quote-object]. Each address will be assigned to at least one of these 
objects. 

### Customer addresses

A single customer can have unlimited addresses assigned to him, of which two of them are set to the 
default addresses for billing and shipping. The addresses for billing and shipping can point to the same object.

### Order addresses

An order also has both a shipping and billing address assigned to it. They can point to the same address object, if
shipping and billing address are the same. 

### Quote addresses

Quote addresses are created when a customer asks for shipping information (tariff) for a quote. 
Usually, providing a country or state is sufficient to get this information. As a result, 
Magento is producing a lot of invalid or incomplete address objects for quotes. It is 
therefor advised to validate quote addresses before using them. 

The following example code will check if a quote has an address with street and city information: 

```
{$address = $quote.billingAddress}
{if $address.street|empty or $address.city|empty}
    No address
{else}
    {$address.street}, {$address.city}
{/if}
```

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

[customer-object]: magento-integration/object/customer
[order-object]: magento-integration/object/order
[quote-object]: magento-integration/object/quote
