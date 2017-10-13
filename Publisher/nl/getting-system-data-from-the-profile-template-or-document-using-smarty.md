# Copernica variabelen bij profiel, template of document via Smarty

Het is mogelijk om gegevens te ontvangen van een document of template, bijvoorbeeld de naam van het document, door het gebruik van Copernica Smarty variabelen.

### Profiel gegevens

    {$profile.id} ID van het profiel
    {$profile.code} Verborgen code van het profiel
    {$profile.interests} Array van interesses van het profiel
    {$profile.fieldname} Gegevens van een profiel veld

### Document gegevens

    {$document.id} ID van het document
    {$document.name} Huidige naam van het document
    {$snapshot.name} Naam van het document op het moment van versturen (zelfs als de naam gewijzigd is achteraf)
    {$document.created} Tijdstip van het aanmaken van het document
    {$document.lastmodified} Tijdstip van de laatste wijziging aan het document
    {$document.template} Template object
    {$document.language} Taal instellingen van het document

### Template gegevens

    {$template.id} ID van het template
    {$template.name} Naam van het template
    {$template.description} Beschrijving van het template
    {$template.pdf} Naam van het originele PDF bestand
    {$template.pages} Aantal pagina's van de PDF 
    {$template.created} Tijdstip van het aanmaken van het template
    {$template.lastmodified} Tijdstip van de laatste wijziging aan het template
    {$template.archive} Is het template gearchiveerd?
    {$template.quality} Kwaliteit van het template: screen/press/print (alleen voor PDF templates)
    {$smarty.version} Smarty versie van het template

### Smarty date

    {$timestamp} Geeft het tijdstip terug waarop het document is samengesteld en verzonden 

    {$smarty.now|date_format} makes: Dec 4, 2007 
    {$smarty.now|date_format:"%D"} makes: 12/04/07
    {$smarty.now|date_format:“%d-%m-%Y”}   makes: 04-12-2007
    {$smarty.now|date_format:"%A, %e %B %Y"} makes: Tuesday, 4 decembre 2007
    {$smarty.now|date_format:“%A"} makes: Tuesday
    {$smarty.now|date_format:"%c"} makes: Tu 04 dec 2007 15:20:28 CET
