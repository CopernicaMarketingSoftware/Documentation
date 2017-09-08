# Database management

Copernica works with databases that are fully configurable. You can structure 
the database exactly how you wish and [importing](./database-import) and 
[exporting](database-export) data has never been easier.

Copernica databases can be layered, allowing you to for example store 
purchase histories. It's also possible to make [selections](./selections-introduction) 
for segmentation and personalization. Copernica stores a lot of data 
like clicks, opens, bounces and errors. For this exact reason it's also 
important that you structure and update your databases correctly, 
preventing you from creating new databases every now and then. 

## Multiple dimensions

Inside the Copernica database management you find terms like *collection* 
and *subprofile*. In the *purchase history* example, you can create a 
collection of orders. The customer is in this case the *profile* and the 
product is the *subprofile*. You could apply the same principle on for 
example employees of a company or the children from parents.

## Things to consider

The most important thing to consider in your database is the structure. 
You want your database to be clear and effective. It's also possible to 
set up [*rules* and *restrictions*](database-restrictions-and-capabilities) 
to prevent invalid data from entering your system or sending out unintended 
mailings.

## More information 

There is a lot to know about databases, which is why we have documented 
everything you need to know thoroughly. The following articles will help 
you build, maintain and export your databases.

### Configuration

* [Configuring a database](./quick-database-guide)
* [Fields and collections](database-fields-and-collections)
* [Database restrictions and intentions](database-restrictions-and-capabilities)
* [Selections](./selections-introduction)

### Importing, exporting and updating

* [Importing a database](./database-import)
* [Exporting a database](./database-export)
* [Managing databases with the REST API](./rest-api)

### Maintenance and tips

* [Database maintenance](./database-maintenance)
* [Prevent database corruption](./prevent-database-corruption)
* [E-mail reputation](./how-to-build-up-your-email-reputation)
