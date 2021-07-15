@section('title', 'ユーザー詳細画面')

@extends('layouts.app')

@section('content')
<user-detail-component :auth_user="{{ $login_user }}" :recipes="{{ $recipes }}" :user="{{ $user }}"></user-detail-component>
@endsection