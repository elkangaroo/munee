<?php
/**
 * Munee: Optimising Your Assets
 *
 * @copyright Cody Lundquist 2013
 * @license http://opensource.org/licenses/mit-license.php
 */

namespace Munee\Asset;

use Munee\ErrorException;
use Imagine\Image\ImagineInterface;

class ImagineFactory
{
    /**
     * @param string $imageProcessor
     * @return ImagineInterface
     * @throws ErrorException
     */
    public static function create($imageProcessor)
    {
        $imagine = 'Imagine\\' . ucwords(strtolower($imageProcessor)) . '\\Imagine';
        if (class_exists($imagine)) {
            return new $imagine();
        }

        throw new ErrorException('Unsupported imageProcessor config value: ' . $imageProcessor);
    }
}
