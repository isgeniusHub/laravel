<?php
declare(strict_types=1);

namespace Helpers;

class PrintFileContentHelper
{
    /**
     * Returns html representation of file content
     *
     * @param string $file
     * @return string
     */
    public static function printFileContent(string $file): string
    {
        if(is_file($file)) {
            $html = '<div style="font-size: 18px;">';
            $fs = fopen($file, 'r');
            while (!feof($fs)) {
                $indent = 1;
                $string = fgets($fs, 1024);
                if (preg_match('/^\<\?php+/', $string, $matches)) {
                    continue;
                }
                if (preg_match('/^\s+/', $string, $matches)) {
                    $indent = strlen($matches[0]);
                }
                $html .= '<div style="padding-left: ' . ($indent * 10) . 'px">' . $string . '</div>';
            }
            fclose($fs);

            $html .= '</div>';
            return $html;
        }

        return '';
    }
}