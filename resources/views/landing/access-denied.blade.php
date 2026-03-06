<!DOCTYPE html>
<html>
<head>
    <title>Access Denied</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .access-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 500px;
            text-align: center;
        }
        .icon-container {
            font-size: 80px;
            color: #ff6b6b;
            margin-bottom: 20px;
        }
        .btn-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-custom:hover {
            color: white;
            opacity: 0.9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="access-card">
        <div class="icon-container">
            <i class="bi bi-shield-exclamation"></i>
        </div>
        
        <h2 class="text-danger mb-4">Access Restricted</h2>
        
        <div class="alert alert-warning">
            <p class="mb-0">{{ $message ?? 'You do not have permission to access this page.' }}</p>
        </div>
        
        @isset($userType)
            <div class="alert alert-info mt-3">
                @if($userType === 'customer')
                    <strong>Detected:</strong> You are logged in as a customer.<br>
                    <small>Please use the customer portal for your deliveries.</small>
                @elseif($userType === 'delivery_man')
                    <strong>Detected:</strong> You are logged in as a delivery man.<br>
                    <small>You can only access your own delivery dashboard.</small>
                @else
                    <strong>Detected:</strong> You are not authorized to view this page.<br>
                    <small>This area is restricted to delivery personnel only.</small>
                @endif
            </div>
        @endisset
        
        <div class="mt-4">
            @if(isset($redirectUrl))
                <a href="{{ $redirectUrl }}" class="btn-custom">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ url('/') }}" class="btn-custom">
                    <i class="bi bi-house-door"></i> Return Home
                </a>
                @if(auth()->check())
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary ms-2">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                @endif
            @endif
        </div>
        
        <div class="mt-4 text-muted small">
            <p>If you believe this is an error, please contact support.</p>
            <p>Error Code: ACCESS_DENIED_{{ strtoupper($userType ?? 'UNKNOWN') }}</p>
        </div>
    </div>
</body>
</html>