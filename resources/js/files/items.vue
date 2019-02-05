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
                                        <label for="item_code">Item Code</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.code">
                                    </div>
                                    <div class="form-group">
                                        <label for="item_description">Item Description</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.description">
                                    </div>
                                    <div class="form-group" v-show="!editmode">
                                        <label for="pap_code_id">Unit Description</label>
                                        <select name="" v-model="form.unit_id" id="" class="form-control form-control-sm">
                                            <option v-for="unit in units" :key="unit.id" :value="unit.id">{{ unit.description }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="item_total_quantity">Cost per Unit</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.cost"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="item_total_quantity">Total Quantity</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.total_quantity"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="item_total_quantity">Account Code</label>
                                        <input type="text" class="form-control form-control-sm" v-model="form.account_code">
                                    </div>
                                    <div class="form-group">
                                        <label for="pap_code_id">Pap Code</label>
                                        <select name="" v-model="form.pap_code_id" id="" class="form-control form-control-sm">
                                            <option v-for="pap_code in pap_codes" :key="pap_code.id" :value="pap_code.id"><p v-show="pap_code.code !== null">{{pap_code.code}} - </p><p>{{ pap_code.description }}</p></option>
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
           <table class="table">
           		<thead>
           			<tr>
           				<th>ID</th>
           				<th>Code</th>
           				<th>Descriptions</th>
                        <th>Unit Cost</th>
                        <th>Unit Description</th>
           				<th>Pap Code</th>
                        <th>Account Code</th>
                        <th></th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="item in items.data" :key="item.id" class="my-auto py-auto">
                        <td>
                            <p></p>{{ item.id }}
                        </td>
                        <td>
                            <p v-if="item.code">{{ item.code }}</p>
                        </td>
           				<td>
                            <p v-if="item.description">{{ item.description }}</p>   
                        </td>
                        <td>
                            <p v-if="item.cost">{{ item.cost }}</p>
                        </td>
                        <td>
                            <p v-if="item.unit_id !== null">{{ item.unit.description }}</p>
                        </td>
           				<td>
                            <p v-if="item.pap_code">{{ item.pap_code.code }}</p>
                        </td>
           				<td>
                            <p v-if="item.account_code">{{ item.account_code }}</p>
                        </td>
           				<td>
                            <div class="btn-group dropleft">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" @click="edit_item(item)">Edit</a>
                                    <a class="dropdown-item" @click="delete_item(item.id)">Delete</a>
                                </div>
                            </div>
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
                    code:'',
                    description: '',
                    total_quantity: '',
                    cost: '',
                    account_code: '',
                    pap_code_id: '',
                    unit_id: '',

                }),
                items: {},
                pap_codes: {},
                units: {},

            }
        },
        methods:{
            
            load_all(){
                this.get_items();
                this.get_pap_codes();
                this.get_units();
            },
            get_units(){
                axios.get('api/all_units')
                .then(({data}) => (this.units = data));
            },
            get_pap_codes(){
                axios.get('api/all_pap_codes')
                .then(({data}) => (this.pap_codes = data));
            },
            get_items(){
                axios.get('api/items')
                .then(({data}) => (this.items = data));
            },
            pages_items(page = 1){
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
            delete_item(id){
                this.$Progress.start();
                axios.delete('api/item/'+id+'/delete').then(() => {
                    Fire.$emit('success');
                    $('#item_modal').modal('hide');
                        toast({
                            type: 'danger',
                            title: 'Deleted Successfully'
                        });
                    this.$Progress.finish();
                }).catch(() => {

                });
            },

        },
        computed: {
            current_user() {
                return this.$store.getters.current_user
            },
            employeeid(){
                return this.$store.getters.current_user.token.employeeid
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