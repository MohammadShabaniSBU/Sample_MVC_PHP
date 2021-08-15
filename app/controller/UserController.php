<?php

namespace app\controller;

use app\core\Error;
use app\core\Redirect;
use app\core\Request;
use app\core\Routes;
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

    public function editFile(Request $request, $id) {

        Validation::make()->rules($this->editRules())->data($request->getParams())->validate();

        if (!Error::getInstance()->hasError()) {
            File::Do()->editFile($request->getParams(), $id);
            Redirect::to(Routes::getPathByName('uploads'))->go();
        } else
            Redirect::to(Routes::getPathByName('uploads'))->data(['errors' => Error::getInstance(), 'errorId' => $id])->go();
    }

    public function deleteFile($id) {

        File::Do()->deleteFile($id);
        Redirect::to(Routes::getPathByName('uploads'))->go();

    }

    public function uploadRules() {
        return [
          'title' => [
              'alphanumeric',
              ['minLen', 4],
              ['maxLen', 20],
          ],
          'fileName' => [
              'alphabetic'
          ],
          'price' => [
              'numeric',
          ],
          'file' => [
              ['size', 10 * 1000 * 1000],
              ['type', 'jpg', 'pdf', 'zip', 'png'],
          ]
        ];
    }

    public function editRules() {
        return [
            'title' => [
                'alphanumeric',
                ['minLen', 4],
                ['maxLen', 20],
            ],
            'price' => [
                'numeric',
            ],
        ];
    }
}