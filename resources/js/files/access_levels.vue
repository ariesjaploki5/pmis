<template>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8"><div class="card-title">Access Levels</div></div>
            <div class="col-4 text-right">
                <button class="btn btn-primary" @click="create_access_level()">Add</button>
                <div class="modal fade" id="access_level_modal" tabindex="-1" role="dialog" aria-labelledby="access_level_modal_label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editmode" class="modal-title" id="access_level_modal_label">Add New Access Level</h5>
                                <h5 v-show="editmode" class="modal-title" id="access_level_modal_label">Update Access Level</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? update_access_level() : store_access_level()" class="text-left">
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
                <tr v-for="al in access_levels.data" :key="al.id">
                    <td>{{ al.id }}</td>
                    <td>{{ al.description }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" @click="edit_access_level(al)">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <pagination :data="access_levels" @pagination-change-page="pages_access_levels"></pagination>
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
            access_levels: {},
        }
    },
    methods: {
        load_all(){
            this.get_access_levels();
        },
        get_access_levels(){
            axios.get('api/access_levels')
            .then(({data}) => (this.access_levels = data));
        },
        pages_access_levels(page = 1){
            axios.get('api/access_levels?page=' + page)
            .then(response => {this.access_levels = response.data;});
        },
        create_access_level(){
            this.form.reset();
            $('#access_level_modal').modal('show');
        },
        store_access_level(){
            
            this.$Progress.start();
            this.form.post('api/access_level').then(() => {
                Fire.$emit('success');
                $('#access_level_modal').modal('hide');
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
        edit_access_level(category){
            this.editmode = true;
            this.form.reset();
            $('#access_level_modal').modal('show');
            this.form.fill(category);

        },
        update_access_level(){
            this.$Progress.start();
            this.form.put('api/access_level/'+this.form.id).then(() => {
                Fire.$emit('success');
                $('#access_level_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Updated Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },
        delete_access_level(id){

            axios.delete('api/access_level/'+id).then(() =>{

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
