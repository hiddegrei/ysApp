<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

use function PHPUnit\Framework\throwException;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Messenger\Exception\UnrecoverableMessageHandlingException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Requests
{
   
    public function __construct(
        private HttpClientInterface $client,
        
    ) {
        
    }

    public function getPosts()
    {

        $response = $this->client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/posts',
        );
        $statusCode = $response->getStatusCode();

        if ($statusCode == 200) {
            $content = $response->toArray();
            return $content;
        } else {
            
                $message = 'something went wrong';
                throw new HttpException($statusCode, $message);
        }
       

    }

   
}
