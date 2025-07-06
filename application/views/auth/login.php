<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php echo validation_errors(); ?>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo site_url('auth/login'); ?>">
        <label>Username:</label>
        <input type="text" name="username"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <p><a href="<?php echo site_url('auth/register'); ?>">Don't have an account? Register</a></p>
</body>
</html>