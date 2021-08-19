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
            'fileName' => $data['fileName'],
            'type' => $type,
            'path' => $path,
            'price' => $data['price'],
            'size' => $file['size'],
            'uploaded_time' => time(),
            'owner_id' => Auth::getInstance()->getId(),
        ])->execute();
    }

    public function getAllFiles() {
        return $this->select(['files.id', 'files.title', 'files.size', 'files.type', 'users.firstname', 'users.lastname', 'users.image_url'])
            ->join('users', 'users.id', '=', 'files.owner_id')
            ->where('files.status', 1)
            ->fetchAll();
    }

    public function getNonConfirmedFiles() {
        return $this->select(['users.firstname', 'users.lastname', 'files.id', 'files.title', 'files.size', 'files.price', 'files.type', 'files.uploaded_time'])
            ->join('users','users.id', '=', 'files.owner_id')
            ->where('files.status', '0')
            ->fetchAll();
    }

    public function getFilesWithOwnerId(int $ownerId) : array {
        return $this->select()
            ->where('owner_id', $ownerId)
            ->fetchAll();
    }

    public function increaseDownloadCount(int $id) {
        $newCount = $this->select('download_count')
                ->where('id', $id)
                ->fetch()['download_count'] + 1;

        $this->update(['download_count' => $newCount])
            ->where('id', $id)
            ->execute();
    }

    public function setFileStatus(int $id, int $status) : void {
        $this->update(['status' => $status])->where('id', $id)->execute();
    }

    public function editFile(array $data, int $id) {
        $this->update($data)->where('id', $id)->execute();
    }

    public function deleteFile(int $id) {
        $this->delete()->where('id', $id)->execute();
    }

    public function checkFileWithOwner(int $fileId, int $ownerId) {
        return $this->select()->where('id', $fileId)->where('owner_id', $ownerId)->fetch() != [];
    }
}