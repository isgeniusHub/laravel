<?php
declare(strict_types=1);

/**
 * @param array<string> $patternsLinks
 * @return string
 */
function generateLinksList(array $patternsLinks): string
{
    $linksList = '<ul>';

    foreach ($patternsLinks as $patternLink) {
        $patternName = ucfirst(
            str_replace(['/', '-'], ['', ' '], $patternLink)
        );
        $linksList .= sprintf(
            '<li><a href="%s">%s</a></li>',
            $patternLink,
            $patternName
        );
    }

    $linksList .= '</ul>';

    return $linksList;
}

/*@TODO перенести в БД после подключения*/
$patternsLinks = [
    '/singleton',
    '/factory-method',
    '/abstract-factory',
    '/prototype',
    '/service-locator',
    '/dependency-injection'
];

echo sprintf('<h1>%s</h1>', 'Примеры реализации шаблонов проектирования');
echo sprintf('<h3>%s</h3>', 'Порождающие шаблоны');
echo generateLinksList($patternsLinks);