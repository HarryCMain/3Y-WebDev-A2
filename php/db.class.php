<?php
class db extends mysqli
{
    protected static $instance;
	const host ='comp-server.uhi.ac.uk';
	const user ='pe18011506';
	const pass ='harrymain';
	const schema ='pe18011506';
	const port =3306;
	const sock =false;

    private function __construct() {

        // turn of error reporting
        mysqli_report(MYSQLI_REPORT_OFF);

        // connect to database
        @parent::__construct(self::host,self::user,self::pass,							self::schema,self::port,self::sock);

        // check if a connection established
        if( mysqli_connect_errno() ) {
            throw new exception(mysqli_connect_error(), mysqli_connect_errno()); 
        }
    }

    public static function getInstance() {
        if( !self::$instance ) {
            self::$instance = new self(); 
        }
        return self::$instance;
    }	
}
?>
