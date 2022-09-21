@php
//list of links on sidebar
//specify the path, title, and icon class (bootstrap icon)
$pages = [
    'clearance' => [
        'title' => 'Barangay Clearance',
        'path' => '/request/credential/Clearance',
        'icon' => 'bi bi-file-earmark-break-fill',
    ],
    'id' => [
        'title' => 'Barangay ID Card',
        'path' => '/request/credential/ID',
        'icon' => 'bi bi-person-square',
    ],
    'certificate' => [
        'title' => 'Barangay Certificate',
        'path' => '/request/credential/Certificate',
        'icon' => 'bi bi-blockquote-right',
    ],
    'permits' => [
        'title' => 'Permit',
        'path' => '/request/permit',
        'icon' => 'bi bi-building',
    ],
];

$currentPath = '/' . request()->path();

@endphp

<style>
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }
</style>
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column   px-3 pt-2 text-white h-100">
        <ul class="nav nav-pills flex-column mt-4 mb-0 align-items-center align-items-sm-start w-100 my-0 "
            id="menu">
                <li class="nav-item w-100 mb-1">
                    <a href="/request" 
                        class="nav-link px-0 align-middle text-white w-100 px-2  @if ( '/request' == $currentPath) {{ 'active' }} @endif ">
                        <i class="fs-4 bi bi-grid-1x2-fill"></i>
                        <span class="ms-2 d-none d-sm-inline fw-bold">
                            Dashboard
                        </span>
                    </a>
                </li>
        </ul>
        <span class="mt-4 fw-bold text-uppercase">Request for:</span>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100 my-0 "
            id="menu">
            @foreach ($pages as $page)
                <li class="nav-item w-100 mb-1">
                    <a href="{{ $page['path'] }}" 
                        class="nav-link px-0 align-middle text-white w-100 px-2  @if ($page['path'] == $currentPath) {{ 'active' }} @endif ">
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
