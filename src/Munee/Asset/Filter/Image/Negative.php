<?php
/**
 * Munee: Optimising Your Assets
 *
 * @copyright Cody Lundquist 2013
 * @license http://opensource.org/licenses/mit-license.php
 */

namespace Munee\Asset\Filter\Image;

use Munee\Asset\Filter;
use Munee\Asset\ImagineFactory;

/**
 * Negative Filter for Images
 *
 * @author Cody Lundquist
 */
class Negative extends Filter
{
    /**
     * List of allowed params for this particular filter
     *
     * @var array
     */
    protected $allowedParams = array(
        'negative' => array(
            'regex' => 'true|false|t|f|yes|no|y|n',
            'cast' => 'string'
        )
    );

    /**
     * Turn an image Negative
     *
     * @param string $file
     * @param array $arguments
     * @param array $imageOptions
     *
     * @return void
     */
    public function doFilter($file, $arguments, $imageOptions)
    {
        $Imagine = ImagineFactory::create($imageOptions['imageProcessor']);
        $image = $Imagine->open($file);

        $image->effects()->negative();
        $image->save($file);
    }
}