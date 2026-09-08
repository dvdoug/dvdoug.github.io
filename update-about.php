<?php

/**
 * Refresh rounded download and CRS counts in about.md.
 *
 * Usage: php update-about.php
 */

declare(strict_types=1);

const PACKAGES = [
    'dvdoug/boxpacker',
    'php-coord/php-coord',
    'dvdoug/behat-code-coverage',
];

const PHPCOORD_README_URL = 'https://raw.githubusercontent.com/dvdoug/PHPCoord/master/README.md';
const DOWNLOAD_STEP = 500_000;
const CRS_STEP = 100;

$aboutPath = __DIR__ . '/about.md';
$about = file_get_contents($aboutPath);
if ($about === false) {
    throw new RuntimeException('Could not read about.md');
}

$totalDownloads = 0;
foreach (PACKAGES as $package) {
    $json = json_decode(fetch('https://packagist.org/packages/' . $package . '.json'), true, 512, JSON_THROW_ON_ERROR);
    $downloads = $json['package']['downloads']['total'] ?? null;
    if (!is_int($downloads) && !is_float($downloads)) {
        throw new RuntimeException('Missing download count for ' . $package);
    }
    $downloads = (int) $downloads;
    echo $package . ': ' . $downloads . PHP_EOL;
    $totalDownloads += $downloads;
}

$phpCoordReadme = fetch(PHPCOORD_README_URL);
if (preg_match('/<!-- numOfCRS -->(\d+)/', $phpCoordReadme, $match) !== 1) {
    throw new RuntimeException('Could not find CRS count in PHPCoord README');
}
$crsCount = (int) $match[1];

if ($totalDownloads < 1_000_000) {
    throw new RuntimeException('Unreasonable download total: ' . $totalDownloads);
}
if ($crsCount < 1_000) {
    throw new RuntimeException('Unreasonable CRS count: ' . $crsCount);
}

$roundedDownloads = intdiv($totalDownloads, DOWNLOAD_STEP) * DOWNLOAD_STEP;
$roundedCrs = intdiv($crsCount, CRS_STEP) * CRS_STEP;
$formattedDownloads = number_format($roundedDownloads);
$formattedCrs = number_format($roundedCrs);

echo 'downloads: ' . $totalDownloads . ' -> ' . $formattedDownloads . PHP_EOL;
echo 'crs: ' . $crsCount . ' -> ' . $formattedCrs . PHP_EOL;

$about = replaceMarker($about, 'DOWNLOADS', $formattedDownloads);
$about = replaceMarker($about, 'CRS', $formattedCrs);

if (file_put_contents($aboutPath, $about) === false) {
    throw new RuntimeException('Could not write about.md');
}

function fetch(string $url): string
{
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => "User-Agent: dvdoug-about-bot (+https://github.com/dvdoug/dvdoug.github.io)\r\n",
            'timeout' => 30,
            'ignore_errors' => true,
            'follow_location' => 1,
        ],
    ]);

    $body = file_get_contents($url, false, $context);
    if ($body === false) {
        throw new RuntimeException('Failed to fetch ' . $url);
    }

    $statusLine = $http_response_header[0] ?? '';
    if (preg_match('/\s2\d\d\s/', $statusLine) !== 1) {
        throw new RuntimeException('Unexpected response from ' . $url . ': ' . $statusLine);
    }

    return $body;
}

function replaceMarker(string $about, string $name, string $value): string
{
    $pattern = '/<!-- ' . preg_quote($name, '/') . ':START -->.*?<!-- ' . preg_quote($name, '/') . ':END -->/s';
    $replacement = '<!-- ' . $name . ':START -->' . $value . '<!-- ' . $name . ':END -->';
    $updated = preg_replace($pattern, $replacement, $about, 1, $count);
    if (!is_string($updated) || $count !== 1) {
        throw new RuntimeException('Expected 1 ' . $name . ' marker pair, found ' . $count);
    }

    return $updated;
}
