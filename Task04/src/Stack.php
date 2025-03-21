<?php

namespace App;

class Stack implements StackInterface
{
    private $stack;

    public function __construct(...$elements) 
    {
        $this->stack = [];
        if (!empty($elements)) {
            $this->push(...$elements);
        }
    }

    public function push(...$elements): void
    {
        foreach ($elements as $element) {
            array_unshift($this->stack, $element);
        }
    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }
        return array_shift($this->stack);
    }

    public function top(): mixed 
    {
        if ($this->isEmpty()) {
            return null;
        }
        return $this->stack[0];
    }

    public function isEmpty(): bool 
    {
        return empty($this->stack);
    }

    public function copy(): Stack 
    {
        $newStack = new Stack();
        $newStack->stack = $this->stack;
        return $newStack;
    }

    public function __toString(): string 
    {
        return '[' . implode('->', $this->stack) . ']';
    }
}