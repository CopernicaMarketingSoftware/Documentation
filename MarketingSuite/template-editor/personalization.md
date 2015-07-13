# Personalization
Emails created with the MS template editor can of 
course be personalized with data about your subscribers. For example to start 
your email with `Hi James`, instead of `Hi Mr or Miss Anonymous`.

To write and process personalization, we use our own inhouse created [SmartTPL](https://github.com/CopernicaMarketingSoftware/SMART-TPL), 
which has a syntax based on the widely known [Smarty Templating Engine](http://www.smarty.net/). 

## Where can I use personalization?
You can include personalization code in the email template itself, and in all 
input fields that have that dollar sign ($) on the right.

Documentation about our SmartTPL Personalization engine is in the making, 
but since the syntax is 99% similar to Smarty personalization, you can also take
a look at our [old documentation](https://www.copernica.com/en/blog/personalize-campaigns).

Do note that unlike in the old environment, the new template editor requires you to always
specify if the personalization is referring to a profile or subprofile. This means that
instead of `{$FirstName}` you will have to write `{$Profile.FirstName}`. Subprofile data can be accessed by adding `{$subprofile.FieldName}` to your personalization. 
