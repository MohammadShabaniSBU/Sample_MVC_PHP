<?php

namespace app\controller;

use app\core\Error;
use app\core\Redirect;
use app\core\Request;
use app\core\Validation;
use app\models\File;

class UserController extends Controller {

    public function showUploads() {

        $this->render('dashboard/uploads', ['title' => 'Uploaded Files']);
    }

    public function showDownloads() {

        $this->render('dashboard/downloads', ['title' => 'Downloaded Files']);
    }

    public function showProfile() {

        $this->render('dashboard/profile', ['title' => 'Profile']);
    }

    public function upload(Request $request) {

        Validation::make()->rules($this->uploadRules())->data($request->getParams())->files($request->getFiles())->validate();

        if (!Error::getInstance()->hasError()) {
            File::Do()->saveUploadedFile($request->getFiles()['file'], $request->getParams());
            Redirect::to('/')->go();
        } else
            Redirect::to('/')->data(['errors' => Error::getInstance()])->go();

    }

    public function uploadRules() {
        return [
          'title' => [
              'alphanumeric',
              ['minLen', 4],
              ['maxLen', 24],
          ],
          'fileName' => [
              'alphabetic'
          ],
          'price' => [
              'numeric',
          ],
          'file' => [
              ['size', 10 * 1000 * 1000],
              ['type', 'jpg', 'pdf', 'zip'],
          ]
        ];
    }
}