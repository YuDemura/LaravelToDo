<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BasicController extends Controller
{
    public function showArticle(Request $request, $id) {
        //本来ならデータベースなどの外部記憶媒体から$idで指定された記事を取得
        $article = ['article' => "{$id}の記事です。"];
        return view('show-article', $article);
    }

    public function showName(Request $request) {
        $name = $request->name;
        return $name;
    }

    public function showUser(User $user) {
        // $user = User::find($id);
        $user->name="Tom";
        return $user;
    }
}
