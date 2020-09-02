<!-- Button trigger modal -->
<?php if (!$adminController->checkAdminSession()) { ?>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#signInModal">
        Sign In
    </button>
<?php } else { ?>
    <form method="post">
        <button type="submit" class="btn btn-primary float-right" name="validationServerUnAuthorisationButton">
            Sign Out
        </button>
    </form>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" class="form-group row">
                <div>
                    <label for="validationServerLogin">Login</label>
                    <input type="text" class="form-control" name="validationServerLogin" required>
                </div>

                <div>
                    <label for="validationServerPassword">Password</label>
                    <input type="password" class="form-control" name="validationServerPassword" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="validationServerAuthorisationButton">Sign In</button>
            </div>
        </form>
    </div>
</div>