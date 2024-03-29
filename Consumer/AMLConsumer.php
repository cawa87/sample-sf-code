<?php

namespace App\Consumer;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;

class AMLConsumer implements ConsumerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface  $logger)
    {
        $this->logger = $logger;
    }

    public function execute(AMQPMessage $msg)
    {
        $properties = $msg->get_properties();

        $this->logger->info('Got message ' . print_r($msg->getBody(), true), [
            'properties' => $properties,
        ]);

        echo 'Got message ' . $msg->getBody();

        //Process picture upload.
        //$msg will be an instance of `PhpAmqpLib\Message\AMQPMessage` with the $msg->body being the data sent over RabbitMQ.

        /*$isUploadSuccess = someUploadPictureMethod();
        if (!$isUploadSuccess) {
            // If your image upload failed due to a temporary error you can return false
            // from your callback so the message will be rejected by the consumer and
            // requeued by RabbitMQ.
            // Any other value not equal to false will acknowledge the message and remove it
            // from the queue
            return false;
        }*/
    }
}