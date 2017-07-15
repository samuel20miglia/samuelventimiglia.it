<?php
namespace App\Action;

use Zend\Diactoros\Response\JsonResponse, Psr\Http\Message\ResponseInterface, Psr\Http\Message\ServerRequestInterface, Zend\Mail\Message, Zend\Mail\Transport\Smtp as SmtpTransport, Zend\Mail\Transport\SmtpOptions;

/**
 *
 * @author ghostbyte
 *
 */
class SendRequestAction
{

    //private $router;

    // private $template;
    private $config;

    public function __construct( $config)
    {

        // $this->template = $template;
        $this->config = $config;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {

        $requestData = $request->getParsedBody();

        $requestNumber = time() . rand(0, 9999);


        $mail = new Message();



        $mailBody = "\nDear {$requestData['name']},\n\n";
        $mailBody .= "Thank you for your request, responde you will be a pleasure.\n\n";
        $mailBody .= "Ventimiglia Samuel owner of samuelventimiglia.it\n";

        $mail->setBody($mailBody);
        $mail->setFrom('info@samuelventimiglia.it', "Info Samuel Ventimiglia");


        $mail->addTo($requestData['email']);
        $mail->setSubject('CONTACT REQUEST NUMBER: ' . $requestNumber);

        // Setup SMTP transport using LOGIN authentication
        $transport = new SmtpTransport();
        $options = new SmtpOptions(array(
            'name' => 'smtp',
            'host' => 'secureuk8.sgcpanel.com',
            'port' => 587,
            'connection_class' => 'login',
            'connection_config' => array(
                'username' => 'info@samuelventimiglia.it',
                'password' => 'Sam18$_venti',
                'ssl' => 'tls'
            )
        )
        );

        $transport->setOptions($options);

        $transport->send($mail);

        $mail = new Message();

        $subject = strtoupper($requestData['subject']);
        $mailBodyServer = "\nDear Samuel,\n\n";
        $mailBodyServer .= "You have a new request.\n\n";
        $mailBodyServer .= "SUBJECT:\n";
        $mailBodyServer .= "{$subject}.\n";

        $mailBodyServer .= "MESSAGE: \n";
        $mailBodyServer .= "{$requestData['mess']}.\n";

        $mail->setBody($mailBodyServer);
        $mail->setFrom('info@samuelventimiglia.it', "Info Samuel Ventimiglia");


        $mail->addTo('info@samuelventimiglia.it');
        $mail->setSubject('CONTACT REQUEST NUMBER: ' . $requestNumber);

        // Setup SMTP transport using LOGIN authentication
        $transport = new SmtpTransport();
        $options = new SmtpOptions(array(
            'name' => 'smtp',
            'host' => 'secureuk8.sgcpanel.com',
            'port' => 587,
            'connection_class' => 'login',
            'connection_config' => array(
                'username' => 'info@samuelventimiglia.it',
                'password' => 'Sam18$_venti',
                'ssl' => 'tls'
            )
        )
            );

        $transport->setOptions($options);

        $transport->send($mail);

        $response = [];
        $response['status'] = 1;
        $response['message'] = 'Thank you,request sended correctly, check your email';
        $response['description'] = 'REQUEST NUMBER: '.$requestNumber;


        return new JsonResponse($response);
    }
}

