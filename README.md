# Content Security Policy

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

A really easy way to build CSP headers and add them to the response.

## Install

Via Composer

``` bash
$ composer require zae/content-security-policy
```

### Laravel

#### Middleware 

Add the middleware to the middleware Kernel.

~~~php
protected $middlewareGroups = [
    'web' => [
        ...
        \Zae\ContentSecurityPolicy\Laravel\Http\Middleware\ContentSecurityPolicy::class
    ],
]
~~~

#### Config (config/csp.php)

~~~php
return [
	BlockAllMixedContent::class,
    Sandbox::class => [
        Sandbox::ALLOW_FORMS,
        Sandbox::ALLOW_SCRIPTS,
        Sandbox::ALLOW_TOP_NAVIGATION,
        Sandbox::ALLOW_SAME_ORIGIN,
        Sandbox::ALLOW_POPUPS,
    ]
];
~~~

### Craft 3
The library includes a module for Craft 3 that can send the CSP header and a twig
function to get the current CSP nonce.

Register the module like this:

~~~php
'modules' => [
    'csp' => \Zae\ContentSecurityPolicy\Craft\Module::class,
],
'bootstrap' => [
    'csp'
]
~~~

Use the twig functions like this:

~~~php
<script nonce="{{ cspnonce() }}">
    // inline javascript
</script>
~~~

### Other

Although not officially supported yet, it's possible to use this library with other frameworks,
an easy method is by using FluidDirectivesFactory.

#### Fluid Factory

~~~php
<?php
$csp = new CSP();
$factory = new FluidDirectivesFactory($csp);
$factory
    ->blockAllMixedContent()
    ->defaultSrc([
        Directive::SELF,
        'https:'
    ])
    ->baseUri([
        Directive::SELF
    ]);
~~~

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email ezra@tsdme.nl instead of using the issue tracker.

## Credits

- [Ezra Pool][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/zae/content-security-policy.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zae/content-security-policy.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/zae/content-security-policy
[link-downloads]: https://packagist.org/packages/zae/content-security-policy
[link-author]: https://github.com/zae
[link-contributors]: ../../contributors
