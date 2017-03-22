<?php

class ffOptionsHolderCustomCodePlacement extends ffOptionsHolder {
	const SECTION_NAME = 'ff-custom-code-placement';
	public function getOptions() {
		$struct = $this->_getOnestructurefactory()
		->createOneStructure( ffOptionsHolderCustomCodePlacement::SECTION_NAME );
	
		$struct->startSection('radio');
		$struct->addElement( ffOneElement::TYPE_HTML,'', '<div id="post-formats-select" class="ff-custom-code-placement">');
		
		$struct->addElement( ffOneElement::TYPE_HTML,'', '<p>');
		$struct->addOption(ffOneOption::TYPE_RADIO, 'extern_file', '', 'inline')
		->addSelectValue('Inline', 'inline')
		->addSelectValue('External File', 'external');
		$struct->addElement( ffOneElement::TYPE_HTML,'', '</p>');
		
		//$struct->addElement( ffOneElement::TYPE_HTML,'', '<br>');
		
		$struct->addElement( ffOneElement::TYPE_HTML,'', '<p>');
		$struct->addOption(ffOneOption::TYPE_RADIO, 'placement', '', 'header')
		->addSelectValue('Header', 'header')
		->addSelectValue('Footer', 'footer');
		$struct->addElement( ffOneElement::TYPE_HTML,'', '</p>');
		
		$struct->addOption(ffOneOption::TYPE_SELECT, 'priority', 'Priority ', '5')
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
		
		$struct->addElement( ffOneElement::TYPE_HTML,'', '</div>');
		
		$struct->addElement( ffOneElement::TYPE_HTML,'', '<p class="ff-php-info">You can write here what you would normally write in functions.php</p><p class="ff-php-info">Your PHP code will be hooked to the <a href="http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme"><code>after_setup_theme</code></a> action and will be printed on front end only.</p>');
		$struct->endSection();
			
		return $struct;
	}
}