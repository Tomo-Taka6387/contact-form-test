<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Contact;
use App\Models\Category;


class AuthController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', 'like', '%' . $request->gender . '%');
        }
        if ($request->filled('category_id') && $request->category_id !== 'all') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at',  $request->date);
        }

        //最新７件取得（）コレクション
        $contacts = $query->orderBy('created_at', 'desc')->paginate(7)->withQueryString(); //これで７件ずつ表示される

        $categories = Category::all();
        return view('admin.dashboard', compact('contacts', 'categories'));
    }

    public function show($id) //$idが無いと動かない
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }
}
