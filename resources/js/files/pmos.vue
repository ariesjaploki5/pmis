<template>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8"><div class="card-title">PMO/End-User</div></div>
            <div class="col-4 text-right">
                <button class="btn btn-primary" @click="create_pmo()">Add</button>
                <div class="modal fade" id="pmo_modal" tabindex="-1" role="dialog" aria-labelledby="pmo_modal_label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editmode" class="modal-title" id="pmo_modal_label">Add New PMO/End-User</h5>
                                <h5 v-show="editmode" class="modal-title" id="pmo_modal_label">Update  PMO/End-User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? update_pmo() : store_pmo()" class="text-left">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="item_description">Description</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.description">
                                    </div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="pmo in pmos.data" :key="pmo.id">
                    <td>{{ pmo.id }}</td>
                    <td>{{ pmo.description }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" @click="edit_pmo(pmo)">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        
    </div>
</div> 
</template>
<script>
export default {
    data(){
        return{
            editmode: false,
            form: new Form({
                id: '',
                description: '',
            }),
            pmos: {},
        }
    },
    methods: {
        load_all(){
            this.get_pmos();
        },
        get_pmos(){
            axios.get('api/pmos')
            .then(({data}) => (this.pmos = data));
        },
        pages_pmos(page = 1){
            axios.get('api/pmos?page=' + page)
            .then(response => {this.pmos = response.data;});
        },
        create_pmo(){
            $('#pmo_modal').modal('show');
        },
        store_pmo(){
            this.$Progress.start();
            this.form.post('api/pmo').then(() => {
                Fire.$emit('success');
                $('#pmo_modal').modal('hide');
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
        edit_pmo(pmo){
            this.editmode = true;
            this.form.reset();
            $('#pmo_modal').modal('show');
            this.form.fill(pmo);

        },
        update_pmo(){
            this.$Progress.start();
            this.form.put('api/pmo/'+this.form.id).then(() => {
                Fire.$emit('success');
                $('#pmo_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Updated Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },
        delete_pmo(id){

            axios.delete('api/pmo/'+id).then(() =>{

            }).catch(() => {

            });
        }
    },
    created(){
        this.load_all();
            Fire.$on('success',() => {
                this.load_all();
                
            });
    },
}
</script>
