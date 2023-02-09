@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <ul>
            <li>
                <a href="{{ route('client.index') }}">View all clients </a>
            </li>
            <li>
                <a href="{{ route('report') }}">View report</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="logout">Logout</a>
            </li>
        </ul>

    </div>
@endsection
