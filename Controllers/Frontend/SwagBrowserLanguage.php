<?php
/**
 * Shopware 4.0
 * Copyright © 2012 shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 *
 * @category   Shopware
 * @package    Shopware_Controllers_Frontend_SwagVariantsTab
 * @copyright  Copyright (c) 2013, shopware AG (http://www.shopware.de)
 */
class Shopware_Controllers_Frontend_SwagBrowserLanguage extends Enlight_Controller_Action
{
    public function indexAction()
    {
        $response = $this->Response();
        $request = $this->Request();

        $repository = Shopware()->Models()->getRepository('Shopware\Models\Shop\Shop');
        $newShop = $repository->getActiveDefault();
        $path = rtrim($newShop->getBasePath(), '/') . '/';
        $response->setCookie('shop', $newShop->getId(), 0, $path);
        $url = sprintf('%s://%s%s%s',
            $request::SCHEME_HTTP,
            $newShop->getHost(),
            $newShop->getBaseUrl(),
            '/'
        );

        $response->setRedirect($url);
    }
}