<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    $contact = [
      'last_name' => '',
      'first_name' => '',
      'email' => '',
      'tel1' => '',
      'tel2' => '',
      'tel3' => '',
      'gender' => '',
      'address' => '',
      'building' => '',
      'detail' => '',
      'category_id' => ''
    ];
    $categories = Category::all();
    return view('index', compact('contact', 'categories'));
  }

  public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'email', 'tel1', 'tel2', 'tel3', 'gender', 'address', 'building', 'detail', 'category_id']);

    $categoryName = Category::find($contact['category_id'])->content;

    return view('confirm', compact('contact', 'categoryName'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'email', 'tel1', 'tel2', 'tel3', 'gender', 'address', 'building', 'detail', 'category_id']);

    Contact::create($contact);

    return redirect('thanks');
  }

  public function handle(ContactRequest $request)
  {
    $action = $request->input('action');

    if ($action === 'fix') {
      return redirect()->route('contact.form')->withInput($request->all());
    }

    $contact = $request->only(['last_name', 'first_name', 'email', 'tel1', 'tel2', 'tel3', 'gender', 'address', 'building', 'detail', 'category_id']);
    Contact::create($contact);

    return redirect()->route('contact.thanks');
  }
}
