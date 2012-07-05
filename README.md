#li3_monitor#

##Installation##

### Library
* With Git Submodule
	
```bash
cd path/to/your/lithium/libraries
git submodule add https://github.com/JacopKane/li3_monitor.git
git submodule sync
git submodule init li3_monitor
git submodule update
```

* With Git Clone
	
```bash
cd path/to/your/lithium/libraries
git clone https://github.com/JacopKane/li3_monitor/zipball/master
```

* Download [from here](https://github.com/JacopKane/li3_monitor/zipball/master)

##Example##

```php
<?php
//app/config/bootstrap/libraries.php
Libraries::add('li3_monitor');

//app/foo/bar.php
namespace app/foo/bar

use li3_monitor\extensions\adapter\analysis\logger\Monitor;

Monitor::debug(compact('foo', 'bar'), $another, $param, $bla, $bla);
?>
```

```bash
cd path/to/your/lithium/app/resources/tmp/logs
tail -f -n 1000 debug.log
```

##To-do##
* Nothing so far, feel free to suggest and contribute.

##Me##
[@JacopKane](https://twitter.com/JacopKane)