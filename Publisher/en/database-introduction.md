# Database management
Copernica does not use adress lists, but instead
works with fully configurable databases which you can structure
exactly as you wish. [Importing](./database-import) and
[exporting](database-export) data is also very straightforward.

Copernica databases can be layered, allowing you to, for example, store
purchase histories. It is also possible to make [selections](./selections-
introduction) which can be used for the segmentation and personalization of
your email campaigns.
Copernica stores a lof of data about the behaviour of your profiles,
such as clicks, opens, bounces and errors. In other marketing software,
people often keep their mailing lists separate, but this would make our
behaviour tracking ineffective. We therefore advise you to always update your
existing databases, instead of periodically creating new ones.

## Multidimensional databases
Inside the Copernica database management you find terms like *collection*
and *subprofile*. These terms are related to our multidimensional database
model, which allows you to keep multiple records about profiles in your
database. For example, when keeping track of a profile's purchase history,
you can create a collection called *orders*. The customer is in this case the
*profile* and the product this profile ordered the *subprofile*. You could
apply the same principle on for example employees of a company.

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
* [Database restrictions & intentions](database-restrictions-and-capabilities)
* [Selections](./selections-introduction)

### Importing, exporting and updating
* [Importing a database](./database-import)
* [Exporting a database](./database-export)
* [Managing databases with the REST API](./restv2/rest-api)

### Maintenance and tips
* [Database maintenance](./database-maintenance)
* [Prevent database corruption](./prevent-database-corruption)
* [E-mail reputation](./how-to-build-up-your-email-reputation)
