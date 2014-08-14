<?php
View::composer('adminlte-logviewer::viewer', function($view)
{
    $view->with('title', 'Logviewer');
    $view->with('breadcrumb',  array(
        array(
            'title' => 'Logs',
            'link' => URL::to(Config::get('syntara::config.uri')."/logviewer"),
            'icon' => 'glyphicon-list-alt'
        )
    ));
});
