@extends('layouts.app')


@section('content')
    <h3>Show all notifications for users</h3>
    <div class="container">
        <ul>
            @forelse ($notifications as $notification)
            <li>
                @if ($notification->type == 'App\Notifications\PaymentReceived')
                    We have received a payment of ${{ $notification->data['amount']}} from you!
                @endif
            </li>
            @empty
                <li>You have no notifications at this time!</li>
            @endforelse
        </ul>
    </div>
@endsection
