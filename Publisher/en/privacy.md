# Privacy

Privacy is an important topic in the digital world we live in, because 
everyone relies on technology that collects more data about us every day. 
Managing the data of your customers well is important to the trustworthiness 
of your company, so Copernica wants to make this as easy as possible for you.

## GDPR

The GDPR, or General Data Protection Regulation, protects the data of citizens 
of the European Union. It gives individuals a right to know what personal 
data is stored on them and to access and correct this data. According to the 
regulation all data stored should be relevant to the goal of the organization 
storing it and data that has become irrelevant should be deleted in a timely 
manner. As a customer of Copernica you have to comply with these regulations.

## Retrieving personal data

In the Marketing Suite you can retrieve the data of a (sub)profile or 
email address by navigating the GDPR tab in the **Configuration** menu. 
You can also retrieve data using our [REST API](./rest-api).

### Retrieving personal data with the REST API

Copernica's [REST API](./rest-api) offers the option to retrieve all data 
stored on an email address, profile or subprofile. To retrieve the data 
you submit a request for the data of a (sub)profile or email address first. 
You can choose to send the data directly through an email or a POST call 
to a web address. If you do not wish to use these methods you can use 
other API calls to retrieve the status of your request and download the 
data when ready. You will find all relevant API calls below:

* [Data of a data request](./rest-get-datarequest)
* [Data request for an email address](./rest-post-email-datarequest)
* [Data request for a profile](./rest-post-profile-datarequest)
* [Data request for a subprofile](./rest-post-subprofile-datarequest)
* [Data from a data request](./rest-get-datarequest-data)
* [Status of a data request](./rest-get-datarequest-status)

## More information

Need some more information about data storage at Copernica or do you want 
to know how our API works? The articles below will help you on your way.

* [Database management](./database-introduction)
* [Introduction to the REST API](./rest-introduction)
