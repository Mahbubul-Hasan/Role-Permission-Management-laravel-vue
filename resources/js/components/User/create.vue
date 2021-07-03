<template>
    <div>
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="#">User</a>
                </div>
                <div class="breadcrumb-item">Create User</div>
            </div>
        </div>

        <div class="section-body">
            <form id="setting-form" @submit.prevent="save_user">
                <div class="card row" id="settings-card">
                    <div class="col-10">
                        <div class="card-body mt-5">
                            <div class="form-group row">
                                <label class="form-control-label col-sm-3 text-md-right">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="name" v-model="form.name" class="form-control" required />
                                    <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" class="text-danger"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="form-control-label col-sm-3 text-md-right">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="email" v-model="form.email" class="form-control" required />
                                    <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" class="text-danger"/>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label class="form-control-label col-sm-3 text-md-right">Role <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <select name="roles" v-model="form.roles" class="form-control select2" multiple required>
                                        <option v-for="role in roles" :key="role.id" :value="role.id" >{{ role.name }}</option>
                                    </select>
                                    <div v-if="form.errors.has('roles')" v-html="form.errors.get('roles')" class="text-danger"/>
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label class="form-control-label col-sm-3 text-md-right">Roles <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <multiselect v-model="multiSelectRoleObjs" :options="get_roles" :multiple="true" label="name" track-by="id" @input="set_role_to_form"></multiselect>
                                    <div v-if="form.errors.has('roles')" v-html="form.errors.get('roles')" class="text-danger"/>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="form-control-label col-sm-3 text-md-right">Password <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="password" name="password" v-model="form.password" class="form-control" required />
                                    <div v-if="form.errors.has('password')" v-html="form.errors.get('password')" class="text-danger"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="form-control-label col-sm-3 text-md-right">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="password" name="password_confirmation" v-model="form.password_confirmation" class="form-control" required />
                                    <div v-if="form.errors.has('password_confirmation')" v-html="form.errors.get('password_confirmation')" class="text-danger"/>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-md-right pt-0">
                            <button class="btn btn-primary rounded-0 px-5" type="submit"> Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

import Form from 'vform'

export default {
    data: () => ({
        multiSelectRoleObjs: [],
        form: new Form({
            name: '',
            email: '',
            roles: [],
            password: '',
            password_confirmation: '',
        })
    }),

    components: { Multiselect },

    mounted() {
        this.$store.dispatch("roles");
    },

    computed: {
        get_roles() {
            return this.$store.getters.roles;
        }
    },

    methods: {
        set_role_to_form(get_roles) {
            let roles = [];

            get_roles.forEach((role) => {
                roles.push(role.id);
            });

            return this.form.roles = roles;
        },

        save_user () {
            this.form.post('/api/users').then((response) => {
                if (response.data == 'success') {
                    this.form.reset()
                    this.multiSelectRoleObjs = null,

                    this.$toastr.s("User has been created successfully!", "SUCCESS");
                }
            })
        }
    }
};
</script>
