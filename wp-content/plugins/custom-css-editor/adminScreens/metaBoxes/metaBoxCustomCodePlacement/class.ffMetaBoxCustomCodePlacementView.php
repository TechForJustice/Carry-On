<?php

class ffMetaBoxCustomCodePlacementView extends ffMetaBoxView {
	
	protected function _requireAssets() {
		ffContainer::getInstance()->getScriptEnqueuer()->getFrameworkScriptLoader()->requireFrsLib();
		ffContainer::getInstance()->getScriptEnqueuer()->getFrameworkScriptLoader()->requireFrsLibOptions();
		ffContainer::getInstance()->getFrameworkScriptLoader()->requireFfAdmin();
	}
	
	protected function _render( $post ) {
		$fwc = ffContainer::getInstance();
		$s = $fwc->getOptionsFactory()->createStructure('type');
		
		$s->startSection('radio');
		$s->addElement( ffOneElement::TYPE_HTML,'', '<div id="post-formats-select" class="ff-custom-code-placement">');
		
		$s->addOption(ffOneOption::TYPE_RADIO, 'extern_file', '', 'inline')
		->addSelectValue('Inline', 'inline')
		->addSelectValue('External', 'external');
		
		//$s->addElement( ffOneElement::TYPE_HTML,'', '<br>');
		
		$s->addOption(ffOneOption::TYPE_RADIO, 'placement', '', 'header')
		->addSelectValue('Header', 'header')
		->addSelectValue('Footer', 'footer');
		
		$s->addOption(ffOneOption::TYPE_SELECT, 'priority', 'Priority ', '5')
		->addSelectValue('1 (highest)', '1')
		->addSelectValue('2', '2')
		->addSelectValue('3', '3')
		->addSelectValue('4', '4')
		->addSelectValue('5 (default)', '5')
		->addSelectValue('6', '6')
		->addSelectValue('7', '7')
		->addSelectValue('8', '8')
		->addSelectValue('9', '9')
		->addSelectValue('10 (lowest)', '10');
		
		
		

		
		$s->addElement( ffOneElement::TYPE_HTML,'', '</div>');
		$s->endSection();
		
		$s = ffContainer::getInstance()->getOptionsFactory()->createOptionsHolder('ffOptionsHolderCustomCodePlacement')->getOptions();
		
		
		$value = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade(  $post->ID )->getOption('customcode_placement');
		
		$printer = $fwc->getOptionsFactory()->createOptionsPrinterBoxed( $value, $s );
		$printer->setNameprefix('customcode_placement');
		$printer->walk();	}
	
	protected function _save( $postId ) {
		
		$fwc = ffContainer::getInstance();
		$saver = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade( $postId );
		$saver->setOption( 'customcode_placement' , $fwc->getOptionsFactory()->createOptionsPostReader()->getData( 'customcode_placement') );
		
	}
}

