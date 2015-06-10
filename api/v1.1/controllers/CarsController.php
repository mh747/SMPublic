<?php

class CarsController extends SpotmeController
{
    public function getAction($request) {
        if(isset($request->url_elements[2])) {
            $car_id = (int)$request->url_elements[2];
            if(isset($request->url_elements[3])) {
                switch($request->url_elements[3]) {
                case 'user':
                    $users = new UsersMapper($request);
                    $data = $users->getUsersByCarId($user_id);
                    break;
                default:
                    // do nothing, this is not a supported action
                    break;
                }
            } else {
                $cars = new CarsMapper($request); 
                $data = $cars->getCarById($user_id);
            }
        } else {
            $cars = new CarsMapper($request);
            $data = $cars->getCars();
        }
        return $data;
    }

    public function postAction($request) {
        $data = $request->parameters;
        //not implemented yet
        $data['message'] = "This data was submitted";
        return $data;
    }
}

?>
