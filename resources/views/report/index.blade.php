@extends('layout.app')

@section('title')
    Report
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="flex">
                    <h3>Report</h3>
                    <div>
                        <a href="{{ route('dashboard') }}">Go back to dashboard</a>
                        <a href="{{ route('download') }}">Download XLSX</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <table class="table">
                    <tr>
                        <th>Product type</th>
                        <th>Product value</th>
                        <th>Creation date</th>
                    </tr>
                    @foreach($loans as $loan)
                        <tr>
                            <td>
                                @if(isset($loan['loan_amount']))
                                    Cash loan
                                @else
                                    Home loan
                                @endif
                            </td>
                            <td>
                                @if(isset($loan['loan_amount']))
                                    {{ $loan['loan_amount'] }}
                                @else
                                    {{ $loan['property_value'] . '-' . $loan['down_payment_amount'] }}
                                @endif
                            </td>
                            <td>{{ $loan['created_at'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
