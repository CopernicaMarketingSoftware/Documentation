A selection is an active filter on the database and only contains
profiles that match the defined condition rules. Selections are always
up-to-date. This article explains how and when selections and
miniselections are being rebuilt.

Every time the selection rules are changed, that selection will
automatically be scheduled for a rebuild. And every time a profile is
changed, or something happens to a profile - like it clicked on a
hyperlink or a mailing was sent to it - that single profile will be
re-checked to see in what selections it belongs. On top of that, there
is a script running in the background that constantly rebuilds all
selections a couple of times during the day.

You may also use the ‘trigger new rebuild’ button to force a new
rebuild. This button however is more or less superfluous because in
normal operations, selections are always updated when something happens
inside a database or collection, or when a mailing to a selection is
queued for sending. This is to ensure that the mailing is sent to the
appropriate group.
