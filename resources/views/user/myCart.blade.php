@extends('user.layout.sidebar',['title'=>'MY Cart'])
@section('content')
    <h1>My Cart</h1>
    <?php echo $products;  ?>
@endsection
