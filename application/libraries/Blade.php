<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Xiaoler\Blade\FileViewFinder;
use Xiaoler\Blade\Factory;
use Xiaoler\Blade\Compilers\BladeCompiler;
use Xiaoler\Blade\Engines\CompilerEngine;
use Xiaoler\Blade\Filesystem;
use Xiaoler\Blade\Engines\EngineResolver;

class Blade
{
  public function __construct()
  {
    $path = [APPPATH . 'views/'];         // your view file path, it's an array
    $cachePath = APPPATH . 'cache/views';     // compiled file path

    $file = new Filesystem;
    $compiler = new BladeCompiler($file, $cachePath);

    // you can add a custom directive if you want
    $compiler->directive('datetime', function($timestamp) {
      return preg_replace('/(\(\d+\))/', '<?php echo date("Y-m-d H:i:s", $1); ?>', $timestamp);
    });

    $resolver = new EngineResolver;
    $resolver->register('blade', function () use ($compiler) {
      return new CompilerEngine($compiler);
    });

    
    // get an instance of factory
    $this->factory = new Factory($resolver, new FileViewFinder($file, $path));

    // if your view file extension is not php or blade.php, use this to add it
    $this->factory->addExtension('tpl', 'blade');
  }

  public function view($path, $vars = [])
  {
      echo $this->factory->make($path, $vars);
  }

  public function exists($path)
  {
      return $this->factory->exists($path);
  }

  public function share($key, $value)
  {
      return $this->factory->share($key, $value);
  }

  public function render($path, $vars = [])
  {
      return $this->factory->make($path, $vars)->render();
  }
}
 
 
 
?>