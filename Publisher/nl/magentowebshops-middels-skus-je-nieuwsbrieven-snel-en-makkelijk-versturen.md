![Inladen van producten middels
SKU's](../images/sku_magento_product.JPG "Inladen van producten middels SKU's")
Heb je een Magentowebshop? Ben je op zoek naar een manier om snel en
makkelijk je nieuwsbrieven te vullen met producten zonder teksten en
afbeeldingen te moeten copy/pasten? Dit artikel zal je enorm op weg
helpen.

Inladen van producten in je nieuwsbrief uit je Magentoshop middels SKU's
------------------------------------------------------------------------

Wat ik je ga leren is hoe je met behulp van [extra
personalisatievelden](./extra-velden-voor-document-personalisatie.md "Extra personalisatievelden"),
[Smarty](./smarty.md "Smarty begrip")
en [XSLT](./css-en-xslt-een-korte-introductie.md "XSLT introductie")
middels de SKU's uit je shop zelf kunt kiezen welke producten je in je
nieuwsbrief wilt opnemen. Het doel is dat je uiteindelijk enkel nog het
SKU-nummer hoeft in te vullen in je document waarna je nieuwsbrief
automatisch met de correcte productgegevens wordt gepersonaliseerd en
verzonden. Allereerst ben je er zeker van dat je de [Magentointegratie voor
Copernica](./magento.md "Magentointegratie voor Copernica")
hebt geinstalleerd. Om dit makkelijk te maken voor je heb ik de
bronbestanden ter download beschikbaar gesteld:

-   1. [Download de
    bronbestanden](Copernicacom/sku_resources.zip "Download bronbestanden")
-   2. Pak bovenstaand zipbestand uit en importeer de zipfile
    "Template.zip" in Copernica (onder E-mailings). Kopieer en plak de
    code uit "example\_xslt.txt" in Copernica onder stijl in een XSLT
    sheet (doel RSS met de naam "example\_sku").
-   3. Maak een document aan onder de zojuist geimporteerde
    e-mailtemplate.
-   4. Maak via het menu van het template --\> Extra
    personalisatievelden, drie velden aan met de naam SKU1, SKU2 & SKU3.

Maak nu een nieuw document aan onder je template, open dit document en
ga met je muis naar de knop "Personalisatieinstellingen" links onderin
je document. Vul de velden SKU1, 2 & 3 respectievelijk met de waarden
11, 14 & 22 zoals hieronder.

![Extra personalisatievelden](../images/extra_personalization_fields.jpg)

Klik weg met je muis en refresh je pagina of personaliseer het document.

Het resultaat moet er zo uit zien:

![Eindresultaat](../images/endresult.jpg)

Is het gelukt? Gefeliciteerd! Je kunt nu de URL in de template en de
SKU's veranderen naar dat van je eigen webshop. Niet gelukt? Controleer
dan in je webshop of de feeds aanstaan bij de instellingen.
 **Vragen over dit onderwerp kun je stellen in het
[forum](https://www.copernica.com/nl/forum/topic/13 "Copernica forum").**\
 Aanvullingen? Laat ze gerust hieronder achter.
 **Extra hulpbronnen:**
[De basisbeginselen van Smarty
personalisatie](./smarty.md "De basisbeginselen van Smarty personalisatie").\
 Hulp nodig bij je campagne? [Registered partner
Cream](https://www.copernica.com/nl/partners/profile/4536144) heeft
ruime ervaring in het inrichten van deze oplossing. Een overzicht van
alle partners vind je in ons
[partneroverzicht](https://www.copernica.com/nl/partners/overview/).
