# Inline CSS

The style (CSS) of your email is normally placed in the header of your HTML document, 
however some email clients strip out the email headers, getting rid of the complete style 
sheet of your email and completely ruining your layout. 

To avoid this SMTPeter gives you the option to automatically inline 
all CSS. This will add the styles in your head to each corresponding HTML tag in 
your email document. 


Example:

```html
<head>
    <style>
     td {
        width: 100%;   
     }
    </style>
</head>

```

Turns into:


```html
<td style="width: 100%;"></td>

```


## Enabling inline CSS using the SMTP API

There are two ways to enable SMTPeter's inline CSS faeture when using the 
SMTP API. The first one is to go to your SMTPeter dashboard and 
[create a new SMTP login](copernica-docs:SMTPeter/dashboard/smtp-credentials) 
when creating this new login make sure to tick the box next to inlinecss to 
enable the feature. You can also enable other features for the same login by 
checking the boxes next to those features. 

The other way to inline css is by adding the following 
special SMTPeter MIME header:

```
x-smtpeter-inlinizecss:   true
```

## Enabling inline CSS using the REST API

Enabling inline CSS for the SMTPeter REST API is simple. All you have to do 
is add the following variable to your POST/JSON request:

```
"inlinizecss":      true
```



 > **Note:** If you use the `"mime"` property 
in the REST API you can also add these headers to your MIME there. However, this is 
not recommended, it is much easier to use the 