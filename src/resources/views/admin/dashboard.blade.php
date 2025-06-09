@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="admin-form__content">
  <div class="admin-form__title">
    <h2>Admin</h2>
  </div>

  <form class="form" action="{{ route('dashboard') }}" method="get">
    @csrf
    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">

    <select name="gender">
      <option value="all">性別</option>
      <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
      <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
      <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
    </select>

    <select class="category_id" name="category_id">
      <option value="all">お問い合わせの種類</option>
      @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->content }}</option>
      @endforeach
    </select>

    <input type="date" name="date" value="{{ request('date') }}">

    <button type="submit">検索</button>
    <a href="{{ route('dashboard') }}">リセット</a>
  </form>

  <div class="page">{{ $contacts->links('pagination::bootstrap-4') }}</div>

  <div class="admin-form__table">
    <table class="admin-table__inner">
      <thead class="admin-table__head">
        <tr class="admin-table__head-title">
          <th class="admin-table_head">お名前</th>
          <th class="admin-table_head">性別</th>
          <th class="admin-table_head">メールアドレス</th>
          <th class="admin-table_head"> お問い合わせの種類</th>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr class="admin-table__row">
          <th class="admin-table__text">{{ $contact->last_name }}</th>
          <th class="admin-table__text">{{ $contact->first_name }}</th>
          <th class="admin-table__text">{{ $contact->gender }}</th>
          <th class="admin-table__text">{{ $contact->email }}</th>
          <th class="admin-table__text">{{ $contact->category->name ?? '未分類' }}</th>
          <th class="admin-table__text">{{ $contact->type }}</th>
          <th class="admin-table__text">{{ $contact->created_at ? $contact->created_at->format('Y-m-d') : '' }}</th>
          <th class="admin-table__text">
            <button class="detail-btn" data-contact="{{ $contact->id }}
                date-last_name=" {{ $contact->last_name }}"
              date-first_name="{{ $contact->first_name }}"
              date-email="{{ $contact->email }}"
              date-tel1="{{ $contact->tel1 }}"
              date-tel2="{{ $contact->tel2 }}"
              date-tel3="{{ $contact->tel3 }}"
              date-gender="{{ $contact->gender }}"
              date-address="{{ $contact->address }}"
              date-building="{{ $contact->building }}"
              date-detail="{{ $contact->detail }}"
              date-category="{{ $contact->category->content ?? '未分類' }}">
                詳細
              </button>
            </th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection