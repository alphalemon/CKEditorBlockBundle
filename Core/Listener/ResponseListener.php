<?php
/*
 * This file is part of the BootstrapButtonBlockBundle and it is distributed
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

namespace AlphaLemon\Block\CKEditorBlockBundle\Core\Listener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Templating\EngineInterface;

/**
 * Adds CKEditor script to page, just before the </body> tag
 *
 * @author AlphaLemon <info@alphalemon.com>
 */
class ResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request = $event->getRequest();
        $baseUrl = dirname($request->getBaseUrl());
        if ($baseUrl == '/') {
            $baseUrl = "";
        }
        
        $response = $event->getResponse();
        $content = $response->getContent();
        $content = preg_replace('/\<\/body\>/si', '<script src="' . $baseUrl . '/bundles/ckeditorblock/vendor/ckeditor/ckeditor.js"></script></body>', $content);
        $response->setContent($content);
    }
}
