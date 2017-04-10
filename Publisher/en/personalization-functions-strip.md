# Personalization functions: strip

The *strip* function removes white space from the template, which often 
interferes with HTML output. It is useful for adding spacing to your 
template code to keep it more readable, while not negatively affecting 
the layout.

## Example

The following example shows how to use the function. It was taken from 
the [Smarty documentation](http://www.smarty.net/docs/en/).

    {strip}
    <table border='0'>
     <tr>
      <td>
       <a href="{$url}">
        <font color="red">This is a test</font>
       </a>
      </td>
     </tr>
    </table>
    {/strip}
    
This puts the HTML tags into one long line to convert to your actual email. 
Make sure you do not have plain text at the beginning or end of any line 
you plan to run, because the results might be different than expected.

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
