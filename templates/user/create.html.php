<div class="d-flex justify-content-center">
    <div class="card ">
        <div class="card-header">
            <div class="text-header">Register</div>
        </div>
        <div class="card-body">
            <form action="?type=user&action=create" method="post">
                <div >
                    <label class="labelRegister" for="username">Username:</label>
                    <input required="" class="text" name="username" id="username" type="text">
                </div>
                <div >
                    <label class="labelRegister" for="email">Email:</label>
                    <input required="" class="mail" name="email" id="email" type="email">
                </div>
                <div  >
                    <label class="labelRegister" for="password">Password:</label>
                    <input required="" class="password" name="password" id="password" type="password">
                </div>
                <div >
                    <label class="labelRegister" for="confirm-password">Confirm Password:</label>
                    <input required="" class="password" name="confirm-password" id="confirm-password" type="password">
                </div>
                <input type="submit" class="btnRegister" value="submit">
            </form>
        </div>
    </div>
</div>


