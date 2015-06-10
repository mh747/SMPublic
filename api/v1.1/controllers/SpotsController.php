<?php

class SpotsController extends SpotmeController
{
    public function getAction($request) {
        if(isset($request->url_elements[2])) {
            $spot_id = (int)$request->url_elements[2];
            if(isset($request->url_elements[3])) {
                switch($request->url_elements[3]) {
                case 'user':
                    //user who owns this spot
                    $users = new UsersMapper($request);
                    $data = $users->getUserBySpotId($user_id);
                    break;
                case 'location':
                    //add functionality to find spots in location
                default:
                    // do nothing, this is not a supported action
                    break;
                }
            } else {
                $spots = new SpotsMapper($request); 
                $data = $spots->getSpotById($user_id);
            }
        } else {
            $spots = new SpotsMapper($request);
            $data = $spots->getSpots();
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
