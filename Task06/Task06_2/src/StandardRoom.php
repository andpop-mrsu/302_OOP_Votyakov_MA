<?php

namespace App;

class StandardRoom implements RoomInterface
{
    public function getDescription(): string
    {
        return "Стандарт";
    }

    public function getPrice(): float
    {
        return 2000;
    }
}
