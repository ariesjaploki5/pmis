<template>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8"><div class="card-title">Items</div></div>
            <div class="col-4 text-right">
                <button class="btn btn-primary" @click="create_pap_code()">Add</button>
                <div class="modal fade" id="pap_code_modal" tabindex="-1" role="dialog" aria-labelledby="pap_code_modal_label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editmode" class="modal-title" id="pap_code_modal_label">Add New Pap Code</h5>
                                <h5 v-show="editmode" class="modal-title" id="pap_code_modal_label">Update Pap Code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? update_pap_code() : store_pap_code()" class="text-left">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="item_code">Code</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.code">
                                    </div>
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
                    <th>Pap Code</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="pap_code in pap_codes.data" :key="pap_code.id">
                    <td>{{ pap_code.id }}</td>
                    <td>{{ pap_code.code }}</td>
                    <td>{{ pap_code.description }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" @click="edit_pap_code(pap_code)">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <pagination :data="pap_codes" @pagination-change-page="pages_pap_codes"></pagination>
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
                code: '',
                description: '',
            }),
            pap_codes: {},
        }
    },
    methods: {
        load_all(){
            this.get_pap_codes();
        },
        get_pap_codes(){
            axios.get('api/pap_codes')
            .then(({data}) => (this.pap_codes = data));
        },
        pages_pap_codes(){
            axios.get('api/pap_codes?page=' + page)
            .then(response => {this.pap_codes = response.data;});
        },
        create_pap_code(){
            $('#pap_code_modal').modal('show');
        },
        store_pap_code(){
            this.$Progress.start();
            this.form.post('api/pap_code').then(() => {
                Fire.$emit('success');
                $('#pap_code_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Added Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },
        edit_pap_code(pap_code){
            this.editmode = true;
            this.form.reset();
            $('#pap_code_modal').modal('show');
            this.form.fill(pap_code);

        },
        update_pap_code(){
            this.$Progress.start();
            this.form.put('api/pap_code/'+this.form.id).then(() => {
                Fire.$emit('success');
                $('#pap_code_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Updated Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },
    },
    created(){
        this.load_all();
            Fire.$on('success',() => {
                this.load_all();
                
            });
    },
}
</script>
