{{ $userName }}様

本のご購入ありがとうございます。
以下内容でご注文を受け付けましたので、ご連絡致します。
\n
@foreach($cartInfo as $bookData)
	{{ $bookData['isbn'] }} {{ $bookData['title'] }} {{ $bookData['price'] }}円\n
@endforeach
合計 {{ $total }}円\n\n
またのご利用よろしくお願いします。