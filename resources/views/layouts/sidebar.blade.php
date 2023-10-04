@php
//list of links on sidebar
//specify the path, title, and icon class (bootstrap icon)
$pages = [
'home' => [
'title' => 'History',
'path' => '/home',
'icon' => 'bi bi-grid-1x2-fill',
],

'officials' => [
'title' => 'Officials',
'path' => '/officials',
'icon' => 'bi bi-person-square',
],
'events' => [
'title' => 'Events',
'path' => '/events',
'icon' => 'bi bi-calendar3',
],
];
$pages1 = [
'clearance' => [
'title' => 'Barangay Clearance',
'path' => '/clearance',
'icon' => 'bi bi-file-earmark-break-fill',
],
'id' => [
'title' => 'Barangay ID Card',
'path' => '/id',
'icon' => 'bi bi-person-square',
],
'certificate' => [
'title' => 'Barangay Certificate',
'path' => '/brgycert',
'icon' => 'bi bi-blockquote-right',
],
'permits' => [
'title' => 'Permits',
'path' => '/permits',
'icon' => 'bi bi-file-text',
],
];

$currentPath = '/' . request()->path();

@endphp

<style>
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }
</style>
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white h-100">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100 py-3" id="menu">

            @foreach ($pages as $page)
            <li class="nav-item w-100 mb-1">
                <a href="{{ $page['path'] }}" class="nav-link px-0 align-middle text-secondary w-100 shadow-sm px-2  @if ($page['path'] == $currentPath) {{ 'active text-white' }} @endif ">
                    <i class="fs-4 {{ $page['icon'] }} "></i>
                    <span class="ms-2 d-none d-sm-inline fw-bold">
                        {{ $page['title'] }}
                    </span>
                </a>
            </li>
            @endforeach
            <div class="mt-3 text-secondary">
                <h6 style=" text-decoration:underline">Requests that are for Approval</h6>
            </div>
            @foreach ($pages1 as $page)
            <li class="nav-item w-100 mb-1">
                <a href="{{ $page['path'] }}" class="nav-link px-0 align-middle text-secondary shadow-sm w-100 px-2  @if ($page['path'] == $currentPath) {{ 'active text-white' }} @endif ">
                    <i class="fs-4 {{ $page['icon'] }} "></i>
                    <span class="ms-2 d-none d-sm-inline fw-bold">
                        {{ $page['title'] }}
                    </span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>