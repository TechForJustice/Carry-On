<?php

class ffGraphicFactory extends ffFactoryAbstract {
	public function getImageInformator( $imageUrl ) {
		$this->_getClassloader()->loadClass('ffImageInformator');
		
		$container = ffContainer::getInstance();
		
		$imageInformator = new ffImageInformator( $container->getFileSystem() );
		$imageInformator->setImageUrl( $imageUrl );
		
		
		return $imageInformator;
		
	}
}