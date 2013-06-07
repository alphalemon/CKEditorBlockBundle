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

namespace AlphaLemon\Block\CKEditorBlockBundle\Tests\Core;

use AlphaLemon\Block\CKEditorBlockBundle\Core\Block\AlBlockManagerCKEditorBlock;
use AlphaLemon\AlphaLemonCmsBundle\Tests\TestCase;

/**
 * AlBlockManagerCKEditorBlockTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerCKEditorBlockTest extends TestCase
{    

    protected function setUp()
    {
        $eventsHandler = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Core\EventsHandler\AlEventsHandlerInterface');
        
        $this->blockManager = new AlBlockManagerCKEditorBlock($eventsHandler);
    }
    
    public function testDefaultValue()
    {
        $expectedValue = array(
            'Content' => '<p>This is the default text for a new text content</p>'
        );
        
        //alpha_lemon_cms.events_handler
        
        //$this->initContainer(); 
        
        $this->assertEquals($expectedValue, $this->blockManager->getDefaultValue());
    }
    
    public function testGetHtml()
    {
        $blockId = 2;
        $content = 'some fancy text';
        $block = $this->initBlock($blockId, $content);        
        $this->blockManager->set($block);
        
        $expectedResult = array('RenderView' => array(
            'view' => 'CKEditorBlockBundle:Content:text.html.twig',
            'options' => array(
                'content' => $content, 
                'id' => $blockId,
                'block_manager' => $this->blockManager,
            ),
        ));
        
        $this->assertEquals($expectedResult, $this->blockManager->getHtml());       
    }
    
    protected function initBlock($blockId, $content)
    {
        $block = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Model\AlBlock');
        $block->expects($this->once())
              ->method('getId')
              ->will($this->returnValue($blockId));
              
        $block->expects($this->once())
              ->method('getContent')
              ->will($this->returnValue($content));

        return $block;
    }
}
