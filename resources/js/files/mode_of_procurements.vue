<template>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8"><div class="card-title">Mode of Procurements</div></div>
            <div class="col-4 text-right">
                <button class="btn btn-primary" @click="create_mop()">Add</button>
                <div class="modal fade" id="mop_modal" tabindex="-1" role="dialog" aria-labelledby="mop_modal_label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editmode" class="modal-title" id="mop_modal_label">Add New Mode of Procurements</h5>
                                <h5 v-show="editmode" class="modal-title" id="mop_modal_label">Update Mode of Procurements</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? update_mop() : store_mop()" class="text-left">
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
                <tr v-for="mop in mops.data" :key="mop.id">
                    <td>{{ mop.id }}</td>
                    <td>{{ mop.description }}</td>
                    <td>
                        <div class="btn-group dropleft">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" @click="edit_mop(mop)">Edit</a>
                                <a class="dropdown-item" @click="delete_mop(mop.id)">Delete</a>
                            </div>
                        </div>
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
            mops: {},
        }
    },
    methods: {
        load_all(){
            this.get_mops();
        },
        get_mops(){
            axios.get('api/mops')
            .then(({data}) => (this.mops = data));
        },
        pages_mops(page = 1){
            axios.get('api/mops?page=' + page)
            .then(response => {this.mops = response.data;});
        },
        create_mop(){
            $('#mop_modal').modal('show');
        },
        store_mop(){
            this.$Progress.start();
            this.form.post('api/mop').then(() => {
                Fire.$emit('success');
                $('#mop_modal').modal('hide');
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
        edit_mop(mop){
            this.editmode = true;
            this.form.reset();
            $('#mop_modal').modal('show');
            this.form.fill(mop);

        },
        update_mop(){
            this.$Progress.start();
            this.form.put('api/mop/'+this.form.id).then(() => {
                Fire.$emit('success');
                $('#mop_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Updated Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },
        delete_mop(id){
            axios.delete('api/mop/'+id+'/delete').then(() =>{
                Fire.$emit('success');
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
