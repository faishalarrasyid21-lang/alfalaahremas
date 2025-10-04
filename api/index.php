<?php

// Set proper paths for Vercel
$publicPath = __DIR__ . '/../public';
$basePath = __DIR__ . '/..';

// Change to the correct directory
chdir($basePath);

// Set environment variables
$_ENV['APP_ENV'] = 'production';
$_ENV['APP_DEBUG'] = 'false';

// Create SQLite database if it doesn't exist
$dbPath = '/tmp/database.sqlite';
if (!file_exists($dbPath)) {
    touch($dbPath);
    
    // Copy initial database if exists
    $localDb = $basePath . '/database/database.sqlite';
    if (file_exists($localDb)) {
        copy($localDb, $dbPath);
    }
}

// Forward to Laravel
require_once $publicPath . '/index.php';