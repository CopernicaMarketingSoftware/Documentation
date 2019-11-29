# Personalization

MailerQ can personalize email messages on the fly. If you add an extra
"data" property to the input JSON, MailerQ treats the subject line
and the text and HTML versions of your mime messages as templates, and
replaces all variables in them with the values from the JSON "data" 
property. You can use these values in the "from" and "to" address too.

````json
{
    "recipient": "john@example.com",
    "mime": "....",
    "data": {
        "ourname": "The MailerQ test team",
        "name": "John Doe",
        "age": 33,
        "job": "programmer",
        "children": [
            "Peter", "Angela", "Brandon"
        ]
    }
}
````

If you use the above JSON data for your mail, you can use these variables inside the "from" and "to" address, the subject line, and inside the text and HTML versions
of your email.

````mime
From: {$ourname} <info@example.org>
To: {$name} <{$recipient}>
Subject: Hello {$name}!
Content-Type: text/plain

Hi {$name},

Your age is {$age}, and your job is {$job}.

Cheers,

{$ourname}
````

If you had used the above MIME as input, MailerQ would replace the variables
in the "from", and "to" address, the subject line and the text and HTML
versions. For ease of use the "envelope" and "recipient" are already
extracted from the mail for you. In case you don't want to personalize at all
because your body has to contain {$name} for example, you can disable personalizing
by omitting the data property entirely.

Read our [programming page](personalization-programming) if you want to
know more about how to use the personalization capabilities.
