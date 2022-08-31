<?php

namespace app\framework\libraries;

class Response{


    /**
     * The request succeeded.
     * 
     * **`200`**
     * 
     * @param string|array $data
     */
    public static function ok($data){
        $code = 200;
        $status = "OK";
        header('Content-Type: application/json');
        header("HTTP/1.0 $code $status");
        $type = gettype($data);
        if($type == "string"){
            echo json_encode(["data"=>$data,"statusCode"=>$code,"status"=>$status]);
        }else if($type == "array"){
            $data["statusCode"] = $code;
            $data["status"] = $status;
            echo json_encode($data);
        }
    }

    /**
     * The request succeeded, and a new resource was created as a result.
     * This is typically the response sent after POST requests, or some PUT requests.
     * 
     * **`201`**
     * 
     * @param string|array $data
     */
    public static function created($data){
        $code = 201;
        $status = "Created";
        header('Content-Type: application/json');
        header("HTTP/1.0 $code $status");
        $type = gettype($data);
        if($type == "string"){
            echo json_encode(["data"=>$data,"statusCode"=>$code,"status"=>$status]);
        }else if($type == "array"){
            $data["statusCode"] = $code;
            $data["status"] = $status;
            echo json_encode($data);
        }
    }

     /**
      * The server cannot or will not process the request due to 
      * something that is perceived to be a client error.
      *
      * **`400`**
      * 
      * @param string|array $data
     */
    public static function badRequest($data){
        $code = 400;
        $status = "Bad Request";
        header('Content-Type: application/json');
        header("HTTP/1.0 $code $status");
        $type = gettype($data);
        if($type == "string"){
            echo json_encode(["data"=>$data,"statusCode"=>$code,"status"=>$status]);
        }else if($type == "array"){
            $data["statusCode"] = $code;
            $data["status"] = $status;
            echo json_encode($data);
        }
    }

    /**
     * Although the HTTP standard specifies **"unauthorized"**, 
     * semantically this response means _"unauthenticated"_.
     * That is, the client must authenticate itself to get the requested response.
     * 
     * **`401`**
     * 
     * @param string|array $data
     */
    public static function unAuthorized($data){
        $code = 401;
        $status = "Unauthorized";
        header('Content-Type: application/json');
        header("HTTP/1.0 $code $status");
        $type = gettype($data);
        if($type == "string"){
            echo json_encode(["data"=>$data,"statusCode"=>$code, "status"=>$status]);
        }else if($type == "array"){
            $data["statusCode"] = $code;
            $data["status"] = $status;
            echo json_encode($data);
        }
    }


    /**
     * The server can not find the requested resource.
     * In the browser, this means the URL is not recognized.
     * In an API, this can also mean that the endpoint is valid but the resource itself does not exist.
     * 
     * **`404`**
     * 
     * @param string|array $data
     */
    public  static function notFound($data){
        $code = 404;
        $status = "Not Found";
        header('Content-Type: application/json');
        header("HTTP/1.0 $code $status");
        $type = gettype($data);
        if($type == "string"){
            echo json_encode(["data"=>$data,"statusCode"=>$code, "status"=>$status]);
        }else if($type == "array"){
            $data["statusCode"] = $code;
            $data["status"] = $status;
            echo json_encode($data);
        }
    }

}