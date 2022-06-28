<?php

return [
    'lang_route' => function ($page, $current_lang, $trans_lang) {
        $href = '';

        if ($current_lang === 'en') {
            // "en" isn't shown at the beginning of the URL
            // So just prefix the translation lang "/YY"
            $href = "/$trans_lang" . $page->getPath();
        } else {
            // Remove the lang prefix "/XX"
            // prefix the translation lang "/YY"
            $href = "/$trans_lang" . substr($page->getPath(), 3);
        }

        if (str_starts_with($href, '/en'))
            $href = substr($href, 3);

        if (empty($href)) {
            return '/';
        }

        return $href;
    },

    'route' => function ($page, $url, $current_lang) {

        if ($url[0] !== '/')
            $url = '/' . $url;

        if ($current_lang === 'en') {
            return $url;
        } else {
            return '/' . $current_lang . $url;
        }
    },

    '__' => function ($page, $text, $lang) {
        if (isset($page->$lang[$text]))
            return $page->$lang[$text];
        return $text;
    }

];
