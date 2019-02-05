<template>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8"><div class="card-title">Categories</div></div>
            <div class="col-4 text-right">
                <button class="btn btn-primary" @click="create_category()">Add</button>
                <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="category_modal_label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editmode" class="modal-title" id="category_modal_label">Add New Categories</h5>
                                <h5 v-show="editmode" class="modal-title" id="category_modal_label">Update Categories</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? update_category() : store_category()" class="text-left">
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
                <tr v-for="category in categories.data" :key="category.id">
                    <td>{{ category.id }}</td>
                    <td>{{ category.description }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" @click="edit_category(category)">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <pagination :data="categories" @pagination-change-page="pages_categories"></pagination>
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
            categories: {},
        }
    },
    methods: {
        load_all(){
            this.get_categories();
        },
        get_categories(){
            axios.get('api/categories')
            .then(({data}) => (this.categories = data));
        },
        pages_categories(page = 1){
            axios.get('api/categories?page=' + page)
            .then(response => {this.categories = response.data;});
        },
        create_category(){
            $('#category_modal').modal('show');
        },
        store_category(){
            this.$Progress.start();
            this.form.post('api/category').then(() => {
                Fire.$emit('success');
                $('#category_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Added Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },
        edit_category(category){
            this.editmode = true;
            this.form.reset();
            $('#category_modal').modal('show');
            this.form.fill(category);

        },
        update_category(){
            this.$Progress.start();
            this.form.put('api/category/'+this.form.id).then(() => {
                Fire.$emit('success');
                $('#category_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Updated Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },
        delete_category(id){

            axios.delete('api/category/'+id).then(() =>{

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
