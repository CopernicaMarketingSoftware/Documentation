An email template can be given extra personalization fields. By adding
your own smarty codes, you will be able to create variables for the
documents based on the template.

This function is found under *emailings \> Template* \> **Extra
personalization fields**...

![add personalization fields](extrapersonalizationfields.png)

The extra fields for personalization can be added to the template HTML
source code as follows:

**{\$property.fieldname}**

Replace field name with the name of your own field.

### Example changing the template background color in the document

You may add a personalization field 'background', with standard value
'white'. You can add this in code to the CSS rule that gives a
background colour to a table in your HTML template source code:

`<table  style="background-color:{$property.background};">`

This will give the table a white background color. However, with the use
of the extra personalization variable you can now easily change its
color by changing its property in the documents personalization
settings. You can access the field and change the value to 'blue' or
'red', giving the table an entirely different background colour without
changing the set-up of the template.

When editing the document, you can adjust the extra personalization
fields via the [Personalization Settings](#) menu, which can be found in
the bottom left corner of the document work space. See image below,
where the extra personalization field 'background' is set to black.

![Personalization settings](personalizationsettings.png)

Personalization settings.
