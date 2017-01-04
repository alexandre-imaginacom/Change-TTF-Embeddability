# Change TTF Embeddability

This is a short php script that loads all TTF fonts in the same folder, and changes the "Font Embeddability"
from "Restricted" or "Preview/Print" or anything else, to "Installable".

## Why?

This is useful when you want to use online tools (like FontSquirrel) to convert fonts that 
you may want to use as WebFonts. These online tools refuse to work on font files that are not Installable.

Please, remind that this code provides a way to change the 'Flag' from the file.
This does NOT gives you the license for anything. Use it at your own discretion.

## How to use

* Move the TTF you want to modify to the same folder as the PHP Script.
* If you're on Windows, right click the TTF file and choose Properties.
* Go to "Details" tab, and read "Font embeddability" property.
* If it's anything else than "Installable", close that dialog and run the PHP Script provided here.
* Script will output the progress.
* Check the "Font embeddability" property again, and it should appear as "Installable".

**BE AWARE: When you execute the script, ALL TTF FILES IN THE SAME FOLDER WILL BE MODIFIED.**

## Motivation

This was created for personal non-comercial purposes.
Code has been converted from a C version that is also available somewhere else (not here).

## Is this project still alive?

No. I can't spend any time making this any more user-friendly.
If you want to take the ownership of this repository, contact me.

## Requirements

It was designed for PHP 5.3, but it should work in all PHP versions.

## License

I don't care at all. Good luck!

