# Personalization modifier: *base64_encode*

The *base64_encode* modifier can be used to encode a variable in Base64. 
Base64 is a generic term for encoding schemes that treat binary data numerically 
to translate into base 64 encoding. It is commonly used to transfer binary 
data over media designed to deal with textual data, to ensure the data will 
not be modified.

## Example

Let's say we have the binary $identifier "01010101010011". We can now 
convert it to base 64.

    {$identifier}
    {$identifier|base64_encode}
    
The result looks like this:

    01010101010011
    MDEwMTAxMDEwMTAwMTE

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [md5 modifier](./personalization-modifiers-md5)
* [sha1 modifier](./personalization-modifiers-sha1)
