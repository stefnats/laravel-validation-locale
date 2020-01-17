<?php

/*
 * This file is part of https://github.com/stefnats/laravel-validation-locale
 *
 *  (c) Stefan Neuhaus <stefan@n.euha.us>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 */

namespace Stefnats\Locale\Tests;

use Stefnats\Locale\Locale;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use PHPUnit\Framework\TestCase;
use Illuminate\Validation\Factory as Validator;

final class LocaleTest extends TestCase
{
    public function buildValidator($locale)
    {
        $app = new Container();
        $app->singleton('app', 'Illuminate\Container\Container');
        $translator     = new Translator(new FileLoader(new Filesystem(), null), 'en');
        $validator      = (new Validator($translator))->make([ 'locale' => $locale ], [
            'locale'  => [ 'required', new Locale() ],
        ]);
        return $validator;
    }

    /**
     * @test
     */
    public function testValidLocalePasses()
    {
        $validator = $this->buildValidator("en_US");
        $this->assertTrue($validator->passes());
    }

    /**
     * @test
     */
    public function testInvalidLocaleFails()
    {
        $validator = $this->buildValidator("foo");
        $this->assertTrue($validator->fails());
    }


    /**
     * @test
     */
    public function testGoodLookingButWrongLocaleFails()
    {
        $validator = $this->buildValidator("at_EN");
        $this->assertTrue($validator->fails());
    }


    /**
     * @test
     */
    public function testWrongCaseFails()
    {
        $validator = $this->buildValidator("en_us");
        $this->assertTrue($validator->fails());
    }
}
