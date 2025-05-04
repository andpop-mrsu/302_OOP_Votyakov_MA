<?php

namespace App;

class LuxuryRoom implements RoomInterface
{
    public function getDescription(): string
    {
        return "Люкс";
    }

    public function getPrice(): float
    {
        return 3000;
    }
}
