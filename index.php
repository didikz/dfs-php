<?php

include "dfs.php";

$DFS = new dfs();

// data init
$members = array(
				array(
					'nama'=>'kunti',
					'attributes'=>[
					'leftFoot'=>'widia',
					'rightFoot'=>'didik',
					'upline'=>NULL,
					'level'=>0]
				),
				array(
					'nama'=>'widia',
					'attributes'=>[
					'leftFoot'=>'ganita',
					'rightFoot'=>'fifit',
					'upline'=>'kunti',
					'level'=>1]
				),
				array(
					'nama'=>'didik',
					'attributes'=>[
					'leftFoot'=>'roni',
					'rightFoot'=>'ratna',
					'upline'=>'kunti',
					'level'=>1]
				),
				array(
					'nama'=>'ganita',
					'attributes'=>[
					'leftFoot'=>'budi',
					'rightFoot'=>'sulis',
					'upline'=>'widia',
					'level'=>2]
				),
				array(
					'nama'=>'fifit',
					'attributes'=>[
					'leftFoot'=>'catur',
					'rightFoot'=>'roy',
					'upline'=>'widia',
					'level'=>2]
				),
				array(
					'nama'=>'roni',
					'attributes'=>[
					'leftFoot'=>'tina',
					'rightFoot'=>'mia',
					'upline'=>'didik',
					'level'=>2]
				),
				array(
					'nama'=>'ratna',
					'attributes'=>[
					'leftFoot'=>'davin',
					'rightFoot'=>'agus',
					'upline'=>'didik',
					'level'=>2]
				),
			);

// params init
$parent = 'kunti';
$search = 'ratna';

if($DFS::in_array_r($search, $members)) {
	
	$arrange = $DFS->arrangeNetwork($parent, $members);
	$doSearch = $DFS->search($search, $parent, $arrange);

	echo $doSearch;

} else {
	echo 'Member dengan nama '.$search.' tidak ditemukan';
}
