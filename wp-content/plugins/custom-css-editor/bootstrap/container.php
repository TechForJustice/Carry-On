<?php
class ffPluginFreshCustomCodeLiteContainer extends ffPluginContainerAbstract {
	/**
	 * 
	 * @var ffPluginPluginDeployerContainer
	 */
	private static $_instance = null;
	
	
	/**
	 * 
	 * @param ffContainer $container
	 * @param string $pluginDir
	 * @return ffPluginFreshCustomCodeContainer
	 */
	public static function getInstance( ffContainer $container = null, $pluginDir = null ) {
		if( self::$_instance == null ) {
			self::$_instance = new ffPluginFreshCustomCodeLiteContainer($container, $pluginDir);
		}
		
		return self::$_instance;
	}
	
	protected function _registerFiles() {
		$pluginDir = $this->_getPluginDir();
		$classLoader =$this->getFrameworkContainer()->getClassLoader(); 
	
		$classLoader->addClass('ffMetaBoxCustomCodeEditor', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodeEditor/class.ffMetaBoxCustomCodeEditor.php');
		$classLoader->addClass('ffMetaBoxCustomCodeEditorView', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodeEditor/class.ffMetaBoxCustomCodeEditorView.php');

		$classLoader->addClass('ffMetaBoxCustomCodeLogic', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodeLogic/class.ffMetaBoxCustomCodeLogic.php');
		$classLoader->addClass('ffMetaBoxCustomCodeLogicView', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodeLogic/class.ffMetaBoxCustomCodeLogicView.php');
		
		$classLoader->addClass('ffMetaBoxCustomCodeType', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodeType/class.ffMetaBoxCustomCodeType.php');
		$classLoader->addClass('ffMetaBoxCustomCodeTypeView', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodeType/class.ffMetaBoxCustomCodeTypeView.php');
		
		$classLoader->addClass('ffMetaBoxCustomCodePlacement', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodePlacement/class.ffMetaBoxCustomCodePlacement.php');
		$classLoader->addClass('ffMetaBoxCustomCodePlacementView', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodePlacement/class.ffMetaBoxCustomCodePlacementView.php');
		
		$classLoader->addClass('ffOptionsHolderCustomCodePlacement', $pluginDir.'/adminScreens/metaBoxes/metaBoxCustomCodePlacement/class.ffOptionsHolderCustomCodePlacement.php');
		
	}
	
}