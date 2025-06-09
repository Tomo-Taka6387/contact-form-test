@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__title">
        <h2>Contact</h2>
    </div>
    <form class="form" action="{{ route('contacts.confirm') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group__box">
                <span class="form-label__name">お名前</span>
                <span class="form-label__required">※</span>
            </div>
            <div class="contact-form__input-box contact-form__input-name">
                <div class="contact-form__name">
                    <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                </div>
                <div class="form-error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
                <div class="contact-form__name">
                    <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name',) }}" />
                </div>
                <div class="form-error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group__box">
                <span class="form-label__name">性別</span>
                <span class="form-label__required">※</span>
            </div>
            <div class="contact-form__input-box">
                <div class="form-group__box">
                    <div class="contact-form__gender">
                        <label>
                            <input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : ''}} />男性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="2" {{ old('gender', '1') == '2' ? 'checked' : ''}} />女性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="3" {{ old('gender', '1') == '3' ? 'checked' : ''}} />その他
                        </label>
                    </div>
                    <div class="form-error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group__box">
                <span class="form-label__name">メールアドレス</span>
                <span class="form-label__required">※</span>
            </div>
            <div class="contact-form__input-box">
                <div class="contact-form__input">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form-error">
                    @error('email')
                    {{ $message }}
                    @enderror

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group__box">
                <span class="form-label__name">電話番号</span>
                <span class="form-label__required">※</span>
            </div>
            <div class="contact-form__tel-box">
                <div class="contact-form__tel">
                    <input type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}" /> -
                    <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" /> -
                    <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
                </div>
                @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                <div class="form-error">
                    {{ $errors->first('tel1') ?:  ($errors->first('tel2') ?:  $errors->first('tel3')) }}
                </div>
                @endif
            </div>
        </div>
</div>
<div class="form-group">
    <div class="form-group__box">
        <span class="form-label__name">住所</span>
        <span class="form-label__required">※</span>
    </div>
    <div class="contact-form__input-box">
        <div class="contact-form__input">
            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
        </div>
        <div class="form-error">
            @error('address')
            {{ $message }}
            @enderror

        </div>
    </div>
</div>
<div class="form-group">
    <div class="form-group__box">
        <span class="form-label__name">建物名</span>
    </div>
    <div class="contact-form__input-box">
        <div class="contact-form__input">
            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション 101" value="{{ old('building') }}" />
        </div>
    </div>
</div>
<div class="form-group">
    <div class="form-group__box">
        <span class="form-label__name">お問い合せの種類</span>
        <span class="form-label__required">※</span>
    </div>
    <div class="contact-form__input-box">
        <div class="contact-form__input">
            <select class="form-category" name="category_id">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        <div class=" form-error">
            @error('category_id')
            {{ $message }}
            @enderror

        </div>
    </div>
</div>
<div class="form-group">
    <div class="form-group__box">
        <span class="form-label__name">お問い合せ内容</span>
        <span class="form-label__required">※</span>
    </div>
    <div class="contact-form__input-box">
        <div class="contact-form__textarea">
            <textarea name="detail" placeholder="お問い合せ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
        <div class="form-error">
            @error('detail')
            {{ $message }}
            @enderror

        </div>
    </div>
</div>
<div class="form-button">
    <button class="form-button__submit" type="submit">確認画面</button>
</div>
</form>
</div>
@endsection