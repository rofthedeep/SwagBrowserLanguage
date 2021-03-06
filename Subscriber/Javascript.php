<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwagBrowserLanguage\Subscriber;

use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;

class Javascript implements SubscriberInterface
{
    /**
     * @var string
     */
    private $viewDir;

    /**
     * @param string $viewDir
     */
    public function __construct($viewDir)
    {
        $this->viewDir = $viewDir;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Theme_Compiler_Collect_Plugin_Javascript' => 'addJsFiles',
        ];
    }

    /**
     * Provide the needed javascript files
     *
     * @return ArrayCollection
     */
    public function addJsFiles()
    {
        $jsPath = [
            $this->viewDir . '/frontend/_public/src/js/jquery.redirect.js',
        ];

        return new ArrayCollection($jsPath);
    }
}
