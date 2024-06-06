<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class GreetingsTest extends ApiTestCase
{
    public function testCreateGreeting(): void
    {
        static::createClient()->request('POST', '/api/greetings', [
            'json' => [
                'name' => 'Tyloo',
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/api/contexts/Greeting',
            '@type' => 'Greeting',
            'name' => 'Tyloo',
        ]);
    }
}
