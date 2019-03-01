<?php

require './vendor/autoload.php';
use mydogger\pinyin\Pinyin;

echo Pinyin::first("曾小贤");

for ($i = 0; $i < 10000; $i++) {
    $py = Pinyin::first('武则天');
}