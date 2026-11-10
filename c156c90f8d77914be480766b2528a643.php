<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fdf2f8">
    <title>Vet Care Clinic | Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <style>
        :root {
            color-scheme: light;
            font-family: "Poppins", sans-serif;
            color: #1f2937;
            background: #fdf2f8;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 28px 16px;
            background: linear-gradient(to bottom right, #fdf2f8, #fff, #fce7f3);
        }

        .card {
            position: relative;
            width: min(100%, 410px);
            padding: 34px;
            overflow: hidden;
            border: 1px solid #fce7f3;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            box-shadow: 0 20px 50px rgba(219, 39, 119, 0.12);
        }

        .card::before,
        .card::after {
            position: absolute;
            z-index: 0;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: #fce7f3;
            content: "";
            pointer-events: none;
        }

        .card::before { top: -84px; right: -56px; }
        .card::after { bottom: -96px; left: -70px; }
        .content { position: relative; z-index: 1; }

        .brand { margin-bottom: 25px; text-align: center; }
        .brand-mark {
            display: grid;
            width: 62px;
            height: 62px;
            margin: 0 auto 13px;
            place-items: center;
            border-radius: 21px;
            background: linear-gradient(to right, #ec4899, #f43f5e);
            box-shadow: 0 8px 18px rgba(236, 72, 153, 0.28);
            color: white;
            transition: transform 200ms ease;
        }

        .brand-mark .material-symbols-outlined { font-size: 31px; }
        .brand-mark:hover { transform: scale(1.05); }
        h1 { margin: 0; color: #1f2937; font-size: 25px; letter-spacing: -0.5px; }
        .tagline { margin: 7px 0 0; color: #ec4899; font-size: 13px; }

        .tabs {
            display: flex;
            gap: 4px;
            margin-bottom: 22px;
            padding: 4px;
            border: 1px solid #fce7f3;
            border-radius: 13px;
            background: #fdf2f8;
        }

        .tab {
            flex: 1;
            padding: 10px;
            border: 0;
            border-radius: 9px;
            background: transparent;
            color: #6b7280;
            cursor: pointer;
            font: inherit;
            font-size: 13px;
            font-weight: 700;
        }

        .tab[aria-selected="true"] {
            background: #fff;
            box-shadow: 0 2px 8px rgba(219, 39, 119, 0.12);
            color: #db2777;
        }

        .field { margin-bottom: 15px; }
        label { display: block; margin-bottom: 7px; color: #4b5563; font-size: 12px; font-weight: 600; }
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #fbcfe8;
            border-radius: 12px;
            outline: none;
            background: rgba(253, 242, 248, 0.35);
            color: #1f2937;
            font: inherit;
            font-size: 13px;
            transition: border-color 150ms ease, box-shadow 150ms ease;
        }

        input::placeholder { color: #9ca3af; }
        input:focus { border-color: #f472b6; background: #fff; box-shadow: 0 0 0 3px #fce7f3; }
        .submit {
            display: flex;
            width: 100%;
            min-height: 46px;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 21px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(to right, #ec4899, #f43f5e);
            box-shadow: 0 7px 16px rgba(236, 72, 153, 0.22);
            color: white;
            cursor: pointer;
            font: inherit;
            font-size: 13px;
            font-weight: 700;
            transition: transform 200ms ease, box-shadow 200ms ease, background 200ms ease;
        }

        .submit:hover {
            transform: translateY(-2px);
            background: linear-gradient(to right, #db2777, #e11d48);
            box-shadow: 0 12px 24px rgba(236, 72, 153, 0.3);
        }
        .submit .material-symbols-outlined { font-size: 18px; transition: transform 200ms ease; }
        .submit:hover .material-symbols-outlined { transform: scale(1.1); }
        .switch-copy { margin: 18px 0 0; color: #6b7280; font-size: 12px; text-align: center; }
        .switch-copy button {
            padding: 0;
            border: 0;
            background: none;
            color: #db2777;
            cursor: pointer;
            font: inherit;
            font-weight: 700;
        }

        .notice {
            margin-bottom: 16px;
            padding: 11px 13px;
            border: 1px solid #fbcfe8;
            border-radius: 11px;
            background: #fdf2f8;
            color: #be185d;
            font-size: 12px;
            line-height: 1.5;
        }

        .notice.success { border-color: #d8ebdc; background: #f5fbf5; color: #4a7957; }
        .field-error { margin: 6px 0 0; color: #bd456d; font-size: 11px; }
        [hidden] { display: none !important; }

        @media (max-width: 420px) {
            .card { padding: 28px 22px; border-radius: 24px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: 0.01ms !important; }
        }
    </style>
</head>
<body>
    <?php ($showRegister = old('name') !== null || $errors->has('name') || $errors->has('phone')); ?>
    <main class="card">
        <div class="content">
            <header class="brand">
                <div class="brand-mark" aria-hidden="true"><span class="material-symbols-outlined">VC</span></div>
                <h1>Vet Care Clinic</h1>
                <p class="tagline">Your pet's health, with a little extra love</p>
            </header>

            <div class="tabs" role="tablist" aria-label="Account access">
                <button class="tab" id="loginTab" type="button" role="tab" aria-controls="loginPanel"
                    aria-selected="<?php echo e($showRegister ? 'false' : 'true'); ?>" onclick="switchTab('login')">Log in</button>
                <button class="tab" id="registerTab" type="button" role="tab" aria-controls="registerPanel"
                    aria-selected="<?php echo e($showRegister ? 'true' : 'false'); ?>" onclick="switchTab('register')">Sign up</button>
            </div>

            <?php if(session('success')): ?>
                <div class="notice success" role="status"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="notice" role="alert">Please check the highlighted details and try again.</div>
            <?php endif; ?>

            <form id="loginPanel" role="tabpanel" aria-labelledby="loginTab" action="<?php echo e(route('login.owner')); ?>"
                method="POST" <?php echo e($showRegister ? 'hidden' : ''); ?>>
                <?php echo csrf_field(); ?>
                <div class="field">
                    <label for="loginEmail">Email address</label>
                    <input id="loginEmail" type="email" name="email" value="<?php echo e(old('email')); ?>" required
                        autocomplete="email" placeholder="you@example.com">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field">
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" type="password" name="password" required
                        autocomplete="current-password" placeholder="Your password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button class="submit" type="submit"><span class="material-symbols-outlined" aria-hidden="true">login</span> Log in to your account</button>
                <p class="switch-copy">New here? <button type="button" onclick="switchTab('register')">Create an account</button></p>
            </form>

            <form id="registerPanel" role="tabpanel" aria-labelledby="registerTab" action="<?php echo e(route('register.owner')); ?>"
                method="POST" <?php echo e($showRegister ? '' : 'hidden'); ?>>
                <?php echo csrf_field(); ?>
                <div class="field">
                    <label for="registerName">Your name</label>
                    <input id="registerName" type="text" name="name" value="<?php echo e(old('name')); ?>" required
                        autocomplete="name" placeholder="How should we call you?">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field">
                    <label for="registerEmail">Email address</label>
                    <input id="registerEmail" type="email" name="email" value="<?php echo e(old('email')); ?>" required
                        autocomplete="email" placeholder="you@example.com">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field">
                    <label for="registerPhone">Phone number</label>
                    <input id="registerPhone" type="tel" name="phone" value="<?php echo e(old('phone')); ?>" required
                        autocomplete="tel" placeholder="Your phone number">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field">
                    <label for="registerPassword">Create a password</label>
                    <input id="registerPassword" type="password" name="password" required minlength="8"
                        autocomplete="new-password" placeholder="At least 8 characters">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="field-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button class="submit" type="submit"><span class="material-symbols-outlined" aria-hidden="true">person_add</span> Create my account</button>
                <p class="switch-copy">Already have an account? <button type="button" onclick="switchTab('login')">Log in</button></p>
            </form>
        </div>
    </main>

    <script>
        function switchTab(tab) {
            const showLogin = tab === 'login';
            document.getElementById('loginPanel').hidden = !showLogin;
            document.getElementById('registerPanel').hidden = showLogin;
            document.getElementById('loginTab').setAttribute('aria-selected', String(showLogin));
            document.getElementById('registerTab').setAttribute('aria-selected', String(!showLogin));
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\vet-care-system\resources\views/welcome.blade.php ENDPATH**/ ?>