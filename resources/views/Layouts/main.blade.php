<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-starter">

@include('Layouts.header')
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('Layouts.sidebar')
            <div class="layout-page">
                @include('Layouts.navbar')
                <div class="content-wrapper">
                    @yield('details')
                    @include('Layouts.footer')
