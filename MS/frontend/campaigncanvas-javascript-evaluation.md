This box can be used to create a custom behavior. Write javascript in the for
below to define your own logic. You can use all variables available for
the [*data-script*][data-script] attribute.

When the javascript is defined, this box can also outgoing connection attached
to it. When the box is evaluated returned value will be passed to the outgoing
connections. Each of these connections can decide if the next box will be
processed with a simple comparison. If the comparison is fulfilled then
the next box will be processed.

If you don't want to take care about the outputs use execution box.

[data-script]: https://www.copernica.com/en/documentation/followups-scripting
