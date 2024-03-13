@extends('layouts.app1')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase">
    <form class="form__purchase" action="/purchase/purchase_store" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $items->id }}">
        <div class="purchase__item">
            <div class="purchase__item-detail">
                <div class="item__img">
                    <img src="{{ asset($items->img_url) }}" alt="画像">
                </div>
                <div class="item__detail">
                    <div class="item__name">
                        <p>{{ $items->name }}</p>
                    </div>
                    <div class="item__price">
                        <p>&yen{{ $items->price }}</p>
                    </div>
                </div>
            </div>
            <div class="item__payment">
                <h4>支払い方法</h4>
                <select name="payment_id" id="payment">
                    <option value="">選択</option>
                    @foreach($payments as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->payment }}</option>
                    @endforeach
                </select>
                <input type="button" class="payment__change" value="変更する" onclick="clickBtn()">
            </div>
            <div class="form__error" id="payment_error">
                @error('payment_id')
                {{ $message }}
                @enderror
            </div>
            <div class="purchase__address">
                <h4>配送先</h4>
                <div class="purchase__address-detail">
                    <span>〒</span>
                    @if(!empty($postcode))
                    <input type="text" name="postcode" id="郵便番号" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{ $postcode }}">
                    @else
                    @if(!empty($users->profile->postcode))
                    <input type="text" name="postcode" id="郵便番号" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{ $users->profile->postcode }}">
                    @else
                    <input type="text" name="postcode" id="郵便番号" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="" placeholder="未登録">
                    @endif
                    @endif
                    <div class="form__error">
                        @error('postcode')
                        {{ $message }}
                        @enderror
                    </div>
                    <span>住所</span>
                    @if(!empty($address))
                    <input type="text" name="address" id="住所" value="{{ $address }}">
                    @else
                    @if(!empty($users->profile->address))
                    <input type="text" name="address" id="住所" value="{{ $users->profile->address }}">
                    @else
                    <input type="text" name="address" id="住所" value="" placeholder="未登録">
                    @endif
                    @endif
                    <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                    <span>建物</span>
                    @if(!empty($building))
                    <input type="text" name="building" value="{{ $building }}">
                    @else
                    @if(!empty($users->profile->building))
                    <input type="text" name="building" value="{{ $users->profile->building }}">
                    @else
                    <input type="text" name="building" value="" placeholder="未登録">
                    @endif
                    @endif
                    <div class="form__error">
                        @error('building')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="purchase__detail">
            <table>
                <tr>
                    <td class="purchase__detail-ttl">商品代金</td>
                    <td class="purchase__detail-item">&yen{{ $items->price }}</td>
                </tr>
                <tr>
                    <td class="purchase__detail-ttl">支払い金額</td>
                    <td class="purchase__detail-item">&yen{{ $items->price }}</td>
                </tr>
                <tr>
                    <td class="purchase__detail-ttl">支払い方法</td>
                    <td class="purchase__detail-item"><span id="payment_change"></span></td>
                </tr>
            </table>
            <div class="purchase__button">
                <button class="purchase__button-submit" type="submit">購入する</button>
            </div>
        </div>
    </form>
</div>
<script>
    function clickBtn() {
        const select = document.getElementById('payment');
        const selectValue = document.getElementById('payment_change');
        selectValue.innerHTML = select.options[select.selectedIndex].innerHTML;
        document.getElementById('payment_error').textContent = '';
    }
</script>
@endsection