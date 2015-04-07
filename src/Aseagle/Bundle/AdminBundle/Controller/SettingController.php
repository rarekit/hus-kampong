<?php

/**
 * This file is part of the Aseagle package.
 *
 * (c) Quang Tran <quang.tran@aseagle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Aseagle\Bundle\AdminBundle\Controller;

use Aseagle\Bundle\CoreBundle\Helper\Html;

/**
 * SettingController
 *
 * @author Quang Tran <quang.tran@aseagle.com>
 */
class SettingController extends BaseController {

    
    /* (non-PHPdoc)
     * @see \Aseagle\Bundle\AdminBundle\Controller\BaseController::indexAction()
     */
    public function indexAction() {
        return parent::indexAction();
    }
    
    /* (non-PHPdoc)
     * @see \Aseagle\Bundle\AdminBundle\Controller\BaseController::grid()
     */
    protected function grid($entities) {
        $grid = array ();
        foreach ($entities as $item) {
            $grid [] = array (
                '<input type="checkbox" name="ids[]" class="check" value="' . $item->getId() . '"/>',
                '<a href="' . $this->generateUrl('admin_setting_new', array (
                    'id' => $item->getId()
                )) . '">' . $item->getName() . '</a>',
                $item->getKey(),
                $item->getValue(),
                Html::showActionButtonsInTable($this->container, array (
                    'edit' => $this->generateUrl('admin_setting_new', array (
                        'id' => $item->getId()
                    ))
                ))
            );
        }
        
        return $grid;
    }
    
}
