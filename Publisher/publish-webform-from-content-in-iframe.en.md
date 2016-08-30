Have you created a web form, and want to publish it on your (external)
website? This can be done using an iframe.

Publish sign-up form
--------------------

The [registration
form](./newsletter-sign-up-form.en.md)
always creates a new profile or modifies an existing profile based on
the key fields designated in the form.

-   Place the web form on a web page Copernica. You use the webform tag
    *{webform name = "name of your web form"}*
-   Make sure you have a (sub) [domain linked to your
    website](./link-domain-to-website.en.md).
-   You can load the web page with the form in an iframe on any external
    site. Use the code:

`<iframe width="500" height="500" src="http://newsletter.yourcompany.com/page"></iframe>`

For more options for the iframe HTML element check
[http://www.w3schools.com/tags/tag\_iframe.asp](http://www.w3schools.com/tags/tag_iframe.asp)

Publish change form
-------------------

A [change
form](./create-change-web-form.en.md) works
with a user already logged in. The user gets logged in as he clicks from
your emailing to your page. This is possible by the information that you
send along in the referring link. To ensure that the form in the iframe
is already prefilled with the data of the users, you also need to add
some JavaScript to the web page containing the iframe. This Javascript
code ensures that the *profile={\$profile.id}&code={\$profile.code}*
information is also passed to the page with the form.

-   [Place the
    form](./publish-your-web-form.en.md) on
    a web page in Copernica
-   Make sure you have a (sub) [domain linked to your
    website](./link-domain-to-website.en.md)
-   Add the following code to the web page where you want to place the
    iframe
-   Replace *http://newsletter.yourcompany.com/page* with the address of
    your webpage in Copernica
-   If you send to subprofiles, replace *profile*with *subprofile*(a
    total of 5 times)

`<script type="text/javascript">`

` window.onload = function ()   { <!-- parameters we will be passing to the frame --> var code = location.search.match(/code=([\d\w]+)/) ? RegExp.$1 : 0; var profile = location.search.match(/profile=([\d\w]+)/) ? RegExp.$1 : 0;`

` var src = "http://newsletter.yourcompany.com/page?";  if(code != 0) src += "code="+code+"&"; if(profile != 0) src += "profile="+profile;`

` document.getElementById('loadedform').src = src; } `

`</script>   <iframe id="loadedform" width="500" height="500"></iframe>`
