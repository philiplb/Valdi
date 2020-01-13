<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$doxphpPath = getenv('DOXPHPPATH');

$classHierarchyToctree = [
    'Valdi\\\\Validator\\\\AbstractArray' => '.. toctree::

   Collection
   Nested',
    'Valdi\\\\Validator\\\\AbstractComparator' => '.. toctree::

   Between
   LengthBetween
   Max
   MaxLength
   Min
   MinLength
   Regexp
   Value',
    'Valdi\\\\Validator\\\\AbstractDateTimeComparator' => '.. toctree::

   AfterDateTime
   BeforeDateTime
   DateTimeBetween
   InTheFuture
   InThePast
   OlderThan
   YoungerThan',
    'Valdi\\\\Validator\\\\AbstractFilter' => '.. toctree::

   Email
   Floating
   Integer
   IP
   IPv4
   IPv6
   Url',
    'Valdi\\\\Validator\\\\AbstractParametrizedValidator' => '.. toctree::

   AbstractComparator
   AbstractDateTimeComparator',
    'Valdi\\\\Validator\\\\Regexp' => '.. toctree::

   Alphabetical
   AlphaNumerical
   Slug'
];

function scanFiles($dir) : array
{
    echo "Scanning $dir\n";
    $result = [];
    $files = scandir($dir);
    $omit = ['.', '..', '.DS_Store'];
    foreach ($files as $file) {
        $completeFile = $dir.DIRECTORY_SEPARATOR.$file;
        if (in_array($file, $omit)) {
            continue;
        }
        if (is_file($completeFile)) {
            $result[] = $completeFile;
        }
        if (is_dir($completeFile)) {
            $result = array_merge($result, scanFiles($completeFile));
        }
    }
    return $result;
}

function genAPIDoc($doxphpPath, $baseDir, $targetDir, $baseNamespace, $classHierarchyToctree, $file)
{
    $cmd = $doxphpPath.'/doxphp < "'.$file.'" | '.$doxphpPath.'/doxphp2sphinx';
    $doc = shell_exec($cmd);

    $fileWithoutExtension = substr($file, strlen($baseDir) + 1, strlen($file) - strlen($baseDir) - 5);
    $fullClassname = $baseNamespace.'\\\\'.str_replace('/', '\\\\', $fileWithoutExtension);

    $headlineSeparator = '';
    $fullClassnameLength = strlen($fullClassname);
    for ($i = 0; $i < $fullClassnameLength; ++$i) {
        $headlineSeparator .= '-';
    }

    $headline = "$headlineSeparator\n$fullClassname\n$headlineSeparator\n";

    if (array_key_exists($fullClassname, $classHierarchyToctree)) {
        $headline .= "\n".$classHierarchyToctree[$fullClassname]."\n";
    }

    $targetFile = $targetDir.'/'.$fileWithoutExtension.'.rst';
    $targetClassDir = dirname($targetFile);
    if (!is_dir($targetClassDir)) {
        mkdir($targetClassDir, 0755, true);
    }

    file_put_contents($targetFile, $headline."\n".$doc);

}

$baseDir = 'src/Valdi';
$files = scanFiles($baseDir);

$targetDir = 'docs/api';

shell_exec('rm -r '.$targetDir);
foreach ($files as $file) {
    genAPIDoc($doxphpPath, $baseDir, $targetDir, 'Valdi', $classHierarchyToctree, $file);
}
