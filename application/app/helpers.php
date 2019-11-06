<?php

use App\Setting;


function getSettings()
{
    return Setting::find(1);
}