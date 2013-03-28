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
    
    public function getHtml()
    {
        return array('RenderView' => array(
            'view' => 'CKEditorBlockBundle:Content:text.html.twig',
            'options' => array('content' => $this->alBlock->getContent(), 'id' => $this->alBlock->getId()),
        ));
    }
}