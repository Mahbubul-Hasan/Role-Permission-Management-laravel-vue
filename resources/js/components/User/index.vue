<template>
    <div>
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card row" id="settings-card">
                <div class="col-12">
                    <div class="card-header d-flex flex-row-reverse px-0">
                        <router-link v-if="create_user" :to="{name: 'users.create'}" class="btn btn-primary btn-icon icon-left rounded-0 text-light"><i class="fas fa-plus"></i>Add User</router-link>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody v-if="users">
                                    <tr v-for="(user, index) in users" :key="user.id" >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>
                                            <span v-for="role in user.roles" :key="role.id" class="badge badge-primary p-1 px-2 mr-1">{{ role.name }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                <router-link v-if="edit_user" :to="{ name: 'users.edit', params: { id: user.id } }" class="btn btn-info btn-sm"><i class="far fa-edit"></i></router-link>
                                                <a v-if="delete_user" href="javascript:void(0)" @click="delete_user(user.id)" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            There is no user. Please insert user
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
        create_user: 0,
        edit_user: 0,
        delete_user: 0,
    }),

    mounted() {
        this.fetch_users();
        this.user_has_create_permission()
        this.user_has_edit_permission()
        this.user_has_delete_permission()
    },

    computed: {
        users() {
            return this.$store.getters.users;
        }
    },

    methods: {
        fetch_users() {
            return this.$store.dispatch("users");
        },

        delete_user (id) {
            if(confirm("Do you really want to delete?")){
                axios.delete(`/api/users/${id}`).then((response) => {
                    if (response.data == 'success') {
                        this.fetch_users();
                        this.$toastr.s("User has been deleted successfully!", "SUCCESS");
                    }
                }).catch(error => {
                    console.log(error);
                })
            }
        },

        user_has_create_permission() {
            axios.get(`users/hasPermission/Create user`).then(({data}) => {
                this.create_user = data;
            })
        },
        user_has_edit_permission() {
            axios.get(`users/hasPermission/Edit user`).then(({data}) => {
                this.edit_user = data;
            })
        },
        user_has_delete_permission() {
            axios.get(`users/hasPermission/Delete user`).then(({data}) => {
                this.delete_user = data;
            })
        }
    }
};
</script>
