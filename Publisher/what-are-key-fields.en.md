A key field is a field or a set of fields of a database which together
form a unique identifier for a database record (a profile or a
subprofile). Typical fields suitable to use as a key field include the
profile ID, a customer number or email address.

You may be asked to choose a key field in the following places:

1.  **When updating a database through an import**\
     The key fields are used to check each existing profile against the
    import file and connect them if there is a match.
2.  **In some (Content) web forms**\
     For example in a login form, both the username and passwords can be
    set as key fields. Together they form the unique identifier,
    enabling the system to link the person that is trying to login with
    a profile or a subprofile in the database.

A key field is not set in the database. When you set up an import, or
edit the fields of your web form, you choose the key fields suitable for
this particular import or web form.
