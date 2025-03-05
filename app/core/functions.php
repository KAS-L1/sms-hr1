<?php

/**
 * APP FUNCTION ROUTE AND VIEW
 **/

// PAGE URL INDEX ROUTING
function PAGE($index = 0)
{
	$url = $_GET['url'] ?? 'index';
	$url = filter_var($url, FILTER_SANITIZE_URL);
	$arr = explode('/', $url);
	return $arr[$index] ?? null;
}

// PAGE CONTENT RENDER
function VIEW($path, $page)
{
	if (substr($path, -1) !== '/') $path .= '/';
	$page = ucfirst($page) . '.php';
	if (file_exists($path . $page)) {
		return ($path . $page);
	} else {
		return '404';
	}
}
