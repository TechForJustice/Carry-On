<?php

class ffMetaBoxCustomCodeType extends ffMetaBox {
	protected function _initMetaBox() {
		$this->_addPostType( ffPluginFreshCustomCodeLite::CUSTOMCODE_POST_TYPE_SLUG );
		$this->_setTitle('Custom Code Type');
		$this->_setContext( ffMetaBox::CONTEXT_SIDE);
		
		$this->_setParam( ffMetaBox::PARAM_NORMALIZE_OPTIONS, true);
	}
}