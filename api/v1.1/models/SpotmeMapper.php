<?php

require "../database/db.php";

class SpotmeMapper
{
    protected $db;
    protected $request;

    //Constructor -- setting up db connection and 
    //taking in request
    public function __construct(Request $request)
    {
        $dbConnection = new DBHandler();
        $this->db = $dbConnection->connect();
        $this->request = $request;
    }

} 
