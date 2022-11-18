<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //newCollectionメソッドをオーバーライドすると独自に拡張したコレクションを使えるようになる
    public function newCollection(array $models = [])
    {
        return new MyCollection($models);
    }

    //アクセサ・ミューテタを使う時の関数名は、データベースのカラム名と同じにする（この場合だと、nameカラムのデータを取得した時ににアクセサが働く）
    public function name():Attribute
    {
        return Attribute::make(
            get: fn($value) => 'なまえ:' . $value,
            // set: fn($value) => strtoupper($value)
        );
    }

    //アクセサ・ミューテタを使って複数のデータから１つの値にまとめる
    //・getクロージャの第二引数は$attributesであり、この中にモデルの現在のカラムを全て配列で持っている
    public function nameId():Attribute
    {
        return Attribute::make(
            get: fn($value,$attributes) => 'アクセサテスト　名前:'. $attributes['name'] . ', id: ' . $attributes['id'],
            set: fn($value) => [
                'name' => strtoupper($value->name),
                'age' => $value->age + 100
            ]
        );
    }
}

class MyCollection extends Collection
{
    public function testfields()
    {
        $item = $this->first();
        return array_keys($item->toArray());
    }
}