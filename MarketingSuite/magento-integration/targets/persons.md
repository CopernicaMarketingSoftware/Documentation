# Magento persons list

Persons list is Copernica specific list. Each entity from that list will be build
of compiled information about certain person. What does that mean? For example, 
when we have a customer that registers for it's first order giving additional 
informations like address, a new person is created. Later on that user can 
decide to make a purchase as a guest. Internally for Magento those are two 
separate users. Thus, when we see that email addresses are the same we can 
assume that they are the same person. 

Information about that user will be compiled to present most recent ones.

Each mailing target is a [Magento Person](#/menu/documentation/magento/person)

Persons list can have following filter options:
* **First name**
* **Middle name**
* **Prefix**
* **Last name**
* **Email address**
* **Gender**
* **Subscription status**
* **Web store**
