If a profile is edited drastically by mistake, it may be wise to perform
a rollback. A rollback is a recovery of old data to a profile or
subprofile. It is possible to rollback to the data set of a specific
date and time. But you can only perform rollbacks per individual
profile.

![Rollback profile](../images/rollback.png)

the rollback function is found in the lower toolbar in the History tab
of the profile.

To perform a rollback, select the profile from the database. Go to
**History** and press the button '**Rollback profile**' in the lower
corner. You'll see the current data in the upper window and old data in
the lower. Change the date and/or time and use '**refresh**' to look at
a different old data set. Press **rollback** to retrieve the old data.

-   You can rollback as far as the creation of the (sub)profile.
-   You can only recover the (sub)profile in its entirety. It is not
    possible to do so for just certain parts.
-   Fields that did not exist yet in the old data are unaffected, their
    values remain unchanged.
-   Fields that no longer exist are ignored, you won't retrieve database
    fields.

### **Undo rollback**

The rollback is registered as a new change to the (sub)profile.
Therefore you can also undo the rollback by performing another rollback.
By doing so, you'd be rolling back to the time before your first
rollback.

### Rollback multiple profiles

This action can only be performed on individual profiles. It is not
possible to rollback multiple profiles, profiles from a selection or a
complete database.
