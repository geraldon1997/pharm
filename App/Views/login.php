<div class="form-screen">
        <a href="<?= LOGIN; ?>" class="spur-logo"><i class="fas fa-bolt"></i> <span><?= APP_NAME; ?></span></a>
        <div class="card account-dialog">
            <div class="card-header bg-primary text-white"> Please sign in </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                
                    <div class="account-dialog-actions">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    $('form').submit((e) => {
        e.preventDefault();
        var btn = this.$('button');
        var username = this.$('#username').val();
        var password = this.$('#password').val();
        
        btn.prop('disabled',true).html('processing . . .');

        setTimeout(() => {
            if (username === '' || username === null || username === undefined) {
                btn.removeAttr('disabled').html('Sign in');
                return alert('Username cannot be empty');
            }

            if (password === '' || password === null || password === undefined) {
                btn.removeAttr('disabled').html('Sign in');
                return alert('password cannot be empty');
            }

            $.post({
                url : "<?= AUTH; ?>",
                data : {
                    username : username,
                    password : password
                },
                success : (response) => {
                    alert(response);
                }
            })
        }, 1000);

        
    })
</script>