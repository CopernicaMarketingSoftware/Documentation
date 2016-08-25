This article explains how the Abandoned Shopping Cart email works, and
how it can be adjusted to fit your own needs. For this article the
sample data provided in the marketing software is used, and no
connection between Magento and Copenica is further required (except for
the XML feed, which is loaded from a demo Magento account of us).

\
 ![The magento template](thetemplate.png)

**Note:**if you already have your own database, make sure that the field
and collection names used in the template refer to the field and
collection names in your database. 

Load the sample data into your account.

-   Go to **Admin**.
-   Select the account to which you want to load the data.
-   Choose for ‘**Load sample data**’ from the **Account menu**.
-   Choose **Magento database**and hit **Load sample data** to load the
    Magento Sample Database into your account. Once the sample database
    has been imported, you will find the Database ‘Magento’ in the list
    with databases under Profiles.

**In the same dialog you will find the Abandoned Cart template**

Select **Magento template**to load the template into your account.

**The sample database includes:**

-   30 sample profiles.
-   4 collections, of which the collection *BasketProducts* is the most
    important for the abandoned shopping cart mail.
-   Some selections and mini-selections, of which the selection
    *RecentAbandonedCarts* and the miniselection
    *RecentAbandonedProducts* are needed for the Abandoned cart email to
    work.

**The template includes:**

-   The template (*Magento*).
-   A document (Abandoned cart email).
-   An XSLT file (*MagentoProduct*). This file can be found in the
    section *Style*. The XSLT is used to transform the XML Magento
    product feed into HTML.

### Preview the document

To view the operative Abandoned cart email, you need to pick a profile
from the Magento Sample database, and make this your testing profile by
choosing *Test destination* at the profile. You can find this function
below in the profile toolbar on its overview page. It is important that
the test profile has some products available in the collection
*BasketProducts*. To find a profile with *BasketProducts*, just click on
the *RecentAbandonedCart* selection, listed directly under the database
in the left overview.

### How are the selections built

If you have synchronized Copernica and Magento, products put into the
customer’s shopping cart will be automatically added as a subprofile to
the collection *BasketProducts*. Both a miniselection and a selection
are used to create a weekly list of customers for the Abandoned Shopping
Cart mail.

-   A customer is stored as a profile.
-   A basket product is stored as a subprofile in the
    collection *BasketProducts*.

Here is how it works step by step:

1.  A customer puts one or more products from your webshop into his or
    her basket.
2.  Subsequently these products will automatically be included to the
    marketing software as a subprofile in the
    Collection *BasketProducts*. The subprofile field *timestamp* stores
    the timestamp on which the product was added. This timestamp will be
    used to determine if the customer should receive a mail or not.
3.  The miniselection *RecentAbandonedProducts* checks if the
    collection *BasketProducts* contains products that were added in the
    past 7 days (by checking the value from the field *timestamp*.  
4.  If this miniselection contains one or more products, the profile
    will be included in the selection *RecentAbandonedCarts*.

Now, this selection will be used to send the abandoned cart mail to.
Because it checks for profiles with abandoned products in the past 7
days, a weekly scheduled mail will prevent that a customer receives an
email with the same products more than once.

### How is the template built

The template works fairly easy. It loops through the products in the
collection *BasketProducts *of the profile. Each product that has been
found will be displayed in the personalized document. The quantity of a
single product is stored in the basket product profile (in the
field *quantity*). Products with a larger quantity are only displayed
once in the document.

Based on the ID’s of the found products, an XML feed with product
information is loaded directly into the template.

The template also calculates the number of the products (stored in the
template variable *\$productCount)* and the total costs (store in the
variable *\$productSum*).

### How to limit the number of products displayed in the email

The default template has no limit set to the number of products that
will be included in the email. So if the customer has 999 products, 999
products will be included. 

You can limit the number of products by adding a little bit of smarty
code to the foreach loop.

To the existing for each loop, add the parameter **name=BasketLoop**

`{foreach from=$profile.BasketProducts item=subprofile name=BasketLoop}`

Then, place the content of the foreach loop in an if statement .

`{if $smarty.foreach.BasketLoop.index < 2} HTML Code  goes here {/if}`

The smarty function *index* returns the current iteration. So the
content between the opening and closing tag will only loaded if the
current iteration is less than 2. Note that computers start counting at
0, so 3 products will be displayed if the above example is used.

### Also display the total number of products in the basket

If you have put a limit on the number of displayed products, you can
easily make mention of the sum  of products, using the following smarty
code:

***In total, you have {\$BasketProducts|@count} products in your
shopping cart! Go buy them all, you \^%\$&\^!***

This code just counts the number of subprofiles in the
collection *BasketProducts. *If you want, you can use the smarty [math
equation](http://www.smarty.net/docsv2/en/language.function.math.tpl)
function to calculate the number of remaining products (not displayed in
the email).

### The XML and the XSLT

The XML is provided by Copernica and contains product information stored
in Magento, such as the product name, product information and a product
image. This feed is loaded into the template using
the *loadfeed* function (the full feed address is stored in the variable
\$xmlurl). The URL parameter *id* is personalized with the product\_id
from the BasketProducts. Each product that is loaded into the email gets
its own XML feed.

`{loadfeed feed=$xmlurl xslt="MagentoProduct"}`

In the template source code you will find the demo XML address. To use
your own, change the bolded part to your own webshop details.

**http://magentodefault.copernica.com/**index.php/copernica/product/xml/?id=

The XSLT is used to transform the information from the XML to HTML code,
so that it can be read by the browser. You can see / modify the
XSLT **MagentoProduct** in the **Style** section of the software (The
XSLT is included in the sample data).

The default XSLT only parses a selection of the available product
information to the HTML document. You are of course free to use extra
items from the XML, such as *product description* and the *category *of
the product.

More information about XSLT and XML can be found on the W3
website [http://www.w3schools.com/xsl/](http://www.w3schools.com/xsl/).

### Adjusting the selections

As explained earlier in this article, the customers who receive the
email are determined by one miniselection and one selection. The
miniselection handles the products that will be selected (based on the
date in the field *timestamp*). The selection selects profiles who have
at least one product in the miniselection.

You are free to change the current conditions or to add rules to narrow
the filter results. You can for example add a rule to the current
selection to select only customers from a certain store view, and send
them an email with a completely different lay-out. Or only send the
email to customers that have more than 5 products in their basket.

The miniselection can be easily adjusted to select products that have
been in the basket for a month, in case you want to send a monthly email
with abandoned cart products.

To edit and or add selections and miniselection, go to *Database
Management \> Edit selections* which can be found in the **E-mailings**
section of the marketing software.

### Sending the abandoned cart mailing

Send the abandoned cart email as a [weekly scheduled
mailing](http://www.copernica.com/en/support/schedule-a-mass-mailing-for-later-or-send-periodically).
If you want to use a different interval (e.g., once a month), do not
forget to adjust the miniselection *RecentAbandonedProducts* as well.
