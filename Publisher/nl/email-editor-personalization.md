# Personalisatie

In Copernica werkt personalisatie door middel van de scripttaal Smarty. Hiermee is het mogelijk om mailings, webpagina's, SMS-berichten en PDF-bestanden te personaliseren op basis van (sub)profielgegevens. Je herkent Smarty-code aan het gebruik van accolades en het dollarteken.

Voor het personaliseren van (sub)profielgegevens gebruik je de Smarty-code *profile* of *subprofile*. Die code combineer je met de naam van het veld in de desbetreffende database of collectie. Bijvoorbeeld:

- {$profile.Voornaam}
- {$profile.Email}
- {$subprofile.Email}

### Meer informatie:
- [Personalisatie binnen drag-and-drop-templates](./email-editor-personalization-variables.md)
- [Personalisatie binnen HTML-templates/-documenten](./publisher-personalization-variables)
- [Smarty-personalisatie](./smarty)

### Overige artikelen:
- [Functies](./smarty-personalization-functions)
- [Modifiers](./filter-data-with-smarty-modifiers)
- [Extra personalisatievariabelen](./extra-personalization-variables)
- [Loadprofile en loadsubprofile](./loadprofile-and-loadsubprofile)
