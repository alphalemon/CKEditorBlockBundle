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

namespace AlphaLemon\Block\CKEditorBlockBundle\Tests\Unit\Core\Listener;

use AlphaLemon\AlphaLemonCmsBundle\Tests\TestCase;
use AlphaLemon\Block\CKEditorBlockBundle\Core\Listener\ResponseListener;

/**
 * RenderListenerTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class RenderListenerTest extends TestCase
{    
    /**
     * @dataProvider provider()
     */
    public function testOnKernelResponse($baseUrl, $responseContent, $expectedResult)
    {
        $request = $this->getMock('Symfony\Component\HttpFoundation\Request');
        $request->expects($this->once())
            ->method('getBaseUrl')
            ->will($this->returnValue($baseUrl))
        ; 
        
        
        $event = $this->getMockBuilder('Symfony\Component\HttpKernel\Event\FilterResponseEvent')
            ->disableOriginalConstructor()
            ->getMock()
        ;        
        
        $response = $this->getMock('Symfony\Component\HttpFoundation\Response');
        $response
            ->expects($this->once())
            ->method('getContent')
            ->will($this->returnValue($responseContent))
        ;
        
        $response
            ->expects($this->once())
            ->method('setContent')
            ->with($expectedResult)
        ;
        
        $event
            ->expects($this->once())
            ->method('getRequest')
            ->will($this->returnValue($request))
        ;
        
        $event
            ->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue($response))
        ;
    
        $listener = new ResponseListener($sdkCollection);
        $listener->onKernelResponse($event);
    }
    
    public function provider()
    {
        return array(
            array(
                '',
                'Page contents',
                'Page contents',
            ),
            array(
                '',
                '<body>Page contents</body>',
                '<body>Page contents<script src="/bundles/ckeditorblock/vendor/ckeditor/ckeditor.js"></script></body>',
            ),
            array(
                '/',
                '<body>Page contents</body>',
                '<body>Page contents<script src="/bundles/ckeditorblock/vendor/ckeditor/ckeditor.js"></script></body>',
            ),
            array(
                '/path/to/somewhere/alcms.php',
                '<body>Page contents</body>',
                '<body>Page contents<script src="/path/to/somewhere/bundles/ckeditorblock/vendor/ckeditor/ckeditor.js"></script></body>',
            ),
        );
    }
}
