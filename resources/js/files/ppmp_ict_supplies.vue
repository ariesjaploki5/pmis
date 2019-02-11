
<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="card-title col-6">
                        ICT SUPPLIES
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-sm btn-primary" @click="create_ppmp">add</button>
                        <div class="modal fade" id="ppmp_modal" tabindex="-1" role="dialog" aria-labelledby="ppmp_modal_label" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 v-show="!editmode" class="modal-title" id="ppmp_modal_label">Add New ppmp</h5>
                                    <h5 v-show="editmode" class="modal-title" id="ppmp_modal_label">Update ppmp</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form @submit.prevent="editmode ? update_ppmp() : store_ppmp()" class="text-left">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Specification</th>
                                                        <th width="10%">Cost per Unit</th>
                                                        <th width="8%">Quantity</th>
                                                        <th>Estimated Cost</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="it in form.items" :key="it.id">
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" v-model="it.description">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" v-model="it.specification">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" min="0000.0001" max="9999999.9999" v-model="it.cost_per_unit"> 
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" v-model="it.quantity"> 
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" v-model="it.quantity * it.cost_per_unit" readonly> 
                                                        </td>
                                                    </tr>
                                                    <button type="button" class="btn btn-sm btn-primary" @click="add_new_item()">add</button>
                                                </tbody>
                                            </table>
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
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>PPMP #</th>
                                <th>Description</th>
                                <th>Specification</th>
                                <th>Cost per Unit</th>
                                <th>Quantity</th>
                                <th>Estimated Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ppmp in ppmps" :key="ppmp.id">
                                <td></td>
                                <td>
                                    <div v-for="item in ppmp.ict_supplies" :key="item.id">
                                        <p>{{ item.description }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div v-for="item in ppmp.ict_supplies" :key="item.id">
                                        <p>{{ item.specifition }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div v-for="item in ppmp.ict_supplies" :key="item.id">
                                        <p>{{ item.cost_per_unit }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div v-for="item in ppmp.ict_supplies" :key="item.id">
                                        <p>{{ item.quantity }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div v-for="item in ppmp.ict_supplies" :key="item.id">
                                        <p>{{ item.estimated_cost }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group dropleft">
                                        <button class="btn btn-outline-info btn-sm dropdown-toggle text-bold" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" @click="edit_ppmp(ppmp)">Edit</a>
                                            <a class="dropdown-item" @click="delete_ppmp(ppmp.id)">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            editmode: false,
            ppmps: {},
            form: new Form({
                id: '',
                items: [{
                    description: "",
                    specification: "",
                    cost_per_unit: "",
                    quantity: "",
                    estimated_cost: "",
                }]
            }),
            
        }
    },
    methods: {
        load_all(){
            this.get_ict_supplies();
        },
        get_ict_supplies(){
            axios.get('api/ppmp/ict_supply')
            .then(({data}) => this.ppmps = data);
        },
        create_ppmp(){
            this.editmode = false;
            this.form.reset();
            $('#ppmp_modal').modal('show');
        },
        add_new_item(){
            this.form.items.push({
                    description: "",
                    specification: "",
                    cost_per_unit: "",
                    quantity: "",
                    estimated_cost: "",
				});
        },
        store_ppmp(){
            this.$Progress.start();
            this.form.post('api/ppmp/ict_supply/'+this.user_id).then(() => {
                Fire.$emit('success');
                $('#ppmp_modal').modal('hide');
                    toast({
                        type: 'success',
                        title: 'Added Successfully'
                    });
                this.$Progress.finish();
            }).catch(() =>{
                this.$Progress.fail();
            })
        },

    },
    created(){
        this.load_all();
    },
    computed: {
            user_id() {
                return this.$store.getters.current_user.id;
            }
        }
}
</script>