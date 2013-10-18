<?php
/**
 * @package        redShopSocial
 * @subpackage     mod_redshop_social
 * @copyright      Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
class modRedShopSocialHelper
{
    /**
     * Method to get list data.
     *
     * @params  array params of the module.
     *
     * @return   array.
     */
    static function &getList(&$params)
    {
        $list = array();
        $p = $params->toArray();
        if (count($p) > 0)
        {
            foreach ($p as $key => $param)
            {
                $name = explode("_", $key);
                $social = $name[0];
                $type = isset($name[1]) ? $name[1] : '';
                if ($type == "image" && empty($param))
                {
                    $param = JURI::base() . "modules/mod_redshop_social/assets/images/" . $social . '.png';
                }
                $order = $params->get($social . '_order');
                $list[$type][$order] = $param;

                if(!empty($social))
                {
                    $list['name'][$order] = $social;
                }
            }
        }
        return $list;
    }

}
