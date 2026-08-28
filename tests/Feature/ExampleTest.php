<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_redirects_to_public_articles(): void
    {
        $this->get('/')
            ->assertRedirect(route('articulos.index'));
    }
}
