te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Users</div>
				</div>
				<div class="col">
					<div class="card-tools text-right">
						<button class="btn btn-primary btn-sm" @click="create_user()">Add</button>
						<div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="user_modal_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 v-show="!editmode" class="modal-title" id="user_modal_label">Add New User</h5>
									<h5 v-show="editmode" class="modal-title" id="user_modal_label">Update User</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form @submit.prevent="editmode ? update_user() : store_user()" class="text-left">
									<div class="modal-body">
										<div class="form-group">
											<label for="user_description">Description</label>
											<select type="text" class="form-control form-control-sm" v-model="form.access_level_id">
                                                <option v-for="al in access_levels.data" :key="al.id" :value="al.id">{{ al.description }}</option>
											</select>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary btn-sm" v-show="!editmode">Submit</button>
										<button type="submit" class="btn btn-success btn-sm" v-show="editmode">Update</button>
										<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
           <table class="table">
           		<thead>
           			<tr>
           				<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Access_Level</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="user in users.data" :key="user.id">
           				<td>{{ user.id }}</td>
           				<td>{{ user.employee.firstname }}</td>
						<td>{{ user.employee.lastname }}</td>
						<td><p v-if="user.access_level_id !== null">{{ user.access_level.description }}</p></td>
           				<td>
                            <div class="btn-group dropleft">
                                <button class="btn btn-sm dropdown-toggle btn-outline-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" @click="edit_user(user)">Edit</a>
                                    <a class="dropdown-item" @click="delete_user(user.id)">Delete</a>
                                </div>
                            </div>
                        </td>
           			</tr>
           		</tbody>
           </table> 
        </div>
    </div>  
</template>
<script>
    export default {
		data() {
			return{
				editmode: false,
                users: {},
                access_levels: {},
                form: new Form({
                    id: '',
                    access_level_id: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_users();
                this.get_al();
            },
            get_users(){
                axios.get('api/users')
                .then(({data}) => (this.users = data));
            },
            get_al(){
                axios.get('api/access_levels')
                .then(({data}) => (this.access_levels = data));
            },
            create_user(){
                this.editmode = false;
                this.form.reset();
                $('#usermodal').modal('show');
                
            },
            store_user(){
                this.$Progress.start();
                this.form.post('api/user').then(() => {
                    Fire.$emit('success');
                    $('#user_modal').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Added Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            edit_user(user){
                this.editmode = true;
                this.form.reset();
                $('#user_modal').modal('show');
                this.form.fill(user);
            },
            update_user(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id).then(() => {
                    Fire.$emit('success');
                    $('#user_modal').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            delete_user(id){
                this.$Progress.start();
                axios.delete('api/user/'+id+'/delete').then(() => {
                    Fire.$emit('success');
                    $('#user_modal').modal('hide');
                        toast({
                            type: 'danger',
                            title: 'Deleted Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() => {

                });
            },
		},
		created(){
			this.load_all();
			Fire.$on('success',() => {
                this.load_all();
                
            });
		}
    }
</script>