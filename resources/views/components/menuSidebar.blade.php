<!-- sidebar menu -->
<div class="menu">
    <div class="custom-scroll">
        <div class="sidebar-menu">
            <ul>
                <li class="sidebar-title"><span>Menu</span></li>
                <li class="sidebar-item"><a href="/panel" class="sidebar-link active" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Dashboard" tabindex="0"><i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span></a></li>
                <li class="sidebar-title"><span>Data</span></li>
                <li class="sidebar-item">
                    <a href="{{route('data')}}" class="sidebar-link" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Importation" tabindex="0"><i class="bi bi-file-earmark-arrow-up-fill"></i>
                        <span>Import Data</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('apikeys')}}" class="sidebar-link" data-bs-toggle="tooltip" data-bs-placement="right" 
                        title="API Key"
                        tabindex="0"><i class="bi bi-key-fill"></i>
                        <span>API Key</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('settings')}}" class="sidebar-link" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Settings" tabindex="0"><i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- sidebar menu -->