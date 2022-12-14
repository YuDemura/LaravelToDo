<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Task extends Model
{
    use HasFactory;

    //Laravel9以降の書き方
    protected function statusName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->statusToName(),
        );
    }

    private function statusToName() {

        switch ($this->status) {
            case 1:
                return "未着手";
                break;
            case 2:
                return "着手中";
                break;
            case 3:
                return "完了";
                break;
            case 4:
                return "延期";
                break;
            default:
                return "未着手";
        }
    }

    /*Laravel7までの書き方
    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 1:
                return "未着手";
                break;
            case 2:
                return "着手中";
                break;
            case 3:
                return "完了";
                break;
            case 4:
                return "延期";
                break;
            default:
                return "未着手";
        }
    }
    */
}
