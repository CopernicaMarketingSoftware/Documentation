The **File** tab in the export dialog allows you further configure how
your data should be exported. The default settings are the most common
export settings.

### Filename and file type

Choose the name of the file and to which type of file you wish to
export.

### Delimiter

The "divider" character, mostly a *tab*, between separate fields in
database records. It is a special character that indicates a record or
field boundary within a text file, rather than being interpreted as an
actual part of the text itself.

Use **extra quotes** if you have errors in your export file caused by
tabs or other characters that are used inside database records and that
might interfere with the used field delimiter. In most cases this can be
resolved with quotes to define the field boundary.

### Encoding

Choose the encoding of the export file. Character encoding specifies the
way in which symbols are mapped onto bytes, e.g. in the rendering of a
particular font or special characters (like Chinese symbols). For
Anglo-Saxons countries, UTF-8 encoding is most common (and therefore
pre-selected).

When using UTF-8, optionally select ‘With BOM (Byte order mark)’ to
indicate that the encoding is UTF-8 rather than something else (some
decoding machines might need this). Leave this option blank if you do
not know what it means.

### Compression

If your export file tends to become very large, it might be useful to
let the system compress the file right after generating it. The file
size will significantly reduce, which makes the download or delivery
faster. To extract the ZIP file after downloading, right click on the
file in windows explorer and select "extract all". This will open the
extraction wizard. For Mac users: double click the file. The file will
automatically be extracted.

### Date notation

If desired, the system can automatically convert all dates from your
database to other date formats. This can be useful if you wish to import
your file into a different system that accepts a different date+time
notation.

Copernica uses YYYY-MM-DD hh:mm:ss
