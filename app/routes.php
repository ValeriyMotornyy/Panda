<?php
// Home
$app->get('/', App\Controllers\VideoController::class . ':index');

// Video
$app->get('/video', App\Controllers\VideoController::class . ':video');
$app->get('/videos', App\Controllers\VideoController::class . ':videos');
$app->get('/video-encodings', App\Controllers\VideoController::class . ':encodings');
$app->get('/video-metadata', App\Controllers\VideoController::class . ':metaData');

// Encoder
$app->get('/encodings', App\Controllers\EncoderController::class . ':encodings');
$app->get('/encoding', App\Controllers\EncoderController::class . ':encoding');

// Profile
$app->get('/profile', App\Controllers\ProfileController::class . ':profile');
