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
                        <router-link v-if="create_role" :to="{ name: 'roles.create' }" class="btn btn-primary btn-icon icon-left rounded-0 text-light"><i class="fas fa-plus"></i>Add Role</router-link>
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
                                        <td>
                                            <div class="btn-group mb-3" role="group" aria-label="Basic example">

                                                <router-link v-if="edit_role" :to="{ name: 'roles.edit', params: { id: role.id } }" class="btn btn-info btn-sm"><i class="far fa-edit"></i></router-link>

                                                <a v-if="delete_role" href="javascript:void(0)" @click="delete_role(role.id)" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
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
    data: () => ({
        create_role: 0,
        edit_role: 0,
        delete_role: 0,
    }),

    mounted() {
        this.$store.dispatch("roles");
        this.user_has_create_permission()
        this.user_has_edit_permission()
        this.user_has_delete_permission()
    },

    methods: {
        user_has_create_permission() {
            axios.get(`users/hasPermission/Create role`).then(({data}) => {
                this.create_role = data;
            })
        },
        user_has_edit_permission() {
            axios.get(`users/hasPermission/Edit role`).then(({data}) => {
                this.edit_role = data;
            })
        },
        user_has_delete_permission() {
            axios.get(`users/hasPermission/Delete role`).then(({data}) => {
                this.delete_role = data;
            })
        }
    },

    computed: {
        roles() {
            return this.$store.getters.roles;
        },
    }
};
</script>
