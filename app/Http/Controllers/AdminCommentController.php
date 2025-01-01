<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
class AdminCommentController extends Controller
{
    public function index()
    {
        // جلب جميع التعليقات من قاعدة البيانات
        $comments = Comment::orderBy('created_at', 'desc')->get();

        // تمرير البيانات إلى واجهة العرض
        return view('admin.contact.index', compact('comments'));   
    }


    public function destroy($id)
{
    // جلب التعليق وحذفه
    $comment = Comment::findOrFail($id);
    $comment->delete();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
}

}
