<?php

class Contact_Controller_Service extends Com_Module_Controller_Json {

    public function Save() {
        if ($this->isPost()) {
            $obj = $this->getPostObject();
            Contact_Model_Contact::getInstance()->doInsert($obj, null);
            $this->sendEmail($obj->Email, $obj->Name, $obj->Message);
            echo json_encode(true);
        }
    }

    private function sendEmail($emailClient, $nameClient, $messageClient) {

        $to = EMAIL_USERNAME;
        $subject = 'CONTACTO DESDE QWERTY.COM.BO';
        $message = '<html><body>';
        $message .= '<h3>Nombre: </h3>'.$nameClient.'<h3>Mensaje: </h3>'.$messageClient;
        $message .= '</body></html>';
        $headers = 'From:'.$emailClient . "\r\n" .
                'Reply-To:'.$emailClient. "\r\n" .
                'Content-Type: text/html; charset=ISO-8859-1\r\n';
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

    }

}
