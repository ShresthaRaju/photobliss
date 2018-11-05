<template>
    <div class="container mt-10">
        <div class="row">
            <div class="col-md-6 col-lg-5 ml-auto mr-auto">
                <div class="card card-login">
                    <form @submit.prevent="signIn">
                        <div class="card-header card-header-info">
                            <h3 class="card-title text-center">Sign In</h3>
                        </div>
                        <div class="card-body">
                            <div class="input-group has-info">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">mail</i>
                                    </span>
                                </div>
                                <input class="form-control" name="email" placeholder="E-mail address" type="email" v-model.lazy="user.email" />
                            </div>
                            <small class="form-text text-center text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                            <small class="form-text text-center text-danger" v-if="errors.invalidLogin">{{errors.invalidLogin}}</small>
                            <div class="input-group has-info">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input class="form-control" name="password" placeholder="Password" type="password" v-model.lazy="user.password" />
                            </div>
                            <small class="form-text text-center text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                        </div>
                        <!--end of .card-body-->
                        <div class="row mt-4 mb-2">
                            <div class="col-6 col-lg-9 mr-auto ml-auto">
                                <button type="submit" class="btn btn-info btn-raised btn-round btn-block">
                                    Sign In
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end of .card-->
                <div class="text-center">
                    <p class="description text-white font-weight-bold">New to PhotoBliss?
                        <a href="/sign-up" class="btn btn-primary btn-sm btn-raised">Join Here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user: {
                    email: '',
                    password: ''
                },
                errors: {},
            }
        },
        methods: {
            signIn() {
                var vm = this;
                axios.post('sign-in', this.user)
                    .then(response => {
                        if (response.data.authenticated) {
                            location.reload();
                            this.user = "";
                            this.errors = "";
                        } else {
                            this.errors = {
                                invalidLogin: "Invalid Login! Please try again"
                            }
                        }
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors
                    })
            }
        }
    }

</script>
