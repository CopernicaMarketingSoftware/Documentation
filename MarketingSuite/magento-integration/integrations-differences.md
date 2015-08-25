# Integration differences

On Magento Connect platform are two different Magento extension. One maintained
by dutch company [Cream](http://www.cream.nl), and other one created by [Copernica](https://www.copernica.com).
Both of them are designed for different things and they react with broader Copernica
platform in different way. 

## Old integration

Old integration was designed to work with publisher database. Cause of that, 
data synchronized with Copernica is converted to profile/subprofile format and 
that, in consequence, is causing lose of data and relations between data.

## New integration

New integration takes new approach to synchronization. Instead of converting data
to fit very general profile/subprofile format, it synchronize data as it is. That
means it not only synchronizes the data but also retains the relations between data.
