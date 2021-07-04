<template>
    <div>
        <div class="section-header">
            <h1>Role</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="#">Role</a>
                </div>
                <div class="breadcrumb-item">Create Role</div>
            </div>
        </div>

        <div class="section-body">
            <form id="setting-form" @submit.prevent="save_role">
                <div class="card row" id="settings-card">
                    <div class="col-10">
                        <div class="card-body mt-5">
                            <div class="form-group row">
                                <label for="inputRole" class="form-control-label col-sm-3 text-md-right">Role <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="role" v-model="form.role" class="form-control" id="inputRole" required />
                                    <div v-if="form.errors.has('role')" v-html="form.errors.get('role')" class="text-danger"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputRank" class="form-control-label col-sm-3 text-md-right" >Permissions <span class="text-danger">*</span></label>
                                <div class="col-sm-6 col-md-9">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="check-all" />
                                        <label class="custom-control-label" for="check-all" ><h6 class="text-capitalize font-weight-bolder" > All </h6></label >
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 mt-3" v-for="(items, key) in permissions" :key="items.id" >
                                            <div class="custom-control custom-checkbox" >
                                                <input type="checkbox" class="permission-group-name permission-checkbox custom-control-input" :id="`check-all-${ key }`" />
                                                <label class="custom-control-label" :for="`check-all-${ key }`" ><h6 class="text-capitalize font-weight-bolder" > {{ key }} </h6></label >
                                            </div>
                                            <div :class="`group-name-${ key }`">
                                                <div class="custom-control custom-checkbox" v-for="permission in items" :key="permission.id" >
                                                    <input type="checkbox" class="permission-name permission-checkbox custom-control-input" :id="`permission-${ permission.id }`" name="permissions" v-model="form.permissions" :value="permission.id"/>
                                                    <label class="custom-control-label" :for="`permission-${ permission.id }`">{{ permission.name }}</label >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
import Form from 'vform'

export default {
    data: () => ({
        form: new Form({
            role: '',
            permissions: []
        })
    }),

    mounted() {
        this.$store.dispatch("permissions");
    },

    computed: {
        permissions() {
            return this.$store.getters.permissions;
        }
    },

    methods: {
        save_role () {
            this.form.post('/api/roles').then((response) => {
                if (response == 'success') {
                    this.form.reset()
                    this.$toastr.s("SUCCESS", "Role has been created successfully!");
                }
            })
        }
    }
};
</script>
