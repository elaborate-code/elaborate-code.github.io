# Elaborate-code

This website/template is powered with **Jigsaw**, **Tailwind3** and **Alpine3**.

## Localization

**Jigsaw** is a static website generator that allows us to use all **Blade**'s capabilities which makes it feel like home for **Laravel** devs.

But what seems as a huge inconvenient to me is the lack of localization support. So here is how I worked around it:

### The translation helper

the helper `__` is declared within `/helpers.php`. So whenever you need to use the helper make sure that the `$page` variable is accessible.

Then use it like:

```blade
{{ $page->__('text', 'en') }}
{{ $page->__('text', 'fr') }}
```

The helper looks for translations in the `/config.php` file using the **language code** as an associative array key and the **text** as a nested key.

```blade
{{ $page->__('Orignal text which is by default in english', $lang) }}
```

```php
// confing.php

return [
   // ... 
    'en' => [
        'Orignal text which is by default in english' => 'Orignal text which is by default in english',
    ],
    'fr' => [
        'Orignal text which is by default in english' => 'Text original qui est en anglais',
    ],
]
```

If the `key` is found then the translation will be rendered, otherwise the `key` text will be returned instead.

### Language URL prefix through folders structure

> I will be referencing the `source` folder as `web root`.

I used folder structure inside the **web route** to emulate the localization URL prfix:

- The folder `en` contains the enlgish pages.
- The `fr` folder contains the french version and so on.

But since I picked `english` as my primary language there won't be any `en` folder, instead, I used the web route `/` to host the english pages.

### Avoinding repeated work

The `en` and `fr` pages will be identical except for the text translation. So to avoid repeating my self I will not place the HTML code directly in the mentionned folders (`source/.*.blade.php` and `source/en/.*.blade.php`), instead, I made a directory called `_pages`.

All the work will be done in the mentionned folder (`source/_pages/index.blade.php`, `source/_pages/contact.blade.php` ...).

Let's say that I'm working on the `about-us` page. I will:

1. Create `source/_pages/about.blade.php`.
2. Write all the page's code (see how later).
3. Create `source/about.blade.php` and `source/fr/about.blade.php`, declare a variable `$lang` that equals `en` and `fr` respectively, then include `source/about.blade.php`.

#### examples

```blade
{!-- source\fr\about.blade.php --}

@php $lang = 'fr'; @endphp

@include('_pages.about', ['lang' => $lang])
```

```blade
{!-- source\about.blade.php --}

@php $lang = 'en'; @endphp

@include('_pages.about', ['lang' => $lang])
```

### Pages content

Back to the `_pages` folder. the `source/_pages/about.blade.php` will be used to house the content of both `source/about.blade.php` and `source/fr/about.blade.php` and will be aware of the redering language through the `$lang` variable.

### Routing to translation

The `lang_route` helper takes the **pages** language, and another available language and returns an equivelent route.

See how it is used within the `nav-langs` component.

### Other conveniences

Dynamic content sources in `/config.php`

1. `routes` populates the navigation bar and the hamburger menu with available pages names and URLs.
2. `socials` populates the footer with social media links.
3. `services` populates the landing page's services section.
4. `projects` populates the landing page's projects section.

## Extra

### Jigsaw setup

```text
mkdir jigsaw &&
cd .\jigsaw\
```

```text
composer require tightenco/jigsaw
```

```text
vendor/bin/jigsaw init
```

```text
npm i &&
npm run prod
```

Preview:

```text
vendor/bin/jigsaw serve production
```

Or

```text
npm i &&
npm run dev &&
vendor/bin/jigsaw serve
```

#### Using Tailwind 3

```text
npm install -D tailwindcss@latest postcss@latest autoprefixer@latest
```

```js
module.exports = {
    content: [
        // ...
    ],
    // ...
};
```

#### The npm run mix infinit loop issue [ref1](https://github.com/laravel-mix/laravel-mix/issues/1942) [ref2](https://github.com/tighten/jigsaw/issues/607)

*I don't understand the issue neither the solution! But this fixes it.*

```text
npm i fast-glob
```

```js
module.exports = {
    content: require("fast-glob").sync([
        // ..
    ]),
    // ...
};
```

#### browser-sync

```text
npm install -g browser-sync
```

```text
npm run watch
```

Now live preview the website on `http://localhost:3000`

#### Deploy on github pages [ref](https://jigsaw.tighten.com/docs/deploying-your-site/#:~:text=deploy%20and%20host.-,Using%20GitHub%20Pages,-GitHub%20Pages%20is)

> Commit the `build_production` folder to your repository.
>
> Use `git subtree push` to push just the `build_production` folder to your **`gh-pages`** branch

```text
git subtree push --prefix build_production origin gh-pages
```
