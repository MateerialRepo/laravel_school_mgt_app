<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduManage &mdash; Sign In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; margin: 0; min-height: 100vh; display: flex; }

        .auth-left {
            width: 45%;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 60px 48px;
            position: relative; overflow: hidden;
        }
        .auth-left::before {
            content: ''; position: absolute; top: -80px; right: -80px;
            width: 300px; height: 300px;
            border-radius: 50%; background: rgba(255,255,255,.06);
        }
        .auth-left::after {
            content: ''; position: absolute; bottom: -60px; left: -60px;
            width: 220px; height: 220px;
            border-radius: 50%; background: rgba(255,255,255,.06);
        }
        .auth-left-content { position: relative; z-index: 1; text-align: center; color: #fff; }
        .brand-logo { width: 60px; height: 60px; background: rgba(255,255,255,.2); border-radius: 18px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 1.8rem; }
        .auth-left h1 { font-size: 2rem; font-weight: 700; margin-bottom: 12px; }
        .auth-left p { opacity: .8; font-size: .95rem; line-height: 1.6; }
        .auth-feature { display: flex; align-items: center; gap: 10px; margin-top: 12px; text-align: left; }
        .auth-feature i { color: #a5b4fc; font-size: 1rem; }
        .auth-feature span { font-size: .875rem; opacity: .9; }

        .auth-right {
            flex: 1;
            display: flex; align-items: center; justify-content: center;
            padding: 40px 32px;
            background: #f8fafc;
        }
        .auth-form-wrap { width: 100%; max-width: 400px; }
        .auth-form-wrap h2 { font-size: 1.6rem; font-weight: 700; color: #0f172a; margin-bottom: 6px; }
        .auth-form-wrap p { color: #64748b; font-size: .875rem; margin-bottom: 28px; }

        .form-label { font-size: .85rem; font-weight: 500; color: #374151; margin-bottom: 6px; }
        .form-control {
            border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 11px 14px;
            font-size: .875rem; color: #1e293b; background: #fff;
            transition: border-color .15s, box-shadow .15s;
        }
        .form-control:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,.12); outline: none; }
        .form-control.is-invalid { border-color: #ef4444; }

        .input-group .form-control { border-radius: 10px 0 0 10px; }
        .input-group .btn-eye { border: 1.5px solid #e2e8f0; border-left: none; border-radius: 0 10px 10px 0; background: #fff; color: #94a3b8; padding: 0 14px; }
        .input-group .btn-eye:hover { color: #6366f1; }

        .btn-signin {
            background: linear-gradient(135deg, #6366f1, #7c3aed);
            color: #fff; border: none; border-radius: 10px;
            padding: 12px; font-weight: 600; font-size: .9rem;
            width: 100%; transition: opacity .15s, transform .1s;
        }
        .btn-signin:hover { opacity: .9; transform: translateY(-1px); }

        .divider { text-align: center; margin: 20px 0; color: #94a3b8; font-size: .8rem; position: relative; }
        .divider::before, .divider::after { content: ''; position: absolute; top: 50%; width: 42%; height: 1px; background: #e2e8f0; }
        .divider::before { left: 0; } .divider::after { right: 0; }

        @media (max-width: 768px) {
            .auth-left { display: none; }
            .auth-right { padding: 32px 20px; }
        }
    </style>
</head>
<body>
    <div class="auth-left">
        <div class="auth-left-content">
            <div class="brand-logo"><i class="bi bi-mortarboard-fill"></i></div>
            <h1>EduManage</h1>
            <p>The modern platform for managing your school's students, teachers, and resources.</p>
            <div class="mt-4">
                <div class="auth-feature"><i class="bi bi-check-circle-fill"></i><span>Manage students & teachers easily</span></div>
                <div class="auth-feature"><i class="bi bi-check-circle-fill"></i><span>Secure role-based access control</span></div>
                <div class="auth-feature"><i class="bi bi-check-circle-fill"></i><span>Clean, fast, and intuitive interface</span></div>
            </div>
        </div>
    </div>

    <div class="auth-right">
        <div class="auth-form-wrap">
            <h2>Welcome back</h2>
            <p>Sign in to your EduManage account</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" placeholder="you@school.com" autofocus>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <label class="form-label mb-0">Password</label>
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size:.8rem;color:#6366f1;text-decoration:none">Forgot password?</a>
                        @endif
                    </div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="••••••••">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-4 d-flex align-items-center gap-2">
                    <input class="form-check-input mt-0" type="checkbox" name="remember" id="remember" style="width:16px;height:16px;accent-color:#6366f1">
                    <label for="remember" style="font-size:.85rem;color:#64748b">Keep me signed in</label>
                </div>

                <button type="submit" class="btn-signin">Sign In</button>
            </form>

            <p class="text-center mt-4" style="font-size:.85rem;color:#64748b">
                Don't have an account?
                <a href="{{ route('register') }}" style="color:#6366f1;font-weight:600;text-decoration:none">Create one</a>
            </p>
            <p class="text-center mt-4" style="font-size:.75rem;color:#94a3b8">&copy; {{ date('Y') }} EduManage</p>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
