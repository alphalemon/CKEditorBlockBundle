<?php
/**
 * An AlphaLemonCms Block
 */

namespace AlphaLemon\Block\CKEditorBlockBundle\Core\Block;

use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\InlineTextBlock\AlBlockManagerInlineTextBlock;

/**
 * Description of AlBlockManagerCKEditorBlock
 */
class AlBlockManagerCKEditorBlock extends AlBlockManagerInlineTextBlock
{
    public function getDefaultValue()
    {
        return array('Content' => '<p>This is the default text for a new text content</p>');
    }    
    
    protected function renderHtml()
    {
        return array('RenderView' => array(
            'view' => 'CKEditorBlockBundle:Content:text.html.twig',
            'options' => array('block_manager' => $this, 'content' => $this->alBlock->getContent(), 'id' => $this->alBlock->getId()),
        ));
    }
}