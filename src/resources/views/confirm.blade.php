@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm">
    <div class="confirm-form__title">
        <h2>Confirm</h2>
    </div>
    <form class="confirm-form" action="{{ route('contact.handle') }}" method="post">
        @csrf
        <div class="confirm-form__table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <p>{{$contact['last_name']}}&emsp;{{ $contact['first_name'] }}</p>
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <p>
                            @if($contact['gender'] == '1')
                            男性
                            @elseif($contact['gender'] == '2')
                            女性
                            @else
                            その他
                            @endif
                            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
                        </p>
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['email'] }}</p>
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['tel1'] }} - {{ $contact['tel2'] }} - {{ $contact['tel3'] }}</p>
                        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['address'] }}</p>
                        <input type="hidden" name="address" value="{{ $contact['tel1'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['building'] }}</p>
                        <input type="hidden" name="building" value="{{ $contact['building'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        {{ $categoryName }}
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合せ内容</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['detail'] }}</p>
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                    </td>
                </tr>
            </table>
        </div>
        <div class="confirm-form__button">
            <button class="confirm__submit" type="submit" name="action" value="send">送信</button>
            <button class="confirm__fix" type="submit" name="action" value="fix">修正</button>
    </form>
</div>
</form>
</div>
@endsection