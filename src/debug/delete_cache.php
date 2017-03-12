<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 03. 10.
 * Time: 19:32
 */

$dir = __DIR__ . '/../../cache/app';

rrmdir($dir);

$dir = __DIR__ . '/../../cache/twig';

rrmdir($dir);

$dir = __DIR__ . '/../../cache/doctrine';

rrmdir($dir);

/**
 * @param $dir
 */
function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . "/" . $object)) {
                    rrmdir($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        rmdir($dir);
    }
}
