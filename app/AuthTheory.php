<?php
namespace App;
class AuthTheory{
    public static function sampleSSO($result){
        return [
            'view' => 'auth.theory.sampleSSO',
            'mode' => 'sampleSSO',
            'title' => 'ورود و انجام نمونه',
            'description' => 'برای شما در ریسلو نمونه(ها)ای ایجاد شده است؛ وارد نمونه شوید',
            'key' => $result['key'],
            'room' => new Room((array) $result['room']),
            'current_user' => $result['current_user'],
        ];
    }
    public static function auth($result){
        return [
            'view' => 'auth.home',
            'mode' => 'auth',
            'mobile' => $result['mobile'],
            'title' => 'ورود به کاربری',
            'description' => 'ورود به ریسلو با شماره موبایل +' .$result['mobile']
        ];
    }
    public static function sample($result){
        return [
            'view' => 'auth.theory.sample',
            'mode' => 'sample',
            'redirect' => route('samples.form', $result['sample']->id),
            'sample' => $result['sample'],
            'title' => 'انجام نمونه ' . $result['sample']->id,
            'description' => 'انجام نمونه ' . $result['sample']->id . ' در ریسلو (سرویس اینترنتی روانشناسی)',
        ];
    }

    public static function bulkSample($result){
        return [
            'view' => 'auth.theory.bulk',
            'mode' => 'bulk',
            'bulk' => $result['bulk'],
            'title' => 'انجام نمونه گروهی ' . $result['bulk']->link,
            'description' => $result['bulk']->description ?: 'انجام نمونه گروهی در ریسلو (سرویس اینترنتی روانشناسی)',
        ];
    }

    public static function payment($result){
        return [
            'redirect' => $result['redirect'],
        ];
    }
}
