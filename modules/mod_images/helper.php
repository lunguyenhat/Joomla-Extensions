<?php
/**
 * @package     RedSHOP
 * @subpackage  mod_images
 * @copyright   Copyright (C) 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * redSHOP social Helper.
 *
 * @package     Redcore
 * @subpackage  Form
 * @since       1.0
 */
class ModImagesHelper
{
	/**
	 * Method to get list data.
	 *
	 * @param   array  $params  params of the module.
     *
	 * @return array.
	 */
	static function getImage($params)
	{
		$image = '';
		$jinput = JFactory::getApplication()->input;

		$id 	= $jinput->get('id', 0);
		$option = $jinput->get('option', '');
		$view 	= $jinput->get('view', '');

		if ($option == 'com_content')
		{
			if ($view == 'article')
			{
				$image = modImagesHelper::getArticle($id);
			}
			else if ($view == 'category')
			{
			}
		}
		else
		{
			$image = $params->get('defaultimage');
		}

		return $image;
	}

	/**
	 * Method to get image from Content component.
     *
     * @param   string  $article_id  article id.
     *
	 * @return string.
	 */
	private static function getArticle($article_id)
	{
		JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');

		$app = JFactory::getApplication();
		$appParams = $app->getParams();

		// Get an instance of the generic articles model
		$article = JModelLegacy::getInstance('Article', 'ContentModel', array('ignore_request' => true));

		$article->setState('params', $appParams);
		$article->setState('filter.published', 1);
		$article->setState('article.id', (int) $article_id);
		$item = $article->getItem();

		$images = json_decode($item->images);

		return $images->image_fulltext;
	}
}
