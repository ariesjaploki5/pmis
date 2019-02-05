te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
                <div class="col">
                    <div class="card-title">Units</div>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary btn-sm" @click="create_unit()">Add</button>
                    <div class="modal fade" id="unit_modal" tabindex="-1" role="dialog" aria-labelledby="unit_modal_label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editmode" class="modal-title" id="unit_modal_label">Add New Unit</h5>
                                <h5 v-show="editmode" class="modal-title" id="unit_modal_label">Update Unit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? update_unit() : store_unit()" class="text-left">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="item_description">Description</label>
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
           <table class="table">
           		<thead>
           			<tr>
           				<th>ID</th>
						<th>Description</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="unit in units.data" :key="unit.id">
           				<td>{{ unit.id }}</td>
           				<td>{{ unit.description }}</td>
           				<td>
                               <div class="btn-group dropleft">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" @click="edit_unit(unit)">Edit</a>
                                    <a class="dropdown-item" @click="delete_unit(unit.id)">Delete</a>
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
                units: {},
                form: new Form({
                    id: '',
                    description: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_units();
            },
            get_units(){
                axios.get('api/units')
                .then(({data}) => (this.units = data));
            },
            create_unit(){
                this.editmode = false;
                this.form.reset();
                $('#unit_modal').modal('show');
            },
            store_unit(){
                this.$Progress.start();
                this.form.post('api/unit').then(() => {
                    Fire.$emit('success');
                    $('#unit_modal').modal('hide');
                    this.form.reset();
                        toast({
                            type: 'success',
                            title: 'Added Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            edit_unit(unit){
				this.editmode = true;
                this.form.reset();
                $('#unit_modal').modal('show');
                this.form.fill(unit);
            },
            update_unit(){
				this.form.put('api/unit/'+this.form.id).then(() => {

				}).catch(() => {

				});
			},
			delete_unit(id){
				axios.delete('api/unit/'+id).then(() => {

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