<?php
/**
 * @package		redSlider
 * @subpackage	mod_redslider
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

?>


<div class="mod_redshop_social<?php echo $moduleclass_sfx ?>">

    <?php

    $links = $list['link'];
    if(count($links) > 0)
    {
        sort($links);
        echo '<ul>';
        foreach($links as $i=>$link)
        {
            if(isset($list['show'][$i]) && $list['show'][$i] == '1')
            {
                $image = $list['image'][$i];
                $name = $list['name'][$i];
                echo '<li>';
                echo JHtml::_('link', $link, '<img alt="' . $name . '" src="' . $image . '">');
                echo '</li>';
            }
        }
        echo '</ul>';
    }

    ?>

</div>
