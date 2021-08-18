<?php

namespace app\core;

class Response {
    
    public static function setUserCookie(string $userId) {
        setcookie('user_id', $userId, [
            'path' => '/',
            'expires' => time() + 86400,
        ]);
    }

    public static function unsetUserCookie() {
        setcookie('user_id', 0, [
            'path' => '/',
            'expires' => time() - 1,
        ]);
    }

    public static function makeDownload(string $file, string $fileName, int $filesize) {

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $fileName);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . $filesize);
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}