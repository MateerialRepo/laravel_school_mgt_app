<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduManage &mdash; Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; margin: 0; min-height: 100vh; display: flex; }
        .auth-left {
            width: 40%;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 60px 48px; position: relative; overflow: hidden;
        }
        .auth-left::before { content:''; position:absolute; top:-60px; right:-60px; width:250px; height:250px; border-radius:50%; background:rgba(99,102,241,.12); }
        .auth-left::after { content:''; position:absolute; bottom:-60px; left:-60px; width:200px; height:200px; border-radius:50%; background:rgba(124,58,237,.1); }
        .auth-left-content { position:relative; z-index:1; text-align:center; color:#fff; }
        .brand-logo { width:60px; height:60px; background:linear-gradient(135deg,#6366f1,#7c3aed); border-radius:18px; display:flex; align-items:center; justify-content:center; margin:0 auto 24px; font-size:1.8rem; }
        .auth-left h1 { font-size:1.9rem; font-weight:700; margin-bottom:12px; }
        .auth-left p { opacity:.7; font-size:.9rem; line-height:1.6; }

        .auth-right { flex:1; display:flex; align-items:center; justify-content:center; padding:40px 32px; background:#f8fafc; }
        .auth-form-wrap { width:100%; max-width:440px; }
        .auth-form-wrap h2 { font-size:1.5rem; font-weight:700; color:#0f172a; margin-bottom:6px; }
        .auth-form-wrap p.sub { color:#64748b; font-size:.875rem; margin-bottom:24px; }

        .form-label { font-size:.85rem; font-weight:500; color:#374151; margin-bottom:5px; }
        .form-control { border:1.5px solid #e2e8f0; border-radius:10px; padding:10px 14px; font-size:.875rem; color:#1e293b; background:#fff; transition:border-color .15s,box-shadow .15s; }
        .form-control:focus { border-color:#6366f1; box-shadow:0 0 0 3px rgba(99,102,241,.12); outline:none; }
        .form-control.is-invalid { border-color:#ef4444; }
        .btn-register { background:linear-gradient(135deg,#6366f1,#7c3aed); color:#fff; border:none; border-radius:10px; padding:12px; font-weight:600; font-size:.9rem; width:100%; transition:opacity .15s,transform .1s; }
        .btn-register:hover { opacity:.9; transform:translateY(-1px); }
        @media (max-width:768px) { .auth-left { display:none; } .auth-right { padding:32px 20px; } }
    </style>
</head>
<body>
    <div class="auth-left">
        <div class="auth-left-content">
            <div class="brand-logo"><i class="bi bi-mortarboard-fill"></i></div>
            <h1>Join EduManage</h1>
            <p>Create an account to start managing your school with a modern, intuitive platform.</p>
        </div>
    </div>

    <div class="auth-right">
        <div class="auth-form-wrap">
            <h2>Create an account</h2>
            <p class="sub">Fill in your details to get started</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" placeholder="John Doe" autofocus>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" placeholder="you@school.com">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="••••••••">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="btn-register mt-2">Create Account</button>
            </form>

            <p class="text-center mt-4" style="font-size:.85rem;color:#64748b">
                Already have an account?
                <a href="{{ route('login') }}" style="color:#6366f1;font-weight:600;text-decoration:none">Sign in</a>
            </p>
            <p class="text-center mt-3" style="font-size:.75rem;color:#94a3b8">&copy; {{ date('Y') }} EduManage</p>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
