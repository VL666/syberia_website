<?php
/**
 * Created by Lane Shukhov.
 * Date: 27.08.2018
 * Time: 0:15
 */
include_once 'config.php';

define('SITE_URL', 'https://syberiaos.com/');

$f3->set('DEBUG', 0);
$f3->set('site_url', SITE_URL);

function renderPage($f3, $title, $page) {
    $f3->set('page_title', $title);
    $f3->set('page_content', $page);
    echo \Template::instance()->render('layout.html');
}

$indexAction = function ($f3) {
    renderPage($f3, 'Syberia OS', 'pages/index.html');
};

$errorAction = function ($f3) {
    echo \Template::instance()->render('error.html');
};

$f3->set('ONERROR', $errorAction);

$f3->route('GET /', $indexAction);

$f3->run();

