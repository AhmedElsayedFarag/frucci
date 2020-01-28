<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            [
                'name' => trans('admin_content.facebook'),
                'value' => 'https://www.facebook.com',
                'type' => 'url',
                'key' => 'facebook_url',

            ],
            [
                'name' => trans('admin_content.twitter'),
                'value' => 'https://www.twitter.com',
                'type' => 'url',
                'key' => 'twitter_url',

            ],
            [
                'name' => trans('admin_content.youtube'),
                'value' => 'https://www.youtube.com',
                'type' => 'url',
                'key' => 'youtube_url',

            ],
            [
                'name' => trans('admin_content.linkedin'),
                'value' => 'https://www.linkedin.com',
                'type' => 'url',
                'key' => 'linkedin_url',
            ],
            [
                'name' => trans('admin_content.email'),
                'value' => 'info@ferrucci-sa.com',
                'type' => 'email',
                'key' => 'email',
            ],
            [
                'name' => trans('admin_content.phone'),
                'value' => '013-8961100',
                'type' => 'tel',
                'key' => 'phone',
            ],
            [
                'name' => trans('admin_content.fax'),
                'value' => '013-8940101',
                'type' => 'tel',
                'key' => 'fax',
            ],
            [
                'name' => trans('admin_content.location_ar'),
                'value' => trans('admin_content.ferrucci_location_ar'),
                'type' => 'text',
                'key' => 'location_ar',
            ],
            [
                'name' => trans('admin_content.location_en'),
                'value' => trans('admin_content.ferrucci_location_en'),
                'type' => 'text',
                'key' => 'location_en',
            ],
            [
                'name' => trans('admin_content.logo_header'),
                'value' => 'uploads/avatar.png',
                'type' => 'file',
                'key' => 'logo_header',
            ],
            [
                'name' => trans('admin_content.logo_footer'),
                'value' => 'uploads/avatar.png',
                'type' => 'file',
                'key' => 'logo_footer',
            ]
        ];
        foreach ($values as $value1) {
            $setting = new \App\Setting();
            $setting->key = $value1['key'];
            $setting->type = $value1['type'];
            $availablelocales = \Localization::getLocales();
            foreach ($availablelocales as $locale => $value) {
                $setting->translateOrNew($locale)->name = $value1['name'];
                $setting->translateOrNew($locale)->value = $value1['value'];
            }//end for each
            $setting->save();
        }
    }
}
