# Webstore object

Each Magento installation is structurized with websites, stores and store views.
Those are considered the basic building blocks used to setup a Magento installation. 

The **Magento website** represents the actual website that can be found under given
URL. Each of **Magento websites** can have one or more **Magento stores**. Each 
[Magento product](copernica-docs:MarketingSuite/magento-integration/object/product)
has to be assigned to website to be visible on that website.

**Magento store** should represent an actual store. Instead it represents a part
of a Magento website with the given [category](copernica-docs:MarketingSuite/magento-integration/object/category) or categories. 

To limit amount of products available inside given store. **Magento store** can
have one or more **Magento views**.

**Magento view** is the actual content that is displayed to the user. Usually 
it's used to display different languages or to show a different look and feel based on 
a product category. 

The `Webstore` object aggregates this data into one object. 

[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer),
[order](copernica-docs:MarketingSuite/magento-integration/object/order), 
[quote](copernica-docs:MarketingSuite/magento-integration/object/quote)
and [subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber) 
are linked to **Magento view**

## Personalization properties

| Property name | Property type   | Description                                                 |
|---------------|-----------------|-------------------------------------------------------------|
| ID            | _number_        | Original ID of store view from Magento.                     |
| name          | _string_        | Name of **Magento view** associated with webstore object    |
| group         | _string_        | Name of **Magento store** associated with webstore object   |
| website       | _string_        | Name of **Magento website** associated with webstore object |

## Examples

Using a [customers target](copernica-docs:MarketingSuite/magento-integration/targets/customers) 
to send simple confirmation email:

```
Hi {$customer.firstname} {$customer.lastname},

Your are still a registered customer in {$customer.webstore.website} > {$customer.webstore.group} > {$customer.webstore.name}.

Have a nice day.
```

Will output:

```
Hi John Doe,

You are still a registered customer in Default website > Default group > Default Store View

Have a nice day.
```
