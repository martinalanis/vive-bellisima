<?php

function active($keyword)
{
	return strpos(request()->path(), $keyword) !== false ? 'active' :'';
}