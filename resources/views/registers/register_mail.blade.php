{{ $userName }}様<br>
<br>
本のご購入ありがとうございます。<br>
以下内容でご注文を受け付けましたので、ご連絡致します。<br>
<br>
@foreach($cartInfo as $bookData)
	{{ $bookData['isbn'] }} {{ $bookData['title'] }} {{ $bookData['price'] }}円<br>
@endforeach
合計 {{ $total }}円<br><br>
またのご利用よろしくお願いします。