<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div id="app">
    <div id="wrapper">

    @include('partials.topbar')
    @include('partials.sidebar')

    <event-hub></event-hub>
    <router-view></router-view>

    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

<div class="navbar-fixed-bottom">
    <div class="qa-banner">This project was generated with Laravel Vue QuickAdminPanel.
        <a href="https://vue.quickadminpanel.com/register" target="_blank">Try it yourself now!</a>
    </div>
</div>

@include('partials.javascripts')
</body>
</html>
