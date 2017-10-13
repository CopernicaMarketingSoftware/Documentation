# Getting system data from the profile, template or document using Smarty

It is possible to retreive data from a document or a templatesuch as the document name, or the document creation date,using the available Smarty system variables. The variables are enlisted below. 

### Profile data

    {$profile.id} ID of the profile
    {$profile.code} Access code to change data
    {$profile.interests} Array of interests of a profile
    {$profile.fieldname} Value of a profile field

### Document data

    {$document.id} ID of the document
    {$document.name} Current name of the document
    {$snapshot.name} Name of the document when it was sent (even if the document name was changed later on)
    {$document.created} Time of document creation
    {$document.lastmodified} Time of last modification
    {$document.template} Template object
    {$document.language} Language setting of the document

### Template data

    {$template.id} ID of the template
    {$template.name} Name of the template
    {$template.description} Description of the template
    {$template.pdf} Name of original pdf file
    {$template.pages} Number of pages (PDF templates only){$template.created} Time when a template is created
    {$template.lastmodified} Time when a template is modified
    {$template.archive} Is the template archived?
    {$template.quality} Quality of the template: screen/press/print (PDF templates only)
    {$smarty.version} The smarty version of the template

### Smarty date

 Returns the current time measured in the number of seconds since the Unix Epoch (January 1 1970 00:00:00 GMT).You can use **date_format** to have complete control of the formatting of the date. 

Note: the smarty.now function uses the language of the template or document. The language can be set from the <a href="#">personalization settings menu</a> in the lower toolbar of the document or template.

{$timestamp} returns the (fixed) timestamp on which the document was composed and sent. 

    {$smarty.now|date_format} makes: Dec 4, 2007 
    {$smarty.now|date_format:"%D"} makes: 12/04/07
    {$smarty.now|date_format:“%d-%m-%Y”}   makes: 04-12-2007
    {$smarty.now|date_format:"%A, %e %B %Y"} makes: Tuesday, 4 decembre 2007
    {$smarty.now|date_format:“%A"} makes: Tuesday
    {$smarty.now|date_format:"%c"} makes: Tu 04 dec 2007 15:20:28 CET
    {$timestamp} 
