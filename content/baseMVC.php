<?php

interface IModel
{
	static function &domain();
	static function C($query = "");
	static function R($query = "");
	static function U($query = "");
	static function D($query = "");
}

interface IView
{
	static function display($query = "");
}

interface IController
{
	static function control($query = "");
}

?>