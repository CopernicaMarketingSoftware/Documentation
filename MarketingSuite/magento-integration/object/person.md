# Person object

A person represents a 'real world' person. Magento itself doesn't have such a concept; the `person` object only exists inside Copernica. The person object is comprised of various other objects (customer, order, quote, guest, subscriber).

Copernica uses the the email address stored in these objects to build a rich profile about a customer, which
is stored in and accessible via the person object.  

Example, when someone registers on your website, or places an order for the first 
time, a new person record will be created, and the data known about this person 
will be stored in it. Months later, this same person can decide to do another 
purchase but now as an anonymous guest, using the same email address. For Magento 
internally, those are two seperate users. Copernica however, will link together 
those two entities based on the provided email address and merge them into one 
single object: a person. 

Information inside the person object is always the most recent information that was received
by MarketingSuite. When new data is synchronized with Marketing Suite changes to 
person object are automatically applied. Outdated information will be discarded.

## Persons, guests and customers

A single person can be linked to a single customer. However, a single person can have
multiple guest objects assigned to it. This is because of how guests are created.
For every order placed as a guest a new guest object will be created in Magento. If these guest orders 
were placed with the same email address, Copernica will automatically combine these guest 
orders into one single person object, supplemented with data already known about this person. 
Of course, the individual guest orders remain in tact and can still be accessed via the `guests` property. 

## Personalization properties

| Property name   | Property type                                                                                        | Description                                                                                  |
|-----------------|------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------|
| email           | _string_                                                                                             | Person's email address.                                                                      |
| firstname       | _string_                                                                                             | Person's first name.                                                                         |
| prefix          | _string_                                                                                             | Person's prefix.                                                                             |
| middlename      | _string_                                                                                             | Person's middle name.                                                                        |
| lastname        | _string_                                                                                             | Person's last name.                                                                          | 
| gender          | _string_                                                                                             | Person's gender. 'male' or 'female' are expected. When unknown FALSE value will be returned. |
| customer        | _[Customer](MarketingSuite/magento-integration/object/customer)_           		                 | Customer object assigned to person.                                                        | 
| webstore        | _[Webstore](MarketingSuite/magento-integration/object/webstore)_                        		 | Webstore object assigned to person.                                                        |
| orders          | _collection of [Order](MarketingSuite/magento-integration/object/order)_ 		                 | Collection of all person's orders. Placed as customer or guest likewise.                     |
| quotes          | _collection of [Quote](MarketingSuite/magento-integration/object/quote)_             	 	 | Collection of all person's quotes.                                                           |
| guests          | _collection of [Guest](MarketingSuite/magento-integration/object/guest)_             		 | Collection of all guest objects assigned to person.                                        |
