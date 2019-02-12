<template>
    
</template>

<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row justify-content-center">
                            <input type="text" class="form-control col-md-8" name="" id="" aria-describedby="helpId" placeholder="" v-model="search">
                            <button type="button" class="btn btn-primary btn-md ml-2" @click><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="ppmps.length">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Specification</th>
                                <th>Cost per Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ppmp in ppmps" :key="ppmp.id">
                                <td>

                                </td>
                                <td></td>
                                <td></td>
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
            search: '',
            form: new Form({
                id: '',
                items: [{
                    dmdcomb: "",
                    dmdctr: "",
                    description: "",
                    specification: "",
                    unit_id: "",
                    cost_per_unit: "",
                    quantity: "",
                    estimated_cost: "",
                }]
            }),
            
        }
    },
    methods: {
        load_all(){
            // this.get_ict_supplies();
        },
        search(){
            axios.get('api/drugs_and_medicines/'+this.search);
        },
        get_ict_supplies(){
            axios.get('api/drugs_and_medicines')
            .then(({data}) => this.ppmps = data);
        },
        create_ppmp(){
            this.editmode = false;
            this.form.reset();
            $('#ppmp_modal').modal('show');
        },
        add_new_item(item){
            this.form.items.push({
                    dmdcomb: item.dmdcomb,
                    dmdctr: item.dmdcomb,
                    description: item.description,
                    specification: item.specification,
                    cost_per_unit: item.cost_per_unit,
                    quantity: "",
                    estimated_cost: "",
				});
        },
        store_ppmp(){
            
        },
        edit_ppmp(ppmp){
            this.editmode = true;
            this.form.fill(ppmp);
            $('#ppmp_modal').modal('show');
        },
        update_ppmp(){
            
        },
        delete_ppmp(id){
            
        },
    },
    created(){
        this.load_all();
			Fire.$on('success',() => {
                this.load_all();
                
            });
    },
    computed: {
            user_id() {
                return this.$store.getters.current_user.id;
            }
        }
}
</script>