<?php

namespace App;

class ColorParser
{
    public function parse(string $colors): array
    {
        return preg_split('/ ?[,|] ?/', $colors);
    }
}