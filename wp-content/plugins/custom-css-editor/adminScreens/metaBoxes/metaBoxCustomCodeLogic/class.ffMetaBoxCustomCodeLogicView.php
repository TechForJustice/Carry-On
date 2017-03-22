<?php

class ffMetaBoxCustomCodeLogicView extends ffMetaBoxView {
	
	protected function _requireAssets() {
		ffContainer::getInstance()->getScriptEnqueuer()->getFrameworkScriptLoader()->requireFrsLib();
		ffContainer::getInstance()->getScriptEnqueuer()->getFrameworkScriptLoader()->requireFrsLibOptions();
		ffContainer::getInstance()->getFrameworkScriptLoader()->requireFfAdmin();
	}
	
	protected function _render( $post ) {
		
		$fwc = ffContainer::getInstance();
		$conditionalLogic  = $fwc->getOptionsFactory()->createOptionsHolder('ffOptionsHolderConditionalLogic');
	
		
		$value = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade(  $post->ID )->getOption('customcode_logic'); 
		
		$printer = $fwc->getOptionsFactory()->createOptionsPrinterLogic( $value, $conditionalLogic->getOptions() );
		$printer->setNameprefix('customcode_logic');
        echo 'This is light version of plugin shows only 1 Custom Code (your latest). For showing more codes <a class="button button-primary button-hero" href="http://freshface.net/extern-links/custom-css-lite-to-fresh-custom-code.php" target="_blank">Buy PRO version</a></br></br>';
		$printer->walk();
//        echo '<p><img src="http://assets.freshface.net/featured-popup.png"></p>';
	}
	
	protected function _save( $postId ) {
		$fwc = ffContainer::getInstance();
		$saver = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade( $postId );
		$saver->setOption( 'customcode_logic' , $fwc->getOptionsFactory()->createOptionsPostReader()->getData( 'customcode_logic') );
	}
}

