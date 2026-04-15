<?php

function basePath(string $path): string {
    return __DIR__ . '/' . $path;
}
/** 
 * load * Partials
 * 
 * @param string $name
 * @return void
*/

function loadView ($name) {
    require basePath("Views/partials/{$name}.php");
    $partialPath = basePath("Views/Partials/{$name}.php");
        if (file_exists($partialPath)) {
            require $partialPath;
        } else {
            echo "Partial '{$name}' not found";
        }
}
?>