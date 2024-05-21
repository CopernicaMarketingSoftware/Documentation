# Personalization

In Copernica, personalization works through the scripting language Smarty. This makes it possible to personalize mailings, web pages, SMS messages and PDF files based on (sub)profile data. You recognize Smarty code by the use of curly braces and the dollar sign.

To personalize (sub)profile data, use the Smarty code profile or subprofile. You combine that code with the name of the field in the relevant database or collection. For example:
- {$profile.Voornaam}
- {$profile.Email}
- {$subprofile.Email}

## More information:
- [Function](personalization-functions)
- [Modifiers](personalization-modifiers)
- [Extra personalization variables](extra-variables-for-follow-ups)
- [Loadprofile and loadsubprofile](loadprofile-and-loadsubprofile)
