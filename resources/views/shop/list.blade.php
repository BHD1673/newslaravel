@extends('main_layouts.master')

@section('content')
    <h1>Your Wishlist</h1>

    @if($wishlists->isEmpty())
        <p>Your wishlist is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wishlists as $wishlistItem)
                    <tr>
                        <td>
                            <img src="{{ asset('images/products/' . basename($wishlistItem->product->image)) }}" alt="{{ $wishlistItem->product->name }}" width="100">
                        </td>
                        <td>{{ $wishlistItem->product->name }}</td>
                        <td>{{ number_format($wishlistItem->product->price, 2) }} VND</td>
                        <td>
                            <a href="{{ route('shop.show', $wishlistItem->product->id) }}" class="btn btn-info">View Details</a>

                            <!-- Form to remove product from wishlist with confirmation -->
                            <form action="{{ route('wishlist.remove', $wishlistItem->product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item from your wishlist?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <br>
    <br>
    <br>
    <br>
@endsection