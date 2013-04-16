<?php

namespace AlphaLemon\Block\CKEditorBlockBundle\Controller;

use AlphaLemon\AlphaLemonCmsBundle\Controller\AlCmsController;
use AlphaLemon\AlphaLemonCmsBundle\Core\AssetsPath\AlAssetsPath;

class MediaLibraryController extends AlCmsController
{
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
