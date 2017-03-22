<?php

class ffMetaBoxCustomCodeEditorView extends ffMetaBoxView {
	
	protected function _requireAssets() {
		$pluginUrl = ffPluginFreshCustomCodeLiteContainer::getInstance()->getPluginUrl();
		ffContainer::getInstance()->getScriptEnqueuer()->addScript('ff-custom-code-metabox-helper', $pluginUrl.'/assets/js/customCodeMetaboxHelper.js');
		ffContainer::getInstance()->getStyleEnqueuer()->addStyle('ff-custom-code-less', $pluginUrl.'/assets/css/customCode.less');
	}
	
	protected function _render( $post ) {


		$fwc = ffContainer::getInstance();
		$s = $fwc->getOptionsFactory()->createStructure('code');
		
	
		
		$s->startSection('code');			
			$s->addElement(ffOneElement::TYPE_HTML,'', '<div class="ff-editor-before"><div class="ff-editor-before-inner"></div><div class="ff-editor-before-text-holder">&lt;script type="text/javascript"&gt;</div></div>');
			$s->addOption(ffOneOption::TYPE_CODE, 'code');
			$s->addElement(ffOneElement::TYPE_HTML,'', '<div class="ff-editor-after"><div class="ff-editor-after-inner"></div><div class="ff-editor-after-text-holder">&lt;/script&gt;</div></div>');
		$s->endSection();
		
		
		$value = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade(  $post->ID )->getOption('customcode_code');
		
		
		$printer = $fwc->getOptionsFactory()->createOptionsPrinterBoxed( $value, $s );
		$printer->setNameprefix('customcode_code');
		$printer->walk();
	}
	
	/**
	 * When inserted less file, this function compile it and save in post meta
	 * @param unknown $realValue
	 */
	protected function _compileLessFiles( $realValue ) {
		$fwc = ffContainer::getInstance();
		$WPLayer=  $fwc->getWPLayer();
		$mixins = $fwc->getFileSystem()->getContents( $WPLayer->getFrameworkDir().'/framework/adminScreens/assets/css/ff-mixins.less');
		$valueWithMixins = $mixins . "\n" . $realValue;
		$compiled = $fwc->getLessParser()->compile($valueWithMixins );
		
		return $compiled;
	}
	
	protected function _save( $postId ) {
//        var_dump( $_POST )
//        ;
//        die();
		$fwc = ffContainer::getInstance();
		$saver = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas_NamespaceFacade( $postId );

		
		$typeArray =  $fwc->getOptionsFactory()->createOptionsPostReader()->getData( 'customcode_type');
		
		
		
		$type = $typeArray['radio']['type'];
		
		$value = $fwc->getOptionsFactory()->createOptionsPostReader()->getData( 'customcode_code');
	
		if( $type == 'less' ) {
			$compiledFile = $this->_compileLessFiles( $value['code']['code'] );
			$saver->setOption('customcode_less', $compiledFile);
		} else {
			$saver->deleteOption('customcode_less');
		}
		
		$saver->setOption( 'customcode_code' , $value );
	}
}