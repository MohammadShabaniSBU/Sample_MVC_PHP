<?php

namespace app\models;

use app\core\Model;

class Settings extends Model {
//    private static ?Settings $instance = null;

    public static function Do() {
//        if (self::$instance == null)
//            self::$instance = new Settings('settings');

        return new Settings('settings');
    }

    public function getSettings() {

        return $this->formatSettings($this->select()->fetchAll());
    }

    public function addType(string $type, string $title) {
        $this->insert([
            'key' => 'type',
            'value' => $type,
            'title' => $title,
        ])->execute();
    }

    public function updateSize(int $maxSize, int $maxUploadSize) {
        $this->update([
            'value' => $maxSize,
            'title' => $this->formatSize($maxSize),
        ])->where('key', 'maxSize')->execute();

        $this->update([
            'value' => $maxUploadSize,
            'title' => $this->formatSize($maxUploadSize),
        ])->where('key', 'maxUploadSize')->execute();
    }

    private function formatSettings(array $settings) : array {
        $types = [];
        foreach ($settings as $record)
            if ($record['key'] == 'type')
                $types[] = [
                    'value' => $record['value'],
                    'title' => $record['title'],
                ];

        $finalSettings = ['types' => $types];

        foreach ($settings as $record)
            if ($record['key'] != 'type')
                $finalSettings[$record['key']] = [
                    'value' => $record['value'],
                    'title' => $record['title'],
                ];

        return $finalSettings;
    }


}