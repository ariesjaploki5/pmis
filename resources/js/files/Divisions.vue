te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Divisions</div>
				</div>
				<div class="col">
					<div class="card-tools text-right">
						<button class="btn btn-primary btn-sm" @click="create_division()">Add</button>
						<div class="modal fade" id="division_modal" tabindex="-1" role="dialog" aria-labelledby="division_modal_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 v-show="!editmode" class="modal-title" id="division_modal_label">Add New division</h5>
									<h5 v-show="editmode" class="modal-title" id="division_modal_label">Update division</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form @submit.prevent="editmode ? update_division() : store_division()" class="text-left">
									<div class="modal-body">
										<div class="form-group">
											<label for="division_description">Description</label>
											<input type="text" class="form-control form-control-sm" v-model="form.description">
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
						<th>Description</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="division in divisions.data" :key="division.id">
           				<td>{{ division.id }}</td>
           				<td>{{ division.description }}</td>
           				<td>
                            <div class="btn-group dropleft">
                                <button class="btn btn-sm dropdown-toggle btn-outline-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" @click="edit_division(division)">Edit</a>
                                    <a class="dropdown-item" @click="delete_division(division.id)">Delete</a>
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
                divisions: {},
                form: new Form({
                    id: '',
                    description: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_divisions();
            },
            get_divisions(){
                axios.get('api/divisions')
                .then(({data}) => (this.divisions = data));
            },
            create_division(){
                this.editmode = false;
                this.form.reset();
                $('#division_modal').modal('show');
                
            },
            store_division(){
                this.$Progress.start();
                this.form.post('api/division').then(() => {
                    Fire.$emit('success');
                    $('#division_modal').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Added Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            edit_division(division){
                this.editmode = true;
                this.form.reset();
                $('#division_modal').modal('show');
                this.form.fill(division);
            },
            update_division(){
                this.$Progress.start();
                this.form.put('api/division/'+this.form.id).then(() => {
                    Fire.$emit('success');
                    $('#division_modal').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            delete_division(id){
                this.$Progress.start();
                axios.delete('api/division/'+id+'/delete').then(() => {
                    Fire.$emit('success');
                    $('#division_modal').modal('hide');
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