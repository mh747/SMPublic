<?php

class SpotsMapper extends SpotmeMapper
{
    /*getFields
     *  Returns array of fields in format
        api field => database field
     */
    public function getFields() {
        $fields = array(
            "spot_id" => "SPOT_ID",
            "occupied" => "OCCUPIED",
            "latitude" => "LATITUDE",
            "longitude" => "longitude");

        return $fields;
    }

    public function getSpots($where=null, $order=null, $limit=null) {
        $sql = "select SPOT_ID, OCCUPIED, LATITUDE, LONGITUDE "
             . "from SPOT ";

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

    public function getSpotById($spot_id) {
        $results = $this->getSpots("SPOT_ID=" . (int)$spot_id, null, '1');

        return $results;
    }

    public function getSpotsByUserId($user_id) {
        $sql = "select SPOT_ID from USER_SPOT where USER_ID=" . (int)$user_id;

        $stmt = $this->db->prepare($sql);
        $response = $stmt->execute();
        if($response) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        return false;
    }

    public function isSpotOccupied($spot_id) {
        $result = $this->getSpotById($spot_id);

        return $result[0]['OCCUPIED'];
    }
