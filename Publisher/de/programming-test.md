To test the skills of programmers who want to work for Copernica, we
have created a little test. In this test you are asked to create a small
website where a file with personal data can be uploaded, filtered for
doubles and then be downloaded.

Page 1: Upload form
-------------------

The first page of the website contains of a small upload form, that
should look like this:

**Upload a XML file with addresses**

Use the form below to choose an XML file from your hard disk and upload
it to the server. The XML file contains a number of records with contact
data of persons.

**File:**

Example XML file
----------------

Below you'll find an example XML file that you can use to upload to the
form. For testing we use much longer XML files.

    <data>
        <record>
            <name>Copernica</name>
            <address>Wilhelminastraat 1</address>
            <city>Haarlem</city>
            <email>info@copernica.com</email>
            <telephone>+31237510500</telephone>
        </record>
        <record>
            <name>Sofit Wellness</name>
            <address>Wilhelminastraat 1</address>
            <city>Haarlem</city>
            <email>info@sofit.nl</email>
            <telephone>+31237510501</telephone>
        </record>
        <record>
            <name>Other Company</name>
            <address>Example street 11</address>
            <city>Amsterdam</city>
            <email>info@company.nl</email>
            <telephone>+312012345678</telephone>
        </record>
    </data>

Page 2: Error page
------------------

If you have uploaded an invalid file - for example a PDF file instead of
a XML file, or a file that does not contain valid XML, you should be
redirected to a page that looks like this:

**Error**

The file that you uploaded did not contain valid XML code.

[Click here to upload a new file.](# "Click here to upload a new file.")

Page 3: Filter page
-------------------

After a valid file was uploaded, the user is directed to a page where he
can filter the uploaded file and remove all double addresses from it.
With checkboxes he can specify the fields on which the file should be
filtered.

**Remove doubles**

The file that you uploaded contains **12345** records. You can now
remove all doubles from this file. Use the checkboxes to specify the
field or the combinatation of fields that should be unique.

Name

Address

City

Email

Telephone

Based on the checkboxes that you have selected, **345** doubles were
removed and the file now contains **12000** unique records.

In the example above, the numbers '345' and '12000' are dynamic fields.
When an extra checkbox is checked or unchecked, it should automatically
be updated using an Ajax call to find out the number of unique records,
based on the combination of fields that have been selected.

After the submit button is clicked, an automatic download should start
with the new, filtered, XML file.

Points of attention
-------------------

We do not only check if your solution actually **works**, but we also -
and mainly - look at **how** it was **implemented**, like coding style,
the use of object orientation, how you separated programming code (PHP)
and user interface code (HTML, JavaScript), and if you took care of
security: it should of course not be possible to access data that was
uploaded by parallel sessions. We can not stress enough how important it
is to show that you are a capable and experienced software engineer.

We want your solution to work right out of the box. This means that you
should not be using specific frameworks, or make assumptions about our
server configuration. If you need to store files at any location, you
can only do this in the /tmp directory. There is no database available
for storage. The functions from the libxml and libxslt libraries are
available in PHP (simpleXML, xsl, DOM, XML Parser, XMLReader and
XMLWriter).
