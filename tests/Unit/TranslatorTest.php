<?php

namespace Tests\Unit;

use App\Translator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TranslatorTest extends TestCase
{
    /** @test **/
    public function it_can_translate_waste_containers_to_NL_equivalent()
    {
        $string = 'Blue waste container';
        $dutchTranslation = 'Blauw (vloeibaar) afvalvat (10 L)';

        $this->assertEquals($dutchTranslation, Translator::toNL($string));
    }

    /** @test **/
    public function it_gives_the_original_string_if_no_translation_was_found()
    {
        $string = 'No translation';

        $this->assertEquals($string, Translator::toNL($string));
    }
}
