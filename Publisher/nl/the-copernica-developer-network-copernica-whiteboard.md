Als gebruiker van open source software, wil Copernica graag zijn eigen
steentje bijdragen aan de open source community. Daarom is er sinds kort
het Copernica Developer Network. In deze Copernica Whiteboard sessie
stellen we u graag voor aan Copernica's Developer Network. Ontdek welke
open source libraries u kunt downloaden en wat u er als developer
allemaal mee kan.

  --
  --

Hieronder vindt u de uitgeschreven tekst (in het Engels):

Welcome to this new whiteboard session of Copernica. I am Ronald Baltus
and I will tell you something about the [Developer
Network](https://www.copernica.com/nl/blog/developer-network "Developer Netwerk").

The Developer Network contains our new open source libraries because we
want to contribute to the open source community as we use open source
ourselves. Another goal of the Developer Network is to improve the
quality of the source code because it is publicly audited. This will
also help improve the quality of our documentation which is not only
better for ourselves but also for the community. By splitting up our
source code in different libraries, it will also be easily maintainable
for ourselves.

First I will introduce you to the libraries.

Our first library is the PxActiveObjectCache. The PxActiveObjectCache is
used to collect all different instances of objects and will throw away
objects that are not used anymore. It's a kind of 'garbage'-collection
and easy maintenance of object instances in big projects.

We also have the PxCollections. which is a library used by our
PxActiveObjectCache. PxCollections is an traversable object which can be
accessed like an array in PHP. It's a small library and it's easy to use
and you're not forced to implement all the functions required by PHP.

Next we have the PxDocBlock. The PxDocBlock reads the DocBlocks found on
top of each function and classes in the PHP files. The PxDocBlock is
also used by the Developer Network itself to show the documentation. We
write the documentation inside the DocBlocks of the classes.

Next we have the PxEvent. PxEvent allows the developer to create an
event driven application. Like you normally see in Javascript. And it is
based on the observer pattern.

And the last library and not the least is the PxReflection. PxReflection
is an extension to the PHP Reflection and uses PxDocBlock itself and it
allows us to modify our documentation from the Developer Network site
itself. PxReflection allows us to change source code, update source
code, read the DocBlocks, which classes are defined in files, etcetera.

All of our libraries are available under the new BSD License. This
license allows you to modify, distribute under commercial or
non-commercial ways.

Also, if you have a great improvement for us (think you can do better?),
we would love to see it. That's it for today, thank you for watching and
see you at the next whiteboard session.
