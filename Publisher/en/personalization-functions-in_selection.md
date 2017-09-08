# Personalization functions: in_selection

The *in_selection* function can be used to check if a given profile 
is in a specific view. This function is developed by Copernica and 
allows content to be placed specifically for selections in your database. 
If you run a webshop, you can make selections based on information about 
the customer and these can be used to personalize. You can, for example, 
send a woman only women's clothes, or kids clothes if you know she has kids.

To execute the function at least a view is required (selection id or miniselection id). A profile may 
be given too, but the function will attempt to retrieve the profile you're 
personalizing for, if it is not specified.

## Example

    {in_selection selection=145}
        { Display your content here! }
    {/in_selection}
    
    {in_selection miniselection=54}
        { Display your content here! }
    {/in_selection}
    
If you make yourself familiar with these two functions, you can make very relevant 
mailings for everyone.

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [in_selection function](./personalization-functions-in_selection)
