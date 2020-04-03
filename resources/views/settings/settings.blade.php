@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Update blog settings</div>

  <div class="card-body">

    <form action="{{ route('settings.update') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="site-name">Site name</label>
        <input type="text" id="site-name" name="site_name" class="@error('site_name') is-invalid @enderror form-control"
          value="{{ $settings->site_name }}">
        @error('site_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" class="@error('address') is-invalid @enderror form-control"
          value="{{ $settings->address }}">
        @error('address')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="contact-number">Contact number</label>
        <input type="text" id="contact-number" name="contact_number"
          class="@error('contact_number') is-invalid @enderror form-control" value="{{ $settings->contact_number }}">
        @error('contact_number')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="contact-email">contact-email</label>
        <input type="email" id="contact-email" name="contact_email"
          class="@error('contact_email') is-invalid @enderror form-control" value="{{ $settings->contact_email }}">
        @error('contact_email')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-outline-success">Update settings</button>
      </div>

    </form>
  </div>
</div>
@endsection