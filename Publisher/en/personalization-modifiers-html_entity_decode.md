# Personalization modifier: *html_entity_decode*

The *html_entity_decode* modifier is the opposite of the [escape modifier](./personalization-modifiers-escape). 
It uses PHP's [html_entity_decode function](http://php.net/manual/en/function.html-entity-decode.php).

## Example

Let's say we have a sentence that was escaped, but we want to bring the 
HTML tags back. Lets says the $sentence is "I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now". 
We use the following code for the modifier.

    {$sentence}
    {$sentence|html_entity_decode}
    
The output looks like this:

    I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now
    I'll "walk" the <b>dog</b> now

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
