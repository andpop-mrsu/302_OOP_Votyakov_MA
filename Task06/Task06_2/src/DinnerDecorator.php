<?php

namespace App;

class DinnerDecorator extends RoomDecorator
{
    public function getDescription(): string
    {
        return parent::getDescription() . ", ужин";
    }

    public function getPrice(): float
    {
        return parent::getPrice() + 800;
    }
}
