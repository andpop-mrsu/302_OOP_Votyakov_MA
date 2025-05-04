<?php

namespace App;

interface RoomInterface
{
    public function getDescription(): string;
    public function getPrice(): float;
}
