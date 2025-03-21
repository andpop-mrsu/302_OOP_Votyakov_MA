<?php

namespace App;

function runTest() 
{
    include_once "checkIfBalanced.php";
    // String representation test
    $stack = new Stack("1", "2", "a");
    $correct = "[a->2->1]";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $stack->__toString() . PHP_EOL;

    if ($stack->__toString() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    // Push test
    $stack->push("b");
    $correct = "[b->a->2->1]";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $stack->__toString() . PHP_EOL;

    if ($stack->__toString() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    // Pop test
    $val = $stack->pop();
    $correct = "b, [a->2->1]";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $val . ", " . $stack->__toString() . PHP_EOL;

    if (strval($val . ", " . $stack->__toString()) == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    // Top test
    $correct = "a, [a->2->1]";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $stack->top() . ", " . $stack->__toString() . PHP_EOL;

    if ($stack->top() . ", " . $stack->__toString() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    // isEmpty test
    $correct = "0";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . intval($stack->isEmpty()) . PHP_EOL;

    if (intval($stack->isEmpty()) == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    // copy test
    $copy = $stack->copy();
    $correct = "[a->2->1]";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $copy->__toString() . PHP_EOL;

    if ($copy->__toString() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    //checkifBalanced test
    $string1 = "(ab[cd{}])";
    $string2 = "(ab[cd{})";
    $string3 = "(ab[cd{]})";
    $message1 = "прошла проверку";
    $message2 = "не прошла проверку";
    $message = "";
    echo "Ожидается: $string1 $message1" . PHP_EOL;
    if (checkIfBalanced($string1)) {
        $message = $message1;
    } else {
        $message = $message2;
    }
    echo "Получено: " . $string1 . " " . $message . PHP_EOL;
    if ($message = $message1) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    echo "Ожидается: $string2 $message2" . PHP_EOL;
    if (checkIfBalanced($string2)) {
        $message = $message1;
    } else {
        $message = $message2;
    }
    echo "Получено: " . $string2 . " " . $message . PHP_EOL;
    if ($message = $message2) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }

    echo "Ожидается: $string3 $message2" . PHP_EOL;
    if (checkIfBalanced($string3)) {
        $message = $message1;
    } else {
        $message = $message2;
    }
    echo "Получено: " . $string3 . " " . $message . PHP_EOL;
    if ($message = $message2) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL;
    }
}
