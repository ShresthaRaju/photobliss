<template>
<div class="container mt-10">
    <div class="row">
        <div class="col-md-6 col-lg-5 ml-auto mr-auto">
            <div class="card card-login">
                <form @submit.prevent="registerUser">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title text-center">
                        Sign Up
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">
                                    face
                                    </i>
                                </span>
                            </div>
                            <input class="form-control" name="full_name" placeholder="Full name" type="text" v-model.lazy="user.fullName" />
                        </div>
                        <small class="form-text text-center text-danger" v-if="formErrors.fullName">{{formErrors.fullName[0]}}</small>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">
                                    mail
                                    </i>
                                </span>
                            </div>
                            <input class="form-control" name="email" placeholder="E-mail address" type="email" v-model.lazy="user.email" />
                        </div>
                        <small class="form-text text-center text-danger" v-if="formErrors.email">{{formErrors.email[0]}}</small>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">
                                    person
                                    </i>
                                </span>
                            </div>
                            <input class="form-control" name="username" placeholder="Username" type="text" v-model.lazy="user.username" />
                        </div>
                        <small class="form-text text-center text-danger" v-if="formErrors.username">{{formErrors.username[0]}}</small>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">
                                    lock_outline
                                    </i>
                                </span>
                            </div>
                            <input class="form-control" name="password" placeholder="Password" type="password" v-model.lazy="user.password" />
                        </div>
                        <small class="form-text text-center text-danger" v-if="formErrors.password">{{formErrors.password[0]}}</small>
                    </div><!--end of .card-body-->
                    <div class="row mt-3 mb-2">
                        <div class="col-6 col-lg-8 mr-auto ml-auto">
                            <button type="submit" class="btn btn-primary btn-raised btn-round btn-block">
                            Get Started
                            </button>
                        </div>
                    </div>
                </form>
            </div> <!-- end of .card-->
            <div class="text-center">
                <p class="description text-white font-weight-bold">Got an account?
                    <a href="/sign-in" class="btn btn-info btn-sm btn-raised">Sign In</a>
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
                    fullName: '',
                    email: '',
                    username: '',
                    password: ''
                },
                formErrors:{}
            }
        },
        methods: {
            registerUser() {
                axios.post('sign-up', this.user)
                .then(response => {
                this.user = "";
                this.formErrors="";
                })
                .catch(errors => {
                this.formErrors=errors.response.data.errors;
                })
            }
        },
    }
</script>