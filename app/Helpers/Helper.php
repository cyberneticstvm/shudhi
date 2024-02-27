<?php

function uploadFile($file, $path)
{
    $fname = time() . '_' . $file->getClientOriginalName();
    $file->storeAs($path, $fname, 'public');
    return '/storage/' . $path . '/' . $fname;
}
