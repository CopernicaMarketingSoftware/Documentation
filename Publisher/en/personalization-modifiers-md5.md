# Personalization modifier: *md5*

The *md5* modifier calculates the md5 hash of a string. It is based on 
php's [md5 function](http://php.net/manual/en/function.md5.php).

## Example

A $word "apple" can be encoded into 
md5 with the following code:

    {$word}
    {$word|md5}
    
The output looks like this:

    apple
    1f3870be274f6c49b3e31a0c6728957f

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [base64_encode modifier](./personalization-modifiers-base64_encode)
* [sha1 modifier](./personalization-modifiers-sha1)
