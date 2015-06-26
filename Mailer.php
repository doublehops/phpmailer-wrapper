<?php


    use PHPMailer;

    /**
     * Validate and send emails
     */
    class Mailer extends PHPMailer
    {
        /**
         * Array of error messages
         */
        protected $errors;

        /**
         * Set PHPMailer debug level
         */
        protected $debug = 0;

        /*
         * Handle of phpMailer
         */
        protected $handle;


        /**
         * @param array $params
         */
        public function __construct(array $params)
        {
            $this->handle = new PHPMailer;

            $this->handle->SMTPDebug = $this->debug;
            $this->handle->isSMTP();
            $this->handle->SMTPSecure = 'tls';
            $this->handle->SMTPAuth = true;

            $this->handle->Host = $params['host'];
            $this->handle->Port = $params['port'];
            $this->handle->Username = $params['username'];
            $this->handle->Password = $params['password'];
            $this->handle->From = $params['from'];
            $this->handle->FromName = $params['fromName'];
            $this->handle->addAddress($params['toAddress'], $params['toName']);
        }

        /**
         * Validate email address
         *
         * @param string $email
         *
         * @return $string
         */
        public function validateEmail($email)
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $this->errors[] = 'You must enter a valida email address';
            }

            return $email;
        }

        /**
         * Validate string
         *
         * @param string $string
         * @param string $variableName
         * @param integer $minLength
         *
         * @return string
         */
        public function validateString($string, $variableName, $minLength=1)
        {
            $string = preg_replace('/[^a-zA-Z0-9!@#$%^&*().,<> ]/', '', $string);
            $string = strip_tags($string);
            if(strlen($string) < $minLength) {

                $this->errors[] = $variableName .' Should be at least '. $minLength .' characters long.';
            }

            return $string;
        }

        /**
         * Send email
         *
         * @param string $subject
         * @param string $body
         */
        public function sendMail($subject, $body)
        {
            if($this->errors)
                $this->sendJson($this->errors, false);

            $this->handle->Subject = $subject;
            $this->handle->Body = $body;

            if($this->handle->send())
                $this->sendJson(['message' => 'Mail sent'], true);
            else
                $this->sendJson(['message' => 'Failed to send mail'], false);
        }

        /**
         * Send Json response
         *
         * @param string $message
         * @param string $success
         */
        protected function sendJson(array $message, $success)
        {
            $message['success'] = $success;

            header('Content-Type: application/json');
            echo json_encode($message);
            exit;
        }
    }
