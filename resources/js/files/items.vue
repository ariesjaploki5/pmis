<template>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8"><div class="card-title">Items</div></div>
            <div class="col-4">
                <button class="btn btn-primary" @click="create()">Add</button>
            </div>
            <div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="item_modal_label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="item_modal_label">Add Item</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">

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
           			<tr>
                        <td></td>
                        <td></td>
           				<td></td>
           				<td></td>
           				<td></td>
           				<td></td>
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
        data(){
            return {
                editmode: false,
                items: {},
                role_id: '',
                form: new Form({
                    id: '',
                    item_code: '',
                    item_description: '',
                    item_total_quantity: '',
                    account_code: '',
                    pap_code_id: '',
                })
            }
        },
        methods: {
            load_all(){
                this.load_items();
            },
            load_items(){
                axios.get('item/'+this.role_id).then(({data}) => this.items)
                .catch(() => {

                });
            },
            load_page(){
                axios.get('item?page=' + page).then(response => {this.items = response.data;});
            },
            create(){
                this.editmode = true;
                this.form.reset();
                $('#item_modal').modal('show');
            },
            store(){
                this.form.post('item').then(() => {
                    
                }).catch(() => {

                });
            },
            edit(item){
                this.editmode = true;
                this.form.reset();
                $('#item_modal').modal('show');
                this.form.fill(item);
            },
            update(){

            },
            load_role(){
                this.role_id = current_user.role;
            }
        },
        computed: {
            current_user() {
                return this.$store.state.current_user;
            }
        },
        created(){
            this.load_all();
            Fire.$on('AfterStore', () => {
                this.load_items();
            });
        },
        
    }
</script>