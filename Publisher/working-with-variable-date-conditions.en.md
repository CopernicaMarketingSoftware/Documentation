With date selections you can select profiles based on a fixed date or on
a variable date. Selections based on a variable date can contain
different profiles every day. This article provides examples of commonly
used settings.

![](Documentation/untitled.png)

### What is flooring?

Flooring means that the date will be rounded downwards to the nearest
time unit.

-   2013-02-25 13:03:27
-   2013-02-25 13:03:00 (floor to full minutes)
-   2013-02-25 13:00:00
-   2013-02-25 00:00:00
-   2013-02-00 00:00:00
-   2013-00-00 00:00:00 (floor to full year)

### today

-   The date in the field 'datefield', must be after 0 days ago (floored
    to days).
-   The date in the field 'datefield', must be before 0 days ago
    (floored to days).

### yesterday

-   The date in the field 'datefield', must be after 1 day ago (floored
    to days).
-   The date in the field 'datefield', must be before 0 days ago
    (floored to days).

### day before yesterday

-   The date in the field 'datefield', must be after 2 days ago (floored
    to days).
-   The date in the field 'datefield', must be before 1 day ago (floored
    to days).

### tomorrow

-   The date in the field 'datefield', must be after 0 days in the
    future (floored to days).
-   The date in the field 'datefield', must be before 1 day in the
    future (floored to days).

### the day after tomorrow

-   The date in the field 'datefield', must be after 2 days in the
    future (floored to days).
-   The date in the field 'datefield', must be before 3 days in the
    future (floored to days).

### last 7 days

-   The date in the field 'datefield', must be after 7 days ago (floored
    to days).
-   The date in the field 'datefield', must be before 0 days ago
    (floored to days).

### 10 days in the future

-   The date in the field 'datefield', must be after 10 days in the
    future (floored to days).
-   The date in the field 'datefield', must be before 11 days in the
    future (floored to days).

### birthday

Selects profiles who are born on this day, in any year

-   The date in the field 'datefield', must be after 0 days ago (floored
    to days).
-   The date in the field 'datefield', must be before 1 day in the
    future (floored to days).
-   (the year does not have to be the same)

