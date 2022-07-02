<?php

return [
    'route' => function ($page, $url, $current_lang) {

        if ($url[0] !== '/')
            $url = '/' . $url;

        if ($current_lang === 'en') {
            return $url;
        } else {
            return '/' . $current_lang . $url;
        }
    },

];
