<template>
    <div class="card rounded-0">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card-title">Item List</div>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary btn-sm" @click="create_item()">Add</button>
                    <div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="item_modal_label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editmode" class="modal-title" id="item_modal_label">Add New Item</h5>
                                <h5 v-show="editmode" class="modal-title" id="item_modal_label">Update Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? update_item() : store_item()" class="text-left">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="item_code">Code</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.item_code">
                                    </div>
                                    <div class="form-group">
                                        <label for="item_description">Description</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.item_description">
                                    </div>
                                    <div class="form-group">
                                        <label for="item_total_quantity">Total</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.item_total_quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="item_total_quantity">Account Code</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.account_code">
                                    </div>
                                    <div class="form-group">
                                        <label for="pap_code_id">Pap Code</label>
                                        <select name="" v-model="form.pap_code_id" id="" class="form-control form-control-sm">
                                            <option v-for="pap_code in pap_codes.data" :key="pap_code.id" :value="pap_code.id">{{ pap_code.description }}</option>
                                        </select>
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
           <table class="table">
           		<thead>
           			<tr>
           				<th>ID</th>
           				<th>Item Code</th>
           				<th>Item Descriptions</th>
           				<th>Pap Code</th>
                        <th>Account Code</th>
                        <th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="item in items.data" :key="item.id">
                        <td>{{ item.id }}</td>
                        <td>{{ item.item_code }}</td>
           				<td>{{ item.item_description }}</td>
           				<td>{{ item.pap_code_id }}</td>
           				<td>{{ item.account_code }}</td>
           				<td>
                            <button class="btn btn-sm btn-success" @click="edit_item(item)">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
           			</tr>
           		</tbody>
           </table> 
        </div>
        <div class="card-footer">
            <pagination :data="items" @pagination-change-page="pages_items"></pagination>
        </div>
    </div>  
</template>
<script>
    export default {
        data(){
            return {
                role_id: '',
                editmode: false,
                form: new Form({
                    id:'',
                    item_code:'',
                    item_description: '',
                    item_total_quantity: '',
                    account_code: '',
                    pap_code_id: '',

                }),
                items: {},
                pap_codes: {},

            }
        },
        methods:{
            
            load_all(){
                this.get_items();
                this.get_pap_codes();
            },
            get_pap_codes(){
                axios.get('api/pap_codes')
                .then(({data}) => (this.pap_codes = data));
            },
            get_items(){
                axios.get('api/items')
                .then(({data}) => (this.items = data));
            },
            pages_items(){
                axios.get('api/items?page=' + page)
                .then(response => {this.items = response.data;});
            },
            create_item(){
                this.editmode = false;
                this.form.reset();
                $('#item_modal').modal('show');
                
            },
            store_item(){
                this.$Progress.start();
                this.form.post('api/item').then(() => {
                    Fire.$emit('success');
                    $('#item_modal').modal('hide');
                        toast({
                            type: 'success',
                            title: 'Added Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() =>{
                    this.$Progress.fail();
                })
            },
            edit_item(item){
                this.editmode = true;
                this.form.reset();
                $('#item_modal').modal('show');
                this.form.fill(item);
            },
            update_item(){
                this.$Progress.start();
                this.form.put('api/item/'+this.form.id).then(() => {
                    Fire.$emit('success');
                    $('#item_modal').modal('hide');
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
        computed: {
            current_user() {
                return this.$store.getters.current_user;
            },
            user_id(){
                return this.$store.getters.current_user.id;
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