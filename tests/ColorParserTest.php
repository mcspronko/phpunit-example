<?php

namespace App\Test;

use App\ColorParser;
use PHPUnit\Framework\TestCase;

class ColorParserTest extends TestCase
{
    private ColorParser $colorParser;

    protected function setUp(): void
    {
        $this->colorParser = new ColorParser();
    }

    public function testIsColorSingleArray(): void
    {
        $result = $this->colorParser->parse('red');
        $expected = ['red'];

        $this->assertSame($expected, $result);
    }

    /**
     * @param string $colors
     * @param array $expected
     * @return void
     * @dataProvider colorProvider
     */
    public function testIsColorArray(string $colors, array $expected): void
    {
        $result = $this->colorParser->parse($colors);
        $this->assertSame($expected, $result);
    }

    public function colorProvider(): array
    {
        return [
            [
                'red | blue | green',
                ['red', 'blue', 'green']
            ],
            [
                'red, blue, green',
                ['red', 'blue', 'green']
            ],
            [
                'red,blue,green',
                ['red', 'blue', 'green']
            ]
        ];
    }
}