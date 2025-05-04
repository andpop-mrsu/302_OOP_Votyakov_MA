<?php

namespace App;

class EconomyRoom implements RoomInterface
{
    public function getDescription(): string
    {
        return "Эконом";
    }

    public function getPrice(): float
    {
        return 1000;
    }
}
