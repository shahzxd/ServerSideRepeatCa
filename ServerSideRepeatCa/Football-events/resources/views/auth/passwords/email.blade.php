@extends('front.layouts.app')
@section('content')
   <div style="margin-top: 200px;margin-bottom: 200px">
               <div class="section singlepage">
                   <div class="container">
                       <div class="row">
                           <div class="col-sm-12 col-md-12">
                               <div class="page-title">
                                   <h2 class="lead">Reset Password</h2>
                                   <div class="border-style"></div>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-sm-12 col-md-12">
                               @if (session('status'))
                                   <div class="alert alert-success" role="alert">
                                       {{ session('status') }}
                                   </div>
                               @endif
                               <form method="POST" action="{{ route('password.email') }}">
                                   @csrf
                                   <div style="margin-bottom: 12px" class="mb-4">
                                       <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                       <div>
                                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                           @error('email')
                                           <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                           @enderror
                                       </div>
                                   </div>
                                   <div>
                                       <button type="submit" class="btn btn-danger form-control">
                                           {{ __('Send Password Reset Link') }}
                                       </button>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
@endsection
