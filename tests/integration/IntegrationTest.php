<?php

namespace Inspector\Symfony\Bundle\Tests\Integration;

use Inspector\Inspector;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class IntegrationTest extends KernelTestCase
{
    public function testServiceWiring()
    {
        self::bootKernel();

        $inspectorService = static::getContainer()->get('inspector');

        $this->assertInstanceOf(Inspector::class, $inspectorService);
    }

    public function testServiceWiringWithConfiguration()
    {
        self::bootKernel(['environment' => 'test', 'debug' => false]);

        $inspectorService = static::getContainer()->get('inspector');

        $this->assertFalse($inspectorService->hasTransaction());
    }
}

