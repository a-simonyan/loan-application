@extends('layout.app')

@section('title')
    Create Clients
@endsection

@section('content')

    <div class="container">
       <div class="row">
           <div class="block">
               <div class="header">
                   <h3>New client</h3>
               </div>
               <div class="body">
                   <form action="{{ route('client.store') }}" method="post">
                       @csrf
                       <div class="form-group">
                           <label for="first_name">First name</label>
                           <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" />
                           @if ($errors->has('first_name'))
                               <span class="error_message">{{ $errors->first('first_name') }}</span>
                           @endif
                       </div>
                       <div class="form-group">
                           <label for="last_name">Last name</label>
                           <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" />
                           @if ($errors->has('last_name'))
                               <span class="error_message">{{ $errors->first('last_name') }}</span>
                           @endif
                       </div>
                       <div class="form-group">
                           <label for="email">Email address</label>
                           <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" />
                           @if ($errors->has('email'))
                               <span class="error_message">{{ $errors->first('email') }}</span>
                           @endif
                       </div>
                       <div class="form-group">
                           <label for="phone_number">Phone number</label>
                           <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" />
                           @if ($errors->has('phone_number'))
                               <span class="error_message">{{ $errors->first('phone_number') }}</span>
                           @endif
                       </div>

                       <div class="form-checkbox">
                           <label for="">Cash loan</label>
                           <input type="checkbox" name="loan_type_cash" id="loan_type_cash" @if(old('loan_type_cash'))checked @endif  />
                           @if ($errors->has('loan_type_cash'))
                               <span class="error_message">{{ $errors->first('loan_type_cash') }}</span>
                           @endif
                       </div>

                       <div class="cash">
                           <div class="form-group">
                               <label for="loan_amount">Loan amount</label>
                               <input type="text" name="loan_amount" id="loan_amount" class="form-control" value="{{ old('loan_amount') }}" />
                               @if ($errors->has('loan_amount'))
                                   <span class="error_message">{{ $errors->first('loan_amount') }}</span>
                               @endif
                           </div>
                       </div>

                       <div class="form-checkbox">
                           <label for="">Home loan</label>
                           <input type="checkbox" name="loan_type_home" id="loan_type_home" @if(old('loan_type_home'))checked @endif />
                           @if ($errors->has('loan_type_home'))
                               <span class="error_message">{{ $errors->first('loan_type_home') }}</span>
                           @endif
                       </div>
                       <div class="home">

                           <div class="form-group">
                               <label for="property_value">Property value</label>
                               <input type="text" name="property_value" id="property_value" class="form-control" value="{{ old('property_value') }}" />
                               @if ($errors->has('property_value'))
                                   <span class="error_message">{{ $errors->first('property_value') }}</span>
                               @endif
                           </div>

                           <div class="form-group">
                               <label for="down_payment_amount">Down payment amount</label>
                               <input type="text" name="down_payment_amount" id="down_payment_amount" class="form-control" value="{{ old('down_payment_amount') }}" />
                               @if ($errors->has('down_payment_amount'))
                                   <span class="error_message">{{ $errors->first('down_payment_amount') }}</span>
                               @endif
                           </div>

                       </div>
                       <div class="form-footer">
                           <a href="{{ route('client.index') }}" class="back">Go back to clients</a>
                           <button type="submit" class="btn">Save</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
    </div>

@endsection
