<?php

function uploadImage($folder,$image)
{
$extension=strtolower($image->extension());
$filename=time().rand(100,999).'.'.$extension;
$image->getClientOrignalName=$filename;
$image->move($folder,$filename);
return $filename;
}

