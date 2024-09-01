TurtlePHP-ConcatenationPlugin
======================

### Sample plugin loading:
``` php
require_once APP . '/plugins/TurtlePHP-BasePlugin/Base.class.php';
require_once APP . '/plugins/TurtlePHP-ConcatenationPlugin/Concatenation.class.php';
$path = APP . '/config/plugins/concatenation.inc.php';
TurtlePHP\Plugin\Concatenation::setConcatenationPath($path);
TurtlePHP\Plugin\Concatenation::init();
```
