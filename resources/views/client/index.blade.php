@extends('layout.app')

@section('title')
    Clients
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="flex">
                    <h3>Clients</h3>

                    <div>
                        <a href="{{ route('dashboard') }}">Go back to dashboard</a>
                        <a href="{{ route('client.create') }}">Create client</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <table class="table">
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Cash loan</th>
                        <th>Home loan</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->first_name }}</td>
                            <td>{{ $client->last_name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone_number }}</td>
                            <td>
                                @if($client->cashLoanProducts)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                @if($client->homeLoanProducts)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                @if(
                                    (!$client->cashLoanProducts ||  auth()->id() === $client->cashLoanProducts->adviser_id) &&
                                    (!$client->homeLoanProducts ||  auth()->id() === $client->homeLoanProducts->adviser_id)
                                    )
                                    <a href="{{ route('client.edit',$client->id) }}" class="btn_edit">Edit</a>
                                @endif
                            </td>
                            <td>
                                @if(
                                    (!$client->cashLoanProducts ||  auth()->id() === $client->cashLoanProducts->adviser_id) &&
                                    (!$client->homeLoanProducts ||  auth()->id() === $client->homeLoanProducts->adviser_id)
                                    )
                                    <form action="{{ route('client.destroy',$client->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn_danger">Delete</button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
