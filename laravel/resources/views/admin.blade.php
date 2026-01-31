@extends('ui')

@section('content')
<div class="container-fluid">
    <!-- Admin Header -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <div class="card-body p-5">
                    <h1 class="display-5 fw-bold mb-2">
                        <i class="fas fa-lock me-3"></i>Admin Dashboard
                    </h1>
                    <p class="lead mb-0">Manage all academy content and users</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-5">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div style="font-size: 2.5rem; color: #0d6efd;" class="me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h5 class="text-muted mb-0">Total Users</h5>
                            <h2 class="fw-bold mb-0">{{ \App\Models\User::count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div style="font-size: 2.5rem; color: #198754;" class="me-3">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div>
                            <h5 class="text-muted mb-0">News Articles</h5>
                            <h2 class="fw-bold mb-0">{{ \App\Models\News::count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div style="font-size: 2.5rem; color: #ffc107;" class="me-3">
                            <i class="fas fa-star"></i>
                        </div>
                        <div>
                            <h5 class="text-muted mb-0">Recommendations</h5>
                            <h2 class="fw-bold mb-0">{{ \App\Models\Recommendation::count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div style="font-size: 2.5rem; color: #dc3545;" class="me-3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h5 class="text-muted mb-0">Admins</h5>
                            <h2 class="fw-bold mb-0">{{ \App\Models\User::where('is_admin', true)->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Sections -->
    <div class="row mb-5">
        <div class="col-12 mb-3">
            <h3 class="fw-bold mb-4">
                <i class="fas fa-cog me-2" style="color: #667eea;"></i>Management Tools
            </h3>
        </div>
    </div>

    <div class="row">
        <!-- News Management -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-primary text-white" style="border-radius: 0 !important;">
                    <h5 class="mb-0">
                        <i class="fas fa-newspaper me-2"></i>News Management
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">Create, edit, and manage student news articles with images and content.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('news.index') }}" class="btn btn-primary flex-fill">
                            <i class="fas fa-list me-2"></i>View All News
                        </a>
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary flex-fill">
                            <i class="fas fa-plus me-2"></i>Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommendations Management -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-warning text-dark" style="border-radius: 0 !important;">
                    <h5 class="mb-0">
                        <i class="fas fa-star me-2"></i>Recommendations
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">View and manage recommendations submitted by community members.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('recommendations.index') }}" class="btn btn-warning flex-fill">
                            <i class="fas fa-list me-2"></i>View All
                        </a>
                        <button class="btn btn-outline-warning flex-fill" data-bs-toggle="modal" data-bs-target="#exportModal">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Management -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-info text-white" style="border-radius: 0 !important;">
                    <h5 class="mb-0">
                        <i class="fas fa-users me-2"></i>User Management
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">Manage user accounts, roles, and permissions.</p>
                    <button class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#usersModal">
                        <i class="fas fa-list me-2"></i>View All Users
                    </button>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white" style="border-radius: 0 !important;">
                    <h5 class="mb-0">
                        <i class="fas fa-sliders-h me-2"></i>Settings
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">Configure academy settings, email, and system preferences.</p>
                    <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#settingsModal">
                        <i class="fas fa-cog me-2"></i>Open Settings
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Users Modal -->
<div class="modal fade" id="usersModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-users me-2"></i>User Management</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\User::all() as $user)
                            <tr>
                                <td>
                                    <i class="fas fa-user-circle me-2" style="color: #0d6efd;"></i>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->is_admin ? 'bg-danger' : 'bg-secondary' }}">
                                        {{ $user->is_admin ? 'Admin' : 'User' }}
                                    </span>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.toggle-admin', $user->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $user->is_admin ? 'btn-warning' : 'btn-success' }}">
                                            <i class="fas {{ $user->is_admin ? 'fa-shield-alt' : 'fa-user' }} me-1"></i>
                                            {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-cog me-2"></i>System Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Academy Name: <strong>New Diamond Academy</strong>
                </div>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    System Status: <strong>Operational</strong>
                </div>
                <p class="text-muted">
                    <i class="fas fa-database me-2"></i>
                    Database: <strong>Connected</strong>
                </p>
                <p class="text-muted">
                    <i class="fas fa-server me-2"></i>
                    Laravel Version: <strong>{{ \Illuminate\Foundation\Application::VERSION }}</strong>
                </p>
                <p class="text-muted">
                    <i class="fas fa-clock me-2"></i>
                    Current Date/Time: <strong>{{ now()->format('Y-m-d H:i:s') }}</strong>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-download me-2"></i>Export Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3"><i class="fas fa-info-circle me-2"></i>Export recommendations data as CSV or JSON</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">
                        <i class="fas fa-file-csv me-2"></i>Export as CSV
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-file-code me-2"></i>Export as JSON
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1) !important;
    }

    .card-header {
        font-weight: 600;
        border-bottom: 3px solid rgba(0,0,0,0.1);
    }
</style>
@endsection

