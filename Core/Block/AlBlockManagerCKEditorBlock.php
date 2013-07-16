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

namespace AlphaLemon\Block\CKEditorBlockBundle\Core\Block;

use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\InlineTextBlock\AlBlockManagerInlineTextBlock;

/**
 * Defines the Block Manager to handle a Content managed by CKEditor 
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerCKEditorBlock extends AlBlockManagerInlineTextBlock
{    
    /**
     * {@inheritdoc}
     */
    protected function renderHtml()
    {
        return array('RenderView' => array(
            'view' => 'CKEditorBlockBundle:Content:text.html.twig',
            'options' => array(
                'content' => $this->alBlock->getContent(), 
                'id' => $this->alBlock->getId()
            ),
        ));
    }
}
