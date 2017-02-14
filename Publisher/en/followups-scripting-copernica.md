# `copernica` variable

`copernica` variable gives access to data available on the account level. That means
that data accessed via this variable will be available in all scripts inside
one account.

`copernica` variable exposes `data` property. This property is an object. It can
be freely used by the user to store custom data inside it. Any primitive, array
or object can be stored inside it. Data assigned to this object will be stored
inside Copernica servers and the next time script will access `data` property
it will have all previously assigned data.

It's impossible to store functions inside data object. An attempt to store a
function inside it will result in removal of the function.

## An example

Let us say that you want to inform users that there is a huge sale in your big
web store. You want to compose a couple of emailings to customers with different
interests, but you want to have a special offer for first 1000 customers that
click a link from an email. These 1000 special offers should be counted for
the whole store.

You want to write following script:

```
// check if we are reaching special sale limit
if (copernica.data.special_sale_count < 1000)
{
    // is customer already a special sale customer?
    if (profile.data.special_sale_customer == false)
    {
        // increase the special sale counter
        copernica.data.special_sale_count += 1;

        // mark profile as one that participated in special sale
        profile.data.special_sale_customer = true;
    }
}
```

Above script can be copy-pasted into `data-script` attributes inside multiple links
across multiple templates. And it will use same variables every time it's clicked.

How does it works? Above script will do 4 things:

 *  Will check if we reached the limit of special save. This will use a variable
    that is set for the whole account. So, all templates and all mailings will receive
    same data. If we are not reaching the limit script will proceed to next step.

 *  Will check if the current customer already clicked such link. `profile` variable
    will be different for each recipient. So, we can check if the recipient already
    clicked special offer link inside same email message or other email message
    that was sent to him. If he didn't then the script will proceed to the next step.

 *  Increase the special sale count. `copernica.data.special_sale_count` is a
    account wide variable, so all links and all emails will share this variable.
    After that proceed to the next step.

 *  Mark profile associated with recipient as one that should be allowed to use
    special discount.
