<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login To iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/parsials/_handleLogin.php" method='post'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" name="loginUsername" id="loginUsername"
                            aria-describedby="loginUsernameHelp">
                        <div id="loginUsernameHelp" class="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="loginEmail" id="loginEmail"
                            aria-describedby="loginEmailHelp">
                        <div id="loginEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="loginPassword" id="loginPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>