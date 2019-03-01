<?php

namespace mydogger\pinyin;

class Pinyin
{
    private static $obj = null;
    private $pinyin_array = [];

    private function __construct()
    {
        $this->pinyin_array = unserialize(file_get_contents(__DIR__ . '/../data/pinyin.txt'));
    }

    public static function instance()
    {
        if (!self::$obj) {
            self::$obj = new self();
        }
        return self::$obj;
    }


    /**
     * 生成首字母
     */
    public static function first($ch)
    {
        $result = '';
        $pinyin = pinyin::instance();
        // 1.去除非中文字符
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $ch, $matches);

        // 将文字拆分成数组
        $len = mb_strlen($ch);
        for ($i = 0; $i < $len; $i ++) {
            $chars[] = mb_substr($ch, $i, 1);
        }
        foreach ($chars as $char) {
            $result .= $pinyin->pinyin_array[$char] ?? '';
        }
        return $result;
    }
}