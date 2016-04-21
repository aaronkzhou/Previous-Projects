<?php

class BinaryNode{
	public $test=1;
	public  $value;
	public $left;
	public $right;
	public function __construct($item){
		$this->value=$item;
		$this->left=null;
		$this->right=null;
	}
}
class BinaryTree{

	protected $root;
	
	public function __construct(){
		$this->root=null;
	}
	public function isEmpty(){
		return $this->root===null;
	}
	public function insert($item) {
	        $node = new BinaryNode($item);
	        if ($this->isEmpty()) {
	            // special case if tree is empty
	            $this->root = $node;
	        }
	        else {
	            // insert the node somewhere in the tree starting at the root
	            $this->insertNode($node, $this->root);
	        }
	}
	protected function insertNode($node, $subtree) {
	        if ($subtree === null) {
	            // insert node here if subtree is empty
	            $subtree = $node;
	        }
	        else {
	            if ($node->value > $subtree->value) {
	                // keep trying to insert right
	                $this->insertNode($node, $subtree->right);
	            }
	            else if ($node->value < $subtree->value) {
	                // keep trying to insert left
	                $this->insertNode($node, $subtree->left);
	            }
	            else {
	                // reject duplicates
	            }
	        }
	 }
	 public function traverse() {
	        // dump the tree rooted at "root"
	        $this->root->dump();
	 }
}




