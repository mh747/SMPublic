<?php

class CarsMapper extends SpotmeMapper
{
    /*getFields
     *  Returns array of fields in format
        api field => database field
     */
    public function getFields() {
        $fields = array(
            "car_id" => "CAR_ID",
            "license_plate" => "LICENSE_PLATE",
            "make" => "CAR_MAKE",
            "model" => "CAR_MODEL");

        return $fields;
    }

    public function getCars($where=null, $order=null, $limit=null) {
        $sql = "select CAR_ID, LICENSE_PLATE, CAR_MAKE, CAR_MODEL "
             . "from CAR ";

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

    public function getCarById($car_id) {
        $results = $this->getCars("SPOT_ID=" . (int)$car_id, null, '1');

        return $results;
    }

    public function getCarsByUserId($user_id) {
        $sql = "select CAR_ID from USER_CAR where USER_ID=" . (int)$user_id;

        $stmt = $this->db->prepare($sql);
        $response = $stmt->execute();
        if($response) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        return false;
    }
