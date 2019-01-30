<template>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8"><div class="card-title">Items</div></div>
            <div class="col-4">
                <button class="btn btn-primary" @click="create_item()">Add</button>
            </div>
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
                    <form action="">
                        <div class="modal-body">
                            <div class="form-group">
                               
                                <label for="item_code">Code</label>
                                <input type="text" class="form-control-sm" v-model="this.form.item_code">
                            </div>
                            <div class="form-group">
                                <label for="item_description">Description</label>
                                <input type="text" class="form-control-sm" v-model="this.form.item_description">
                            </div>
                            <div class="form-group">
                                <label for="item_total_quantity">Total</label>
                                <input type="text" class="form-control-sm" v-model="this.form.item_total_quantity">
                            </div>
                            <div class="form-group">
                                <label for="pap_code_id">Pap Code</label>
                                <input type="text" class="form-control-sm" v-model="this.form.pap_code_id">
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
        <div class="card-body">
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
           			<tr v-for="item in items" :key="item.id">
                        <td>{{ item.id }}</td>
                        <td>{{ item.item_code }}</td>
           				<td>{{ item.item_descriptions }}</td>
           				<td>{{ item.pap_code_id }}</td>
           				<td>{{ item.account_code }}</td>
           				<td>
                               <button class="btn btn-sm btn-success">Edit</button>
                               <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
           			</tr>
           		</tbody>
           </table> 
        </div>
        <div class="card-footer">
            <pagination :data="items" @pagination-change-page="load_page"></pagination>
        </div>
    </div>  
</template>
<script>
    export default {
        data() {
            return {
                role_id: '',
                editmode: false,
                form: new Form({
                    id:'',

                })
            }
        },
        methods:{
            load_page(){

            },
            load_all(){
                this.load_role();
            },
            load_role(){
                this.role_id = this.current_user.role_id;
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
        }
    }
</script>