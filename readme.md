How to Use
==========

Just clone the project template :)

Framework Structure
===================

About index.php
---------------
This file is the application router, all requests will be processed there. To make your job easyer you can count on some helper methods:

* `get()` - This function takes a string as parameter and returns a boolean, true means that the url matchs the string. The string can also contain params started with `:` that represents a variable piece of url, as a bonus, every param will generate a index in the `$GLOBALS` array. ex: `get('/somepage/:someparam')` when browsed with "/somepage/lorem-ipsum" will allow the variable `$GLOBALS['someparam']` to return "lorem-ipsum".
* `render()` - This function decides which file from the views folder will be rendered in the layout and serve for the invoked url. it takes a string as parameter, ex: `render('somepage')` will respond the browser with the layout, replacing the `yield()` with the content of "views/somefile.php".

About views
-----------
Its pretty simple, every ".php" file here can be invoked in "index.php" via `render()`.

About views/layout.php
----------------------
This is the standard application layout, the html here will appear in all your pages, and the `yield()` will be replaced with the page's content.

About lib
---------
Every folder or file in this directory will be invoked before executing the code in the "index.php", so if you have to use any plugin, just drop it here.
