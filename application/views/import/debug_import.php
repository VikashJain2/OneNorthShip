<!DOCTYPE html>
<html>
<head>
    <title>Debug Import</title>
</head>
<body>
    <h2>Debug Import Process</h2>
    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('import/run_debug_import'); ?>">
        <label>Select Excel File to Debug:</label>
        <input type="file" name="debug_file" required><br><br>
        <input type="submit" value="Run Debug Import">
    </form>
</body>
</html>