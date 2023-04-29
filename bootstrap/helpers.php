<?php

function prettyPrice(int $price): int
{
    return intval(floor($price / 10 + 1)) * 10 - 1; // 885 -> 889, 144 -> 149
}

function formatPrice(int $price): string 
{
    return strrev(trim(collect(str_split(str($price)))->reverse()->chunk(3)
        ->map(fn ($chunk) => $chunk->implode('') . ' ')->implode('')));
}
