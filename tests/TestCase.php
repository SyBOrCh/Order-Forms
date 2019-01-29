<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null, $attributes = []) 
    {
        return $this->be(
            $user ?: factory(User::class)->create($attributes)
        );
    }
}
