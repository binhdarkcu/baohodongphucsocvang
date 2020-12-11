<?php
	require_once('clsMobileDetect.php');
	$clsMobileDetect = new clsMobileDetect();
	if($clsMobileDetect->isIpad())
	{
		$iPad = TRUE;
	}
	else if($clsMobileDetect->isTablet())
	{
		$iTablet = TRUE;
	}
	else if($clsMobileDetect->isMobile())
	{
		$iMobile = TRUE;
	}
	else
	{
		$isDesktop = TRUE;
	}
	
