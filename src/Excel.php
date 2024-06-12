<?php

namespace Shimoning\Formatter;

class Excel
{
    const BASE = 26;
    const CODE = 65;

    /**
     * アルファベットに変換する
     * @param int $index
     * @return string|false
     */
    static public function alphabet(int $index)
    {
        if ($index < 1) {
            return false;
        }
        $alphabets = '';

        while ($index > 0) {
            $index--;

            $alphabets = \chr($index % self::BASE + self::CODE) . $alphabets;
            $index = floor($index / self::BASE);
        }

        return $alphabets;
    }

    /**
     * Undocumented function
     *
     * @param string $alphabets
     * @return number|false
     */
    static public function index(string $alphabets)
    {
        if (empty($alphabets) || ! preg_match('/^[a-zA-z]+$/', $alphabets)) {
            return false;
        }
        $alphabets = \strtoupper($alphabets);

        $index = 0;
        $length = \strlen($alphabets);
        for ($i = 0; $i < $length; $i++) {
            $index += (\ord($alphabets[$length - $i - 1]) - self::CODE + 1) * \pow(self::BASE, $i);
        }

        return $index;
    }
}
