# FAQ

Of course you have questions. Can't find the answer you are looking for on this page? Please send an email to [info@responsivemail.com](mailto:info@responsiveemail.com)

### What is a responsive email?

Emails are opened on all sorts of devices in all sizes. By making an email responsive, most importantly, the email will adapt itself to the screensize dimensions of the device it is opened with. This significantly improves the readability of your emails. Lots have been written on this subject already, and if you want to learn more, we encourage you to read the article [Can Email Be Responsive?](http://alistapart.com/article/can-email-be-responsive) on A list apart (the website that allegedly first coined the term Responsive web design).

### Who is the ResponsiveEmail.com API for?

This API is for anyone that can write JSON, wants to send large volumes of responsive emails, and doesn't want to bother with all the tedious testing that is normally involved in the process.

### Does anything I POST to the ResponsiveEmail API return a fully responsive email?

Yes. As long as you send valid JSON and limit yourself to the basic properties available in the API. You can and may of course also include custom CSS properties, but from the point you're adding those, we cannot guarantee anymore that your emails always render as you intended.

### What about personalization?

Personalization is fully implemented. Check out our documentation how you can [include personalization](/documentation/JSON/personalization "Responsive Email API documentation"). Remember: personalisation improves conversion!

### Is it fast?

Is the pope a catholic? Of course it is fast. The application is written in native C++ and hosted on the fastest servers around. We can return your HTML document whilst you are entering your JSON.

### I am a master in writing responsive HTML. Should I be using this API?

Well, we will not force you to do so. But it can save you a lot of time.

### Should I be writing plain JSON?

It’s a possibility. But you can also think of writing a program which generates these documents for you. Or you can use our drag and drop template editor, which makes use of this same API. This editor will be made available via this website soon.

### Why did you create this API?

We are a company ([Copernica](https://www.copernica.com/en "Copernica Marketing Software")) with more than 10 years of experience in building high standard email marketing software. For the email template editor we are currently working on, we needed a library that can parse the JSON spit by our editor, to genuine HTML code suitable for emails. And so we created it. And then we thought: 'Hey, now that we have created that software, why not build an API around it, so anyone can use it!' And so we did...

### Can you also send the emails for me?

Yes, we can do that for you in the near future. In the meantime, you can checkout our powerful MTA [MailerQ](http://www.mailerq.com "MailerQ - High performance Mail Transfer Agent") and try it for free.

### Okay, I like the idea of an API and JSON, but really, I want to drag and drop the design of my emails.

We are building a [drag and drop editor for responsive emails](https://www.copernica.com/en/blog/copernica-working-on-drag-and-drop-editor "The Copernica Drag 'n Drop editor"), which will also be made available on this website soon.

### Which browsers, clients and devices are you supporting?

Emails generated with the API have been tested on all common clients and browers. If you do not include advanced CSS properties in your JSON we can quarantee that all your subscribers see your email the way you intended.

### I am a PHP / Python / Ruby / .NET / Pascal / programmer. Can I use the API?

Of course you can. The API works with any programming language, as long as it can produce valid JSON objects and send it to our API.
