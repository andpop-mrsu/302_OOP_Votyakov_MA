<?php

namespace App;

abstract class RoomDecorator implements RoomInterface
{
    protected $room;

    public function __construct(RoomInterface $room)
    {
        $this->room = $room;
    }

    public function getDescription(): string
    {
        return $this->room->getDescription();
    }

    public function getPrice(): float
    {
        return $this->room->getPrice();
    }
}
