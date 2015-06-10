<?php

class UsersMapper extends SpotmeMapper
{
    /*getFields
     *  Returns array of fields in format
        api field => database field
     */
    public function getFields() {
        $fields = array(
            "user_id" => "USER_ID",
            "username" => "USERNAME",
            "first_name" => "FIRST_NAME",
            "last_name" => "LAST_NAME",
            "email" => "EMAIL");

        return $fields;
    }

    public function getUsers($where=null, $order=null, $limit=null) {
        $sql = "select USER_ID, USERNAME, FIRST_NAME, LAST_NAME, EMAIL "
             . "from USER ";

        if($where) {
            $sql .= "where " . $where . " ";
        }
        if($order) {
            $sql .= "order by " . $order . " ";
        }
        if($limit) {
            $sql .= "limit " . $limit . " ";
        }

        $stmt = $this->db->prepare($sql);
        $response = $stmt->execute();

        if($response) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        return false;
    }

    public function getUserById($user_id) {
        $results = $this->getUsers("USER_ID=" . (int)$user_id, null, 1);

        return $results;
    }

    public function getUserByCarId($car_id) {
        //first, get user id 
        $sql = "select USER_ID from USER_CAR where CAR_ID=" . (int)$car_id;  
        $stmt = $this->db->prepare($sql);
        $response = $stmt->execute();
        if($response) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        return false;
    } 

    public function getUserBySpotId($car_id) {
        $sql = "select USER_ID from USER_SPOT where SPOT_ID=" . (int)$spot_id;
        $stmt = $this->db->prepare($sql);
        $response = $stmt->execute();
        if($response) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        return false;
    }
        

    public function getUserByUsername($username) {
        //Use PDO placeholder array since taking in a string
        $sql = "select USER_ID,USERNAME,FIRST_NAME,LAST_NAME,EMAIL "
             . "from USER where USERNAME=:username";

        $placeholder = array("username" => $username);

        $stmt = $this->db->prepare($sql);
        $response = $stmt->execute($placeholder);
        if($response) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        return false;
    } 
