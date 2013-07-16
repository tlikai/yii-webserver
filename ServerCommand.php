<?php
/**
 * Servercommand class file
 *
 * @author Likai <youyuge@gmail.com>
 * @link http://youyuge.com/
 */

/**
 * This command provider development web server
 *
 * @author Likai <youyuge@gmail.com>
 * @since 1.0
 */
class ServerCommand extends CConsoleCommand
{
    /**
     * @var string host name
     */
    public $host = '127.0.0.1';

    /**
     * @var string host port
     */
    public $port = '8888';

    /**
     * @var string document root
     */
    public $root = './';

    /**
     * @var string router script file
     */
    public $router = null;

    /**
     * Print this command help
     */
    public function getHelp()
	{
		return <<<EOD
USAGE
    yiic serve index [--host=] [--port=] [--root=] [--router=]

DESCRIPTION
    This command provider development web server

PARAMETERS
    --host host address
    --port host port
    --root document root
    --router router script file
EOD;
	}

	/**
	 * Starting Yii Development Web Server
	 */
	public function actionIndex($host = null, $port = null, $root = null, $router = null)
	{
		if (version_compare(PHP_VERSION, '5.4.0', '<')) {
			throw new Exception('Require PHP5.4 or later');
		}

        $host = $host ?: $this->host;
        $port = $port ?: $this->port;
        $root = $root ?: $this->root;
        $router = $router ?: $this->router;

        $root = realpath($root);

        if (!is_dir($root)) {
            throw new Exception('Document root does not exist.');
        }

        echo "Yii development server started on http://{$host}:{$port}\n";
        echo "Document root is  $root\n";
        echo "Press Ctrl-C to quit\n";

        passthru("php -S $host:$port -t $root $router");
	}
}
