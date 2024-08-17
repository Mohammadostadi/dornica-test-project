<?php 

require_once('errorMessage.php');

class validator extends errorMessage{
    function empty($data, $name, $message){
        if(empty($data)){
            return $this->set($name, $message);
        }
    }
    function show($name){
        if(isset($this->errors[$name])){
            return $this->errors[$name];
        }else{
            return '';
        }
    }
    function existValue($tableName, $value, $data, $message, $update = false){
        global $db;
        $res = $db->where($value, $data)->getValue($tableName, $value);
        if(!$update){
            if(!empty($res)){
                return $this->set($value, $message);
            }
        }else{
            if(!empty($res) and $res != $update){
                return $this->set($value, $message);
            }
        }
    }

    function imageCheck($dir, $data, $name){
        $target_dir = $dir;
        $target_file = $target_dir . basename($data["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($data['name'] != ''){
            $this->imageValidate($dir, $data, $name);
        }else{
            return $this->set($name, 'فایل تصویر نمیتواند خالی باشد');
        }
        $new_dir = substr($target_dir, 3);
        return $new_dir.securityCheck( basename( $data["name"]));
    }

    function imageUpdate($dir, $data, $name, $value){
    $target_dir = $dir;
    $target_file = $target_dir . basename($data["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($data['name'] != ''){
        $new_dir = substr($target_dir, 3);
        $picture = $new_dir.securityCheck( basename( $data["name"]));
        if($value != $picture and !empty($picture)){
            unlink('../'.$value);
            $this->imageValidate($dir, $data, $name);
        }
        return $new_dir.securityCheck( basename( $data["name"]));
    }   
    }

    private function imageValidate($dir, $data, $name){
        $target_dir = $dir;
        $target_file = $target_dir . basename($data["name"]);
        // $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($data["tmp_name"]);
            if($check == false) {
                return $this->set($name, 'فایل مورد نظر تصویر نمیباشد');
                // echo "File is an image - " . $check["mime"] . ".";
            }
        
            // Check if file already exists
            if (file_exists($target_file)) {
                $target_file = $target_file.rand();
                // $uploadOk = 0;
            }
        
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
            return $this->set($name, 'سایز فایل مورد نظر بیش از حد میباشد');
            // $uploadOk = 0;
            }
        
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                return $this->set($name, 'فایل مورد نظر تصویر نمیباشد');
                // $uploadOk = 0;
            }
            move_uploaded_file($data["tmp_name"], $target_file);
    }
}