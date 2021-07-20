<?php

use Dotenv\Dotenv;

function loadEnv()
{
    $dotenv = Dotenv::createImmutable(__DIR__.'/..');
    $dotenv->load();
}

function getDbParams()
{
    return require __DIR__.'/database.php';
}

function get_env($key)
{
    return (isset($_ENV[$key])) ? $_ENV[$key] : false;
}

function get($key)
{
    return (isset($_GET[$key])) ? $_GET[$key] : false;
}

function post($key)
{
    return (isset($_POST[$key])) ? $_POST[$key] : false;
}
function dump($var, $region = false, $right = false)
{
	$style = '';
	if($region){
		$style = 'width:100%;height:100%;overflow:auto;position:fixed;top:120px;'.($right ? 'right' : 'left').':0;max-width:400px;max-height:400px;z-index:1000000;';
	}
	
		$bt = debug_backtrace();
		$bt = $bt[0];
		$dRoot = $_SERVER["DOCUMENT_ROOT"];
		$dRoot = str_replace("/", "\\", $dRoot);
		$bt["file"] = str_replace($dRoot, "", $bt["file"]);
		$dRoot = str_replace("\\", "/", $dRoot);
		$bt["file"] = str_replace($dRoot, "", $bt["file"]);
		?>
        <div id="debug-window" style='font-size:9pt; color:#000; background:#fff; border:1px dashed #000;<?=$style?>;line-height: normal;'>
            <div style='padding:3px 5px; background:#99CCFF; font-weight:bold;'>File: <?= $bt["file"] ?> [<?= $bt["line"] ?>]</div>
            <pre style='padding:10px;display: block;'><? print_r($var) ?></pre>
        </div>
		<?
}