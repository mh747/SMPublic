<?php

class UsersController extends SpotmeController
{
    public function getAction($request) {
        if(isset($request->url_elements[2])) {
            $user_id = (int)$request->url_elements[2];
            if(isset($request->url_elements[3])) {
                switch($request->url_elements[3]) {
                case 'cars':
                    //$data["message"] = "user " . $user_id . " cars";
                    $cars = new CarsMapper($request);
                    $data = $cars->getCarsByUserId($user_id);
                    break;
                case 'reviews':
                    if(isset($request->url_elements[4])) {
                        if($request->url_elements[4] == 'a') {
                            //Find reviews about user
                            //$data["message"] = "Finding reviews about user.";
                        } else if($request->url_elements[4] == 'b') {
                            //Find reviews written by user
                            //$data["message"] = "Finding reviews written by user.";
                        }
                    } else {
                        //Find reviews written by and about user
                        //$data["message"] = "Finding all reviews associated with user.";
                    }
                    break;
                case 'spots':
                    $spots = new SpotsMapper($request);
                    $data = $spots->getSpotsByUserId($user_id);
                    break;
                default:
                    // do nothing, this is not a supported action
                    break;
                }
            } else {
                $users = new UsersMapper($request); 
                $data = $users->getUserById($user_id);
            }
        } else {
            $users = new UsersMapper($request);
            $data = $users->getUsers();
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
