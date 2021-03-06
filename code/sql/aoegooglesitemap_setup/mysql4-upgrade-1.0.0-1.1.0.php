<?php
$installer = $this; /* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->addAttribute('catalog_category', 'sitemap_exclude', array(
    'group'    => 'General Information',
    'input'    => 'select',
    'type'     => 'text',
    'label'    => 'Exclude from Sitemap',
    'source'   => 'eav/entity_attribute_source_boolean',
    'required' => 0,
    'global'   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'note'     => 'Exclude from xml sitemap generation',
    'default'  => 0
));

$categories = Mage::getModel('catalog/category')->getCollection();
foreach($categories as $category){
    $category->setSitemapExclude(0);
    $category->save();
}

$installer->endSetup();