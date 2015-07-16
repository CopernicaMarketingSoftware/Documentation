# Address object

The object 'address' contains information about a specific location in the world. A [customer](copernica-docs:MarketingSuite/magento-integration/object/customer)
can have one or multiple addresses assigned to it. They can be managed both by customer 
himself and by Magento administrator. Each [customer](copernica-docs:MarketingSuite/magento-integration/object/customer)
can also have default billing and shipping address.

Additionally, [orders](copernica-docs:MarketingSuite/magento-integration/object/order) 
have both billing and shipping address assigned to them. They may differ from 
ones that can be fetched from [customer](copernica-docs:MarketingSuite/magento-integration/object/customer)
object.

[Quotes](copernica-docs:MarketingSuite/magento-integration/object/quotes) can 
have assigned shipping or billing address. That happens when user asks for estimate
of total price or shipping costs.

## Personalization properties

| Property name   | Property type                                                                   | Description                               |
|-----------------|---------------------------------------------------------------------------------|-------------------------------------------|
| ID              | _number_                                                                        | Original address ID.                      |
| customer        | _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_ | The customer that address is assigned to. |
| street          | _string_                                                                        | The name of the street.                   |
| city            | _string_                                                                        | The name of the city.                     |
| zipcode         | _string_                                                                        | The zip code.                             |
| state           | _string_                                                                        | The state.                                |
| country         | _string_                                                                        | The country.                              |
| phone           | _string_                                                                        | The phone number.                         |
| fax             | _string_                                                                        | The fax number.                           |
| company         | _string_                                                                        | The company name.                         |
| isBilling       | _boolean_                                                                       | Is address a billing address?             |
| isShipping      | _boolean_                                                                       | Is address a shipping address?             |
