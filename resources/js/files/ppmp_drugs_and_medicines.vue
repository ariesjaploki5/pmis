
<template>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="form-group row justify-content-center">
                            <input type="text" class="form-control col-md-8" name="" id="" aria-describedby="helpId" placeholder="search" v-model="search">
                            <button type="submit" class="btn btn-primary btn-md ml-2" @click="get_search()"><i class="fas fa-search"></i></button>
                        </div>
                        
                    </div>
                </div>
                <div class="row" v-if="dms.length">
                    
                        <table class="table table-hover" style="overflow-y: auto; height:40rem; width:100%;display:block;">
                        <tbody>
                            
                            <tr v-for="dm in dms" :key="dm.id">
                                <td class="col">
                                    <span class="text-capitalize">{{ dm.gendesc }}</span>
                                    <span class="badge badge-pill badge-primary pb-0"><h6>{{ dm.formdesc }}</h6> </span>
                                    <span class="badge badge-pill badge-success pb-0"><h6>{{ dm.dmdnost }} {{ dm.stredesc }}</h6></span>
                                </td>
                                
                                <td class="col">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary btn-sm" @click="add_item(dm)">Add <i class="fas fa-plus-circle"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                </div>
                <div class="row" v-else>
                    <table class="table" height="600rem">
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    PPMP
                    
                </div>
                <div class="row">
                    <table class="table table-hover" style="overflow-y: auto; height:40rem; width:100%;display:block;">

                        <tr v-for="item in items" :key="item.id">
                            <td class="col">
                                <span class="text-capitalize">{{ item.gendesc }}</span>
                                <span class="badge badge-pill badge-primary pb-0"><h6>{{ item.formdesc }}</h6> </span>
                                <span class="badge badge-pill badge-success pb-0"><h6>{{ item.dmdnost }} {{ item.stredesc }}</h6></span>
                                
                                <div class="input-group mt-2 col-4">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">Quantity</div>
                                    </div>
                                    <input type="number" class="form-control text-right" id="quantity" value="1">
                                </div>
                                <div class="input-group mt-2 col-4">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">Cost Per Unit</div>
                                    </div>
                                    <input type="number" class="form-control text-right" id="cost" readonly>
                                </div>
                                <div class="input-group mt-2 col-4">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">Estimated Cost</div>
                                    </div>
                                    <input type="number" class="form-control text-right" id="estimate_cost" readonly>
                                </div>
                            </td>
                            <td class="col">
                                <div class="text-right">
                                    <button type="button" class="btn btn-danger btn-sm" @click="remove_item(item)">Remove <i class="fas fa-minus-circle"></i></button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
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
            dms: {},
            search: '',
            form_search: new Form({
                search: '',
            }),
            items: {},
        }
    },
    methods: {
        load_all(){
           this.my_items();
        },
        get_search(){
            axios.get('api/drugs_and_medicines/'+this.search+'/search').then(({data}) => this.dms = data);
        },

        my_items(){
            axios.get('api/drugs_and_medicines/'+this.user_id).then(({data}) => this.items = data);
        },

        add_item(dm){
            axios.post('api/drugs_and_medicines/'+dm.dmdcomb+'/'+dm.dmdctr+'/'+this.user_id).then(() => {
                this.my_items();
            });
        },

        remove_item(dm){
            axios.delete('api/drugs_and_medicines/'+dm.dmdcomb+'/'+dm.dmdctr+'/'+this.user_id).then(() => {
                this.my_items();
            });
        }

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