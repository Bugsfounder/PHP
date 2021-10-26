<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
    Signup
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for a iDiscuss account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/parsials/_handleSignup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" maxlength=20 class="form-control" id="username" name="username"
                            aria-describedby="usernameHelp">
                        <div id="usernameHelp" class="form-text">Choose username less than 20 letters. Your username
                            must be unique.</div>
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="signupPhoneNumber" class="form-label">Phone Number</label>
                        <input type="number" maxlength=10 class="form-control" id="signupPhoneNumber"
                            name="signupPhoneNumber" aria-describedby="signupPhoneNumberHelp">
                        <div id="signupPhoneNumberHelp" class="form-text">We'll never share your phone number with
                            anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" maxlength=20 class="form-control" id="signupPassword"
                            name="signupPassword">
                        <div id="passwordHelp" maxlength=20 class="form-text">Choose a difficult Password for Security.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="signupConfirmPassword"
                            id="signupConfirmPassword">
                        <div id="ConfirmPasswordHelp" class="form-text">Make sure password and confirm password are same
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>