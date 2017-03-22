<?php

class ffMetaBoxCustomCodeTypeView extends ffMetaBoxView {
	
	protected function _requireAssets() {
		ffContainer::getInstance()->getScriptEnqueuer()->getFrameworkScriptLoader()->requireFrsLib();
		ffContainer::getInstance()->getScriptEnqueuer()->getFrameworkScriptLoader()->requireFrsLibOptions();
		ffContainer::getInstance()->getFrameworkScriptLoader()->requireFfAdmin();
	}
	
	protected function _render( $post ) {
		
		$fwc = ffContainer::getInstance();
		$s = $fwc->getOptionsFactory()->createStructure('type');
		
		$s->startSection('radio');


        $s->addElement( ffOneElement::TYPE_HTML,'', 'This is light version of plugin shows only 1 Custom Code (your latest). For showing more of your codes <a class="button button-primary button-hero" href="http://freshface.net/extern-links/custom-css-lite-to-fresh-custom-code.php" target="_blank">Buy PRO version</a>');
		$s->addElement( ffOneElement::TYPE_HTML,'', '<div id="post-formats-select" class="ff-custom-code-type">');
			$s->addOption(ffOneOption::TYPE_RADIO, 'type', '', 'css')
				->addSelectValue('CSS', 'css')
				->addSelectValue('LESS', 'less')
				->addSelectValue('JavaScript', 'js')
				->addSelectValue('Tracking Code', 'tracking_code')
				->addSelectValue('PHP', 'php');
			// CSS, LESS, jQuery, JavaScript, Tracking Code
			$s->addElement( ffOneElement::TYPE_HTML,'', '</div>');
		$s->endSection();
		
		
		$value = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade(  $post->ID )->getOption('customcode_type');
		
		$printer = $fwc->getOptionsFactory()->createOptionsPrinterBoxed( $value, $s );
		$printer->setNameprefix('customcode_type');
		$printer->walk();
		
	/*	
		$fwc = ffContainer::getInstance();
		$conditionalLogic  = $fwc->getOptionsFactory()->createOptionsHolder('ffOptionsHolderConditionalLogic');
	
		
		$value = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade(  $post->ID )->getOption('customcode_logic'); 
		
		$printer = $fwc->getOptionsFactory()->createOptionsPrinterLogic( $value, $conditionalLogic->getOptions() );
		$printer->setNameprefix('customcode_logic');
		$printer->walk();
		*/
	}
	
	protected function _save( $postId ) {
		$fwc = ffContainer::getInstance();
		$saver = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade( $postId );
		
		
		$saver->setOption( 'customcode_type' , $fwc->getOptionsFactory()->createOptionsPostReader()->getData( 'customcode_type' ) );
	}
}

