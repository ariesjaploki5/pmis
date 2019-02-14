<template>
    
</template>

<template>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form @submit.prevent="get_search() ">
                            <div class="form-group row justify-content-center">
                                <input type="text" class="form-control col-md-8" name="" id="" aria-describedby="helpId" placeholder="Search" v-model="form_search.search">
                                <button type="submit" class="btn btn-primary btn-md ml-2" ><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" v-if="dms.length">
                    
                        <table class="table table-hover" style="overflow-y: auto; height:40rem; width:100%;display:block;">
                        <tbody>
                            <tr v-for="dm in dms" :key="dm.id" style="">
                                <td class="col">
                                    <span class="text-capitalize">{{ dm.gendesc }}</span>
                                
                                    <span class="badge badge-pill badge-primary pb-0"><h6>{{ dm.formdesc }}</h6> </span>
                                
                                    <span class="badge badge-pill badge-success pb-0"><h6>{{ dm.dmdnost }} {{ dm.stredesc }}</h6></span>
                                </td>
                                <td class="col">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary btn-sm" @click="add_new_item(dm)">Add <i class="fas fa-plus-circle"></i></button>
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
                <div class="row" v-if="form.dmss.length">
                    <table class="table table-hover" style="overflow-y: auto; height:40rem; width:100%;display:block;">
                        <tbody>
                            <tr v-for="dm in form.dmss" :key="dm.id" style="">
                                <td class="col">
                                    <span class="text-capitalize">{{ dm.gendesc }}</span>
                                
                                    <span class="badge badge-pill badge-primary pb-0"><h6>{{ dm.formdesc }}</h6> </span>
                                
                                    <span class="badge badge-pill badge-success pb-0"><h6>{{ dm.dmdnost }} {{ dm.stredesc }}</h6></span>
                                </td>
                                <td class="col">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-danger btn-sm" @click="remove_item(dm)">Remove <i class="fas fa-minus-circle"></i></button>
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
            form: new Form({
                dmss: [],
            }),

        }
    },
    methods: {
        load_all(){
           
        },
        get_search(){
            this.form_search.post('api/drugs_and_medicines/search').then(({data}) => this.dms = data);
        },

        create_ppmp(){
            this.editmode = false;
            this.form.reset();
            $('#ppmp_modal').modal('show');
        },
        add_new_item(dm){
            axios.post('api/ppmp_drugs_and_medicines/'+dm.dmdcomb+'/'+dm.dmdctr);
        },
        remove_item(dm){
            axios.delete('api/ppmp_drugs_and_medicines/'+dm.dmdcomb+'/'+dm.dmdctr);
        }
        store_ppmp(){
            this.form.post('api/ppmp_drugs_and_medicines');
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