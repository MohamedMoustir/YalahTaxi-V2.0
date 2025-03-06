<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('YalahTaxi', function ($user) {
    return true; 
});
