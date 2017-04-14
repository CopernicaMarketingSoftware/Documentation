# Personalization modifier: *sha1*

The *sha1* modifier calculates the sha1 hash of a string. It is based on 
php's [sha1 function](http://php.net/manual/en/function.sha1.php).

## Example

A $word "apple" can be encoded into 
sha1 with the following code:

    {$word}
    {$word|sha1}
    
The output looks like this:

    apple
    d0be2dc421be4fcd0172e5afceea3970e2f3d940

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [base64_encode modifier](./personalization-modifiers-base64_encode)
* [md5 modifier](./personalization-modifiers-sha1)
