<?php
namespace App;

class CenterDetail extends Relationship
{
    public $with = [
        'avatar' => File::class,
    ];
    public function getAvatarUrlAttribute()
    {
        return new Avatar($this->avatar);
    }
    public function getNameAttribute()
    {
        return $this->title;
    }
    public function getShortNameAttribute()
    {
        if (!$this->title) {
            return mb_substr($this->id, 2, 2) . mb_substr($this->id, -2, 2);
        }
        $word = mb_split(' ', $this->title);
        if (count($word) == 1) {
            return mb_substr($word[0], 0, 1);
        } else {
            return mb_substr($word[0], 0, 1);
        }
    }
}
