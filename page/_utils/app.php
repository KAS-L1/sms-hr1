<?php

function ViewPage($folder, $index)
{
    global $DB;
    $GET_PAGE = PAGE(1); // Get the page route
    if (isset($GET_PAGE)) {
        if (VIEW('page/' . $folder . '/', $GET_PAGE) == '404') {
            include_once('page/404.php');
        } else {
            include_once(VIEW('page/' . $folder . '/', $GET_PAGE));
        }
    } else {
        include_once('page/' . $folder . '/' . ucfirst($index) . '.php');
    }
}
