<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'name' => 'DIY Accoustic to Electric Hybrid Drum Kit',
        'pretty_uri' => false,
        'site_url' => 'https://my-first-project-cpsc-4125.herokuapp.com/',
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