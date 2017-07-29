<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/st-project/index.php/admin/login" method="post">
                <div class="form-group">
                    <label for="email">Username:</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
    if (isset($loginFail)) {
?>
    <script>
        alert('<?=$loginFail?>');
    </script>
    
<?php
    }
?>