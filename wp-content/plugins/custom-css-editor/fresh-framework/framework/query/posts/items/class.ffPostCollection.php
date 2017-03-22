<?php

class ffPostCollection extends ffBasicObject implements Iterator {
	

	protected $_collectionItems = array();

	protected $_valid = false;

	public function __construct(){

	}
	
	public function getNumberOfItems() {
		return count( $this->_collectionItems );
	}

	public function add( ffPostCollectionItem $item ){
		$this->_collectionItems[] = $item;
	}

	/* Methods */
	/**
	 * (non-PHPdoc)
	 * @see Iterator::current()
	 * @return ffPostCollectionItem
	 */
	public function current () {
		return current( $this->_collectionItems );
	}

	public function key () {
		return key( $this->_collectionItems );
	}

	public function next () {
		$isValid =  next( $this->_collectionItems );
		if( false == $isValid ) {
			$this->_valid = false;
		}
	}

	public function rewind () {
		$this->_valid = true;
		return reset( $this->_collectionItems );
	}

	public function valid () {
		return $this->_valid;
	}

}



