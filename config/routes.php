<?php
/* Routes and redirects file
 * Use this to setup multiple routes to the same page,
 * Or to redirect old pages to new ones.
 * 
 * Keywords for array keys:
 * default = fallback module, if no path is resolved
 */
 
// Required Routes, DO NOT DELETE THESE
$Routes["default"] = "module/PageNotFound";
$Routes["homepage"] = "module/Homepage";

// Custom Routes
$Routes["testuri/pleaseignore"] = "module/home";
?>