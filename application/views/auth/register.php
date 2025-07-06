<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php echo validation_errors(); ?>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('message')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo site_url('auth/register'); ?>">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>"><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo set_value('email'); ?>"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <input type="submit" value="Register">
    </form>
    <p><a href="<?php echo site_url('auth/login'); ?>">Already have an account? Login</a></p>
</body>
</html>