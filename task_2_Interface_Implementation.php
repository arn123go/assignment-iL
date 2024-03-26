<?php

// This is the "interface" which will be implemented in upcoming classes.
interface LoggerInterface {
    public function log( string $message );
}

// This will be used as a dependency
class ConsoleLogger implements LoggerInterface {
    public function log( string $message ) {
        echo $message . PHP_EOL;
    }
}

// This will be used as a dependency
class FileLogger implements LoggerInterface {
    private $filePath;
    private $error;

    public function __construct( string $filePath ) {
        $this->filePath = $filePath;
    }

    public function log( string $message ) {
        file_put_contents( $this->filePath, $message . PHP_EOL, FILE_APPEND );
    }
}

// This is the dependency manager
class LogManager {
    private $logger;

    public function __construct( LoggerInterface $logger ) {
        $this->logger = $logger;
    }

    public function runLogger() {
        $this->logger->log( 'This is a log message.' );
    }
}

// Put the message to log.
$logMessage = "This is a log message";

// Put the log file path provided that you have permission to write.
$logFile = "/home/path/to/file/logFile.txt";

$consoleLogger = new ConsoleLogger();
$logManRaw = new LogManager( $consoleLogger );
$logManRaw->runLogger();

$fileLogger = new FileLogger( $logFile );
$logManFile = new LogManager( $fileLogger );
$logManFile->runLogger();