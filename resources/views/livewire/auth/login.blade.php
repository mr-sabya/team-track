<form class="form-horizontal mt-3 mx-3" action="https://themesdesign.in/appzia/layouts/index.html">

    <div class="form-group mb-3">
        <div class="col-12">
            <input class="form-control" type="text" required="" placeholder="Username">
        </div>
    </div>

    <div class="form-group mb-3">
        <div class="col-12">
            <input class="form-control" type="password" required="" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" type="checkbox" checked="">
                <label for="checkbox-signup" class="text-color">
                    Remember me
                </label>
            </div>
        </div>
    </div>

    <div class="form-group text-center mt-3">
        <div class="col-12">
            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light w-100" type="submit">
                Log In</button>
        </div>
    </div>

    <div class="form-group row mt-4 mb-0">
        <div class="col-sm-7">
            <a href="auth-recoverpw.html" class="text-color">
                <i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
        </div>
        <div class="col-sm-5 text-right">
            <a href="{{ route('auth.register') }}" wire:navigate class="text-color">Create an account</a>
        </div>
    </div>
</form>