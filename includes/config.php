<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'name' => 'MOVIE REPO',
        'pretty_uri' => false,
        'site_url' => 'https://group-demo-project.herokuapp.com/',
        'nav_menu' => [
            '' => 'Home',
            'about-me' => 'About Me'
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v3.0',
    ];
    return isset($config[$key]) ? $config[$key] : null;
}
?>