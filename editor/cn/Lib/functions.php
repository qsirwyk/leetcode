<?php
require_once "BinaryTree.php";
function showTree($arrTree) {
    $a = new BinaryTree($arrTree);
    $a->showTree($a);
}