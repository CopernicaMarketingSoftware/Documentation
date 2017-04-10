# Personalization functions: assign

The {assign} function is used to assign a value to a variable, which 
you can then use later. You can assign a variable in two ways:

`{assign var="name" value="Bob"}`
`{assign "name" "Bob"}`

They behave exactly the same, because the second example is just a shorter 
way to write the same thing.

Now that we have assigned the name of the recipient we can use it in an 
email!

    Hello {$name},
    
    This email is especially for you!
    
If you want to include larger blocks of text or other elements you might 
want to use the [capture](./personalization-functions-capture) or 
[rawcapture](./personalization-functions), as they are more suitable for 
this purpose.
     
## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Capture function](./personalization-functions-capture)
* [Rawcapture function](./personalization-functions-rawcapture)
