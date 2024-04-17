<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_storage(): void
    {
        $this->withoutExceptionHandling();

        Storage::disk('public')->assertExists('LF1.png');
    }
}
