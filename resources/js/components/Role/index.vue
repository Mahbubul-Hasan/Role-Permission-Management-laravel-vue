<template>
    <div>
        <div class="section-header">
            <h1>Role</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Role</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card row" id="settings-card">
                <div class="col-12">
                    <div class="card-header d-flex flex-row-reverse px-0">
                        <router-link class="btn btn-primary btn-icon icon-left rounded-0 text-light" :to="{ name: 'roles.create' }"><i class="fas fa-plus"></i>Add Role</router-link>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody v-if="roles">
                                    <tr v-for="(role, index) in roles" :key="role.id" >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ role.name }}</td>
                                        <td>
                                            <span v-for="permission in role.permissions" :key="permission.id" class="badge badge-primary p-1 px-2 mr-1">{{ permission.name }}</span>
                                        </td>
                                        <td>Action</td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            There is no role. Please insert role
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.$store.dispatch("roles");
    },

    computed: {
        roles() {
            return this.$store.getters.roles;
        }
    }
};
</script>
