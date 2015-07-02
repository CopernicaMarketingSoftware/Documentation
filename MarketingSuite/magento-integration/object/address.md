# Address object

Address object represents a specific location in the world. Usually a billing or
shipping address. Can be assigned to customer, order or quote. Thus there may
be a situation when two address object can have same ID (one comming from 
customer other from order). 

## Personalization properties

- _number_ **ID**
- _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_ **customer**
- _string_ **street**
- _string_ **city**
- _string_ **zipcode**
- _string_ **state**
- _string_ **country**
- _string_ **phone**
- _string_ **fax**
- _string_ **company**
