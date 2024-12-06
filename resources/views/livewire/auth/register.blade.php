<form class="form-horizontal mt-3" action="https://themesdesign.in/appzia/layouts/index.html">

    <div class="form-group mb-3">
        <div class="col-12">
            <input class="form-control" type="email" required="" placeholder="Email">
        </div>
    </div>

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
                <input id="checkbox-signup" type="checkbox" checked="checked">
                <label for="checkbox-signup" class="text-color">
                    I accept <a href="#" class="text-color">Terms and Conditions</a>
                </label>
            </div>

        </div>
    </div>

    <div class="form-group text-center mt-4">
        <div class="col-12">
            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light w-100" type="submit">Register</button>
        </div>
    </div>

    <div class="form-group mt-3 mb-0">
        <div class="col-sm-12 text-center">
            <a href="{{ route('auth.login') }}" wire:navigate class="text-color">Already have account?</a>
        </div>
    </div>

</form>