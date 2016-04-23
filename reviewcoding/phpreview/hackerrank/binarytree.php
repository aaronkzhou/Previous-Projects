<?php

class Node{
    public $value;
    public $left;
    public $right;
    public $parent;
    public function __construct($value,Node $parent = null){
        $value=$this->value;
        $this->parent = $parent;
    }
    public function min()
    {
        $node = $this;
        while ($node->left) {
            if (!$node->left) {
                break;
            }
            $node = $node->left;
        }
        return $node;
    }
    public function max()
    {
        $node = $this;
        while ($node->right) {
            if (!$node->right) {
                break;
            }
            $node = $node->right;
        }
        return $node;
    }
}
class BST{
    public $root;
    public function __construct($value=null){
        if ($value!==null) {
            $this->root=new Node($value);
        }
    }
    public function search($value){
        $node=$this->root;
        while($node) {
            if ($value > $node->value) {
                $node = $node->right;
            } elseif ($value < $node->value) {
                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }
    public function insert($value){
        $node=this->root;
        if (!node) {
            return $this->root=new Node($value);
        }
        while($node){
            if ($value>$node->value) {
                if($node->right){
                    $node=$node->right;
                }else{
                    $node=$node->right=new Node($value,$node);
                }
            }elseif ($value<$node->value) {
                if ($node->left) {
                    $node=$node->left;
                }else{
                    $node=$node->left=new Node($value,$node);
                }
            }else{
                break;
            }
        }
        return $node;
    }
    public function min()
    {
        if (!$this->root) {
            throw new Exception('Tree root is empty!');
        }

        $node = $this->root;
        return $node->min();
    }
    public function max()
    {
        if (!$this->root) {
            throw new Exception('Tree root is empty!');
        }

        $node = $this->root;
        return $node->max();
    }
    public function delete($value)
    {
        $node = $this->search($value);
        if ($node) {
            $node->delete();
        }
    }
    public function delete()
    {
        if ($this->left && $this->right) {
            $min = $this->right->min();
            $this->value = $min->value;
            $min->delete();
        } elseif ($this->right) {
            if ($this->parent->left === $this) {
                $this->parent->left = $this->right;
                $this->right->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->right;
                $this->right->parent = $this->parent->right;
            }
            $this->parent = null;
            $this->right   = null;
        } elseif ($this->left) {
            if ($this->parent->left === $this) {
                $this->parent->left = $this->left;
                $this->left->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->left;
                $this->left->parent = $this->parent->right;
            }
            $this->parent = null;
            $this->left   = null;
        } else {
            if ($this->parent->right === $this) {
                $this->parent->right = null;
            } elseif ($this->parent->left === $this) {
                $this->parent->left = null;
            }
            $this->parent = null;
        }
    }
    public function walk(Node $node = null)
    {
        if (!$node) {
            $node = $this->root;
        }
        if (!$node) {
            return false;
        }
        if ($node->left) {
            yield from $this->walk($node->left);
        }
        yield $node;
        if ($node->right) {
            yield from $this->walk($node->right);
        }
    }

}