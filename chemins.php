<?php
//Define('SLASH', (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? '\\' : '/'));

// si nous utilisons l'administration;
$racine =
    defined("RACINE_ADMIN") ?
        dirname(RACINE_ADMIN, 1) . '/' :
        dirname(__FILE__) . '/';


define('RACINE', $racine);
const MODULES = RACINE . 'modules' . '/';
const DB = RACINE . 'db' . '/';
const CFG = RACINE . 'cfg' . '/';
const THEMES = RACINE . 'themes' . '/';
