<?php
/*
 * This file is part of the CKEditorBlockBundle and it is distributed
 * under the MIT LICENSE. To use this application you must leave intact this copyright 
 * notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 * 
 * @license    MIT LICENSE
 * 
 */
namespace AlphaLemon\Block\CKEditorBlockBundle\Controller;

use AlphaLemon\AlphaLemonCmsBundle\Controller\AlCmsController;
use AlphaLemon\AlphaLemonCmsBundle\Core\AssetsPath\AlAssetsPath;

/**
 * Connects ElFinder with CKEditor
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class MediaLibraryController extends AlCmsController
{
    /**
     * Opens ElFinder
     */
    public function showAction()
    {
        $request = $this->container->get('request');
        
        return $this->container->get('templating')->renderResponse('CKEditorBlockBundle:Elfinder:media_library.html.twig', array(
            'enable_yui_compressor' => $this->container->getParameter('alpha_lemon_cms.enable_yui_compressor'),
            'assets_folder' => AlAssetsPath::getUploadFolder($this->container),
            'frontController' => $this->getFrontcontroller($request),
        ));
    }
}
