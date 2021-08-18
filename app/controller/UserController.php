<?php

namespace app\controller;

use app\core\App;
use app\core\Error;
use app\core\Redirect;
use app\core\Request;
use app\core\Response;
use app\core\Routes;
use app\core\Validation;
use app\models\File;
use app\models\Settings;
use app\models\User;
use Cassandra\Set;

class UserController extends Controller {

    public function showUploads() {

        $this->render('dashboard/uploads', ['title' => 'Uploaded Files', 'page' => 'upload']);
    }

    public function showDownloads() {

        $this->render('dashboard/downloads', ['title' => 'Downloaded Files', 'page' => 'download']);
    }

    public function showProfile() {

        $this->render('dashboard/profile', ['title' => 'Profile', 'page' => 'profile']);
    }

    public function upload(Request $request) {

        Validation::make()->rules($this->uploadRules())->data($request->getParams())->files($request->getFiles())->validate();

        if (!Error::getInstance()->hasError()) {
            File::Do()->saveUploadedFile($request->getFiles()['file'], $request->getParams());
            Redirect::to('/')->go();
        } else
            Redirect::to('/')->data(['errors' => Error::getInstance()])->go();

    }

    public function download(int $id) {
        $file = File::Do()->select(['fileName', 'path', 'size', 'type'])->where('id', $id)->fetch();
        Response::makeDownload($file['path'], $file['fileName'] . '.' . $file['type'], $file['size']);
    }

    public function editFile(Request $request, $id) {

        Validation::make()->rules($this->editFileRules())->data($request->getParams())->validate();

        if (!Error::getInstance()->hasError()) {
            File::Do()->editFile($request->getParams(), $id);
            Redirect::to(Routes::getPathByName('uploads'))->go();
        } else
            Redirect::to(Routes::getPathByName('uploads'))->data(['errors' => Error::getInstance(), 'errorId' => $id])->go();
    }

    public function deleteFile($id) {

        unlink(File::Do()->select(['path'])->where('id', $id)->fetch()['path']);
        File::Do()->deleteFile($id);
        Redirect::to(Routes::getPathByName('uploads'))->go();
    }

    public function editProfile(Request $request, int $id) {
        Validation::make()->rules($this->editProfileRules())->data($request->getParams())->files($request->getFiles())->validate();

        if (!Error::getInstance()->hasError()) {
            User::Do()->editProfile($this->editProfileMakeData($request->getParams(), $request->getFiles()), $id);
            Redirect::to(Routes::getPathByName('profile'))->go();
        } else
            Redirect::to(Routes::getPathByName('profile'))->data(['errors' => Error::getInstance()])->go();
    }

    public function editProfileMakeData(array $params, array $files) {
        if ($files['image']['size'] > 0) {
            $image_url = "/storage/" . time();
            $image_path = App::$root . '/public' .$image_url;

            move_uploaded_file($files['image']['tmp_name'], $image_path);

            $params['image_url'] = $image_url;
            $params['image_path'] = $image_path;
        }
        return $params;
    }

    public function uploadRules() {
        $settings = Settings::Do()->getSettings();
        $types = ['type'];
        foreach ($settings['type'] as $type)
            $type[] = $type;

        return [
          'title' => [
              'required',
              'alphanumeric',
              ['minLen', 4],
              ['maxLen', 20],
          ],
          'fileName' => [
              'required',
              'alphabetic'
          ],
          'price' => [
              'required',
              'numeric',
          ],
          'file' => [
              'required',
              ['size', $settings['maxSize']],
              $types,
          ]
        ];
    }

    public function editFileRules() {
        return [
            'title' => [
                'required',
                'alphanumeric',
                ['minLen', 4],
                ['maxLen', 20],
            ],
            'price' => [
                'required',
                'numeric',
            ],
        ];
    }

    public function editProfileRules() : array {
        return [
            'firstname' => [
                'required',
                'alphabetic',
                ['minLen', 4],
                ['maxLen', 16],
            ],
            'lastname' => [
                'required',
                'alphabetic',
                ['minLen', 4],
                ['maxLen', 16],
            ],
            'email' => [
                'required',
                'email',
            ],
            'image' => [
                'optional',
                ['size', 10 * 1000 * 1000],
                ['type', 'jpg', 'png'],
            ]
        ];
    }
}