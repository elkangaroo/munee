<?php
/**
 * Munee: Optimising Your Assets
 *
 * @copyright Cody Lundquist 2013
 * @license http://opensource.org/licenses/mit-license.php
 */

namespace Munee\Cases\Asset;

use Munee\Asset\ImagineFactory;

/**
 * Tests for the \Munee\Asset\ImagineFactory Class
 *
 * @author Alexander Wenzel
 */
class ImagineFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * no tests for Gmagick and Imagick, because those extensions may not be installed
     */
    public function testCreateWithGd()
    {
        $imagine = ImagineFactory::create('gd');

        $this->assertInstanceOf('Imagine\\Gd\\Imagine', $imagine);
    }

    /**
     * @expectedException \Munee\ErrorException
     * @expectedExceptionMessage Unsupported imageProcessor config value: foo
     */
    public function testCreateWithErrorException()
    {
        ImagineFactory::create('foo');
    }
}
