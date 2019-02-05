<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Departments</div>
				</div>
				<div class="col">
					<div class="card-tools text-right">
						<button class="btn btn-primary btn-sm" @click="create_department()">Add</button>
						<div class="modal fade" id="department_modal" tabindex="-1" role="dialog" aria-labelledby="department_modal_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 v-show="!editmode" class="modal-title" id="department_modal_label">Add New department</h5>
									<h5 v-show="editmode" class="modal-title" id="department_modal_label">Update department</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form @submit.prevent="editmode ? update_department() : store_department()" class="text-left">
									<div class="modal-body">
										<div class="form-group">
											<label for="division_description">Department Code</label>
											<input type="text" class="form-control form-control-sm" v-model="form.code">
										</div>
										<div class="form-group">
											<label for="division_description">Department Name</label>
											<input type="text" class="form-control form-control-sm" v-model="form.description">
										</div>
										<div class="form-group">
											<label for="division_description">Division</label>
											<select name="" v-model="form.division_id" id="" class="form-control form-control-sm">
                                            <option v-for="division in divisions" :key="division.id" :value="division.id">{{ division.description }}</option>
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
						<th>Code</th>
						<th>Name</th>
						<th>Division</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="department in departments.data" :key="department.id">
           				<td>{{ department.id }}</td>
						<td>{{ department.code }}</td>
           				<td>{{ department.description }}</td>
						<td>{{ department.division.description }}</td>
           				<td>
                               <button class="btn btn-sm btn-success" @click="edit_department(department)">Edit</button>
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
                departments: {},
                form: new Form({
					id: '',
					code: '',
					description: '',
					division_id: '',
                }),
                divisions: {}
			}
		},
		methods: {
            load_all(){
				this.get_departments();
				this.get_divisions();
            },
            get_departments(){
                axios.get('api/departments')
                .then(({data}) => (this.departments = data));
			},
			get_divisions(){
                axios.get('api/all_divisions')
                .then(({data}) => (this.divisions = data));
            },
            create_department(){
                this.editmode = false;
                this.form.reset();
                $('#department_modal').modal('show');
                
            },
            store_department(){
                this.$Progress.start();
                this.form.post('api/department').then(() => {
                    Fire.$emit('success');
                    $('#department_modal').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Added Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            edit_department(department){
                this.editmode = true;
                this.form.reset();
                $('#department_modal').modal('show');
                this.form.fill(department);
            },
            update_department(){
                this.$Progress.start();
                this.form.put('api/department/'+this.form.id).then(() => {
                    Fire.$emit('success');
                    $('#department_modal').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Updated Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            delete_department(id){
                this.$Progress.start();
                axios.delete('api/department/'+id+'/delete').then(() => {
                    Fire.$emit('success');
                    $('#department_modal').modal('hide');
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