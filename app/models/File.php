<?php

namespace app\models;

use app\core\App;
use app\core\Auth;
use app\core\Model;

class File extends Model {

    public static function Do() {

        return new File('files');
    }

    public function saveUploadedFile(array $file, array $data) {
        $type = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $path = sprintf("%s/storage/%d-%s.%s", App::$root, time(), $data['fileName'], $type);

        if (!move_uploaded_file($file['tmp_name'], $path)) {
            // add error and redirect
        }

        $this->insert([
            'title' => $data['title'],
            'type' => $type,
            'path' => $path,
            'price' => $data['price'],
            'size' => $file['size'],
            'uploaded_time' => time(),
            'owner_id' => Auth::getInstance()->getId(),
        ])->execute();
    }
}